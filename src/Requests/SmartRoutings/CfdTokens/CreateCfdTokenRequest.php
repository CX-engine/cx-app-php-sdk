<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CfdToken;

class CreateCfdTokenRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/cfd-tokens';
    }

    public function __construct(string $customerAccount, protected CfdToken $token)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->token->toArray(filter: true);
    }
}
