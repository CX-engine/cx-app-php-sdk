<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingDestination;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class UpdateGeoRoutingDestinationRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations/' . $this->destination->id;
    }

    public function __construct(string $customerAccount, protected int $listId, protected GeoRoutingDestination $destination)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->destination->toArray(filter: true);
    }
}
