<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingDestination;

class UpdateGeoRoutingDestinationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations/' . $this->destination->id;
    }

    public function __construct(protected int $listId, protected GeoRoutingDestination $destination)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->destination->toArray(filter: true);
    }
}
