<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetGeoRoutingDestinationsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/geo/lists/' . $this->listId . '/destinations';
    }

    public function __construct(protected int $listId, protected array $filters = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }
}
