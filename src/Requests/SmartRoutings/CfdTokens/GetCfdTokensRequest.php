<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetCfdTokensRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/cfd-tokens';
    }

    public function __construct(string $customerAccount, protected array $filters = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->filters];
    }
}
