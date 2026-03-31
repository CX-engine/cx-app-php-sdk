<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetRoutingFieldOptionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->fieldId . '/options';
    }

    public function __construct(protected int $fieldId, protected array $filters = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }
}
