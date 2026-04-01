<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class LookupCtiRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/lookup';
    }

    public function __construct(string $customerAccount, protected array $params = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->params];
    }
}
