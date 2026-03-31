<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CtiDestination;

class CreateCtiDestinationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->ctiId . '/destinations';
    }

    public function __construct(protected int $ctiId, protected CtiDestination $destination)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->destination->toArray(filter: true);
    }
}
