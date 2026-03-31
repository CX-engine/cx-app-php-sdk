<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowCtiDestinationRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->ctiId . '/destinations/' . $this->destId;
    }

    public function __construct(protected int $ctiId, protected int $destId)
    {
        //
    }
}
