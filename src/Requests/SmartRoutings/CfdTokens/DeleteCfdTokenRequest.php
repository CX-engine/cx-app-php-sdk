<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCfdTokenRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/cfd-tokens/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
