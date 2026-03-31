<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingField;

class UpdateRoutingFieldRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->field->id;
    }

    public function __construct(protected RoutingField $field)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->field->toArray(filter: true);
    }
}
