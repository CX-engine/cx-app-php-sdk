<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowGeoRoutingListRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
