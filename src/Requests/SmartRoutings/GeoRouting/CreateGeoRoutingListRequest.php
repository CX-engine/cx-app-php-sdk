<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingList;

class CreateGeoRoutingListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists';
    }

    public function __construct(protected GeoRoutingList $list)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->list->toArray(filter: true);
    }
}
