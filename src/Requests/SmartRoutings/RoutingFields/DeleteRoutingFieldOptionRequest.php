<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteRoutingFieldOptionRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->fieldId . '/options/' . $this->optionId;
    }

    public function __construct(protected int $fieldId, protected int $optionId)
    {
        //
    }
}
