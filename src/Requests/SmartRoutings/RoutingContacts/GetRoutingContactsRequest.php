<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetRoutingContactsRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts';
    }

    public function __construct(string $customerAccount, protected array $filters = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->filters];
    }
}
