<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ShowGeoRoutingDestinationRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations/' . $this->destId;
    }

    public function __construct(string $customerAccount, protected int $listId, protected int $destId)
    {
        parent::__construct($customerAccount);
    }
}
