<?php

namespace CXEngine\AppSdk\Requests\Auth;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class LogoutRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/logout';
    }
}
