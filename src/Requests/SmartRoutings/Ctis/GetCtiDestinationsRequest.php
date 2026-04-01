<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetCtiDestinationsRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->ctiId . '/destinations';
    }

    public function __construct(string $customerAccount, protected int $ctiId, protected array $filters = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->filters];
    }
}
