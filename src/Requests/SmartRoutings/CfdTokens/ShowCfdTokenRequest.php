<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ShowCfdTokenRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/cfd-tokens/' . $this->id;
    }

    public function __construct(string $customerAccount, protected int $id)
    {
        parent::__construct($customerAccount);
    }
}
