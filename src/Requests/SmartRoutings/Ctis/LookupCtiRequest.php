<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class LookupCtiRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/lookup';
    }

    public function __construct(protected array $params = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->params;
    }
}
