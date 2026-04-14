<?php

namespace CXEngine\AppSdk\Requests;

use Saloon\Enums\Method;

class ResolveCustomerRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/customers/resolve';
    }
}
