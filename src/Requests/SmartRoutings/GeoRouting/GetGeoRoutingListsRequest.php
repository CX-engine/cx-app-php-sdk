<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetGeoRoutingListsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists';
    }

    public function __construct(protected array $filters = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }
}
