<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class LookupGeoRoutingDestinationRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/destinations/lookup';
    }

    public function __construct(protected array $params = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->params;
    }
}
