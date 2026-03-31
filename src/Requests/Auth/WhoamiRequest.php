<?php

namespace CXEngine\AppSdk\Requests\Auth;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class WhoamiRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/whoami';
    }
}
