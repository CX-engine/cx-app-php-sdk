<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowRoutingFieldOptionRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->fieldId . '/options/' . $this->optionId;
    }

    public function __construct(protected int $fieldId, protected int $optionId)
    {
        //
    }
}
