<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetGeoRoutingDestinationsRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations';
    }

    public function __construct(string $customerAccount, protected int $listId, protected array $filters = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->filters];
    }
}
