<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingFieldOption;

class UpdateRoutingFieldOptionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->fieldId . '/options/' . $this->option->id;
    }

    public function __construct(protected int $fieldId, protected RoutingFieldOption $option)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->option->toArray(filter: true);
    }
}
