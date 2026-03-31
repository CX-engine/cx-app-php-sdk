<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CfdToken;

class CreateCfdTokenRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/cfd-tokens';
    }

    public function __construct(protected CfdToken $token)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->token->toArray(filter: true);
    }
}
