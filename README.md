# CX Engine App PHP SDK

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/cx-engine/cx-app-php-sdk.svg?style=flat-square)](https://packagist.org/packages/cx-engine/cx-app-php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/cx-engine/cx-app-php-sdk.svg?style=flat-square)](https://packagist.org/packages/cx-engine/cx-app-php-sdk)

PHP SDK for the CX Engine App API.

- [Installation](#installation)
- [Authentication](#authentication)
  - [Direct Tenant Auth](#authentication-direct)
  - [Central + Workspace Switch](#authentication-switch)
- [Usage](#usage)
  - [Resources](#usage-resources)
  - [Responses](#usage-responses)
  - [Entities](#usage-entities)
  - [Pagination](#usage-pagination)
  - [Extending the SDK](#usage-extends)

<a name="installation"></a>

## Installation

This library requires PHP `>=8.2`.

You can install the package via composer:

```
composer require cx-engine/cx-app-php-sdk
```

<a name="authentication"></a>

## Authentication

<a name="authentication-direct"></a>

### Direct Tenant Auth

To connect directly to a tenant, instantiate `CxEngineConnector` with the tenant URL, email and password:

```php
use CXEngine\AppSdk\CxEngineConnector;

$api = new CxEngineConnector(
    apiUrl: 'https://tenant.cx-engine.app',
    email: 'user@example.com',
    password: 'secret',
);
```

On the first request, the connector will POST `/login` with the provided credentials and store the returned Bearer token automatically.

<a name="authentication-switch"></a>

### Central + Workspace Switch

If you need to authenticate against the central domain first and then switch to a specific workspace, pass `$tenantId` and `$tenantApiUrl`:

```php
use CXEngine\AppSdk\CxEngineConnector;

$api = new CxEngineConnector(
    apiUrl: 'https://cx-engine.app',
    email: 'user@example.com',
    password: 'secret',
    tenantId: 'workspace-uuid',
    tenantApiUrl: 'https://tenant.cx-engine.app',
);
```

The connector performs a two-step flow automatically:

1. POST `/login` on the central domain → retrieves a central Bearer token.
2. POST `/switch-to` with `workspace_id` using that token → retrieves a workspace-scoped token.
3. All subsequent requests are sent to `$tenantApiUrl` with the workspace token.

If authentication fails at any step, a `CXEngine\AppSdk\Exceptions\AuthenticationException` is thrown.

<a name="usage"></a>

## Usage

<a name="usage-resources"></a>

### Resources

Resources group related API endpoints into convenient classes. Each resource is accessed via a method on the connector instance:

```php
$api->routingContacts(): RoutingContactResource
$api->routingFields():   RoutingFieldResource
$api->geoRouting():      GeoRoutingResource
$api->callQueues():      CallQueueResource
$api->ctis():            CtiResource
$api->cfdTokens():       CfdTokenResource
$api->surveys():         SurveyResource
```

Example usage:

```php
use CXEngine\AppSdk\CxEngineConnector;

$api = new CxEngineConnector(...);

// List all routing contacts
$response = $api->routingContacts()->index();

// List active call queues only
$response = $api->callQueues()->index(['active' => true]);

// Access call queue sub-resources
$response = $api->callQueues()->timeSpans()->index();
$response = $api->callQueues()->groups()->index();
$response = $api->callQueues()->exceptions()->index();
$response = $api->callQueues()->holidays()->index();
```

<a name="usage-responses"></a>

### Responses

Whether you use Requests or Resources, the response is always an instance of `Saloon\Http\Response`. It provides useful methods to check status and retrieve data:

```php
// Check response status
$response->ok();
$response->failed();
$response->status();
$response->headers();

// Get response data
$response->json(); // as an array
$response->body(); // as a raw string
```

You can learn more about responses by reading the [Saloon documentation](https://docs.saloon.dev/the-basics/responses#useful-methods).

<a name="usage-entities"></a>

### Entities

Entity classes represent the data structures of the API. They live under `CXEngine\AppSdk\Entities\SmartRoutings\*` and are simple typed value objects.

Use them when creating or updating resources:

```php
use CXEngine\AppSdk\CxEngineConnector;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingContact;

$api = new CxEngineConnector(...);

// Create
$contact = new RoutingContact(
    company: 'Acme Corp',
    first_name: 'John',
    last_name: 'Doe',
    customer_id: 42,
);

$response = $api->routingContacts()->store($contact);

// Update — set the id, then call update()
$contact->id = $response->json('id');
$contact->company = 'Acme Ltd';

$api->routingContacts()->update($contact);
```

You can also serialize an entity to an array at any time:

```php
$contact->toArray();             // includes null fields
$contact->toArray(filter: true); // excludes null fields
```

<a name="usage-pagination"></a>

### Pagination

On index routes that return paginated results, you can use the connector's `paginate()` method to iterate over all pages:

```php
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\GetRoutingContactsRequest;

// Create a PagedPaginator instance
$paginator = $api->paginate(new GetRoutingContactsRequest(['company' => 'Acme']));

// Iterate over all items across all pages (lazy-loaded)
foreach ($paginator->items() as $item) {
    // $item is the raw array for each record
}
```

Read more about lazy pagination in the [Saloon documentation](https://docs.saloon.dev/installable-plugins/pagination#using-the-paginator).

<a name="usage-extends"></a>

### Extending the SDK

You can extend the SDK by creating your own Resources and Requests, then adding them to a custom connector:

```php
use CXEngine\AppSdk\CxEngineConnector;

class MyCustomConnector extends CxEngineConnector
{
    public function defaultConfig(): array
    {
        return [
            'timeout' => 120,
        ];
    }

    public function customResource(): \App\Resources\CustomResource
    {
        return new \App\Resources\CustomResource($this);
    }
}

$api = new MyCustomConnector(
    apiUrl: 'https://tenant.cx-engine.app',
    email: 'user@example.com',
    password: 'secret',
);

$api->customResource()->index();
```
