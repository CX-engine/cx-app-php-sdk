<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCtiRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
