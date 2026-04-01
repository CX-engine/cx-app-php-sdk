<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\Cti;

class CreateCtiRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis';
    }

    public function __construct(string $customerAccount, protected Cti $cti)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->cti->toArray(filter: true);
    }
}
