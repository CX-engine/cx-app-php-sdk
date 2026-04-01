<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingContact;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\GetRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ShowRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\CreateRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\UpdateRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\DeleteRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ExportRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ImportRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\BulkDeleteRoutingContactsRequest;

class RoutingContactResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingContactsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowRoutingContactRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, RoutingContact $contact): Response
    {
        return $this->connector->send(new CreateRoutingContactRequest($customerAccount, $contact));
    }

    public function update(string $customerAccount, RoutingContact $contact): Response
    {
        return $this->connector->send(new UpdateRoutingContactRequest($customerAccount, $contact));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteRoutingContactRequest($customerAccount, $id));
    }

    public function export(string $customerAccount): Response
    {
        return $this->connector->send(new ExportRoutingContactsRequest($customerAccount));
    }

    public function import(string $customerAccount, array $data): Response
    {
        return $this->connector->send(new ImportRoutingContactsRequest($customerAccount, $data));
    }

    public function bulkDestroy(string $customerAccount, array $ids): Response
    {
        return $this->connector->send(new BulkDeleteRoutingContactsRequest($customerAccount, $ids));
    }
}
