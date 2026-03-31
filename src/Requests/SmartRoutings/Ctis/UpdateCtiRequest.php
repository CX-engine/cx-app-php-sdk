<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\Cti;

class UpdateCtiRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->cti->id;
    }

    public function __construct(protected Cti $cti)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->cti->toArray(filter: true);
    }
}
