<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CtiDestination;

class UpdateCtiDestinationRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->ctiId . '/destinations/' . $this->destination->id;
    }

    public function __construct(string $customerAccount, protected int $ctiId, protected CtiDestination $destination)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->destination->toArray(filter: true);
    }
}
