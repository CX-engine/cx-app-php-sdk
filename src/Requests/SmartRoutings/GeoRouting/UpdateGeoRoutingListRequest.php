<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingList;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class UpdateGeoRoutingListRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->list->id;
    }

    public function __construct(string $customerAccount, protected GeoRoutingList $list)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->list->toArray(filter: true);
    }
}
