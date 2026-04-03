<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Enums\Method;

class RegenerateCtiTokenRequest extends CustomerScopedRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/'.$this->id.'/regenerate-token';
    }

    public function __construct(string $customerAccount, protected int $id)
    {
        parent::__construct($customerAccount);
    }
}
