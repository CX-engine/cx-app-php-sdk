<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowGeoRoutingDestinationRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations/' . $this->destId;
    }

    public function __construct(protected int $listId, protected int $destId)
    {
        //
    }
}
