<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteRoutingFieldRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
