<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetRoutingFieldsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields';
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
