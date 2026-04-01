<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ShowGeoRoutingListRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->id;
    }

    public function __construct(string $customerAccount, protected int $id)
    {
        parent::__construct($customerAccount);
    }
}
