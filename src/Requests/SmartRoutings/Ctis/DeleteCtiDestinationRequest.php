<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class DeleteCtiDestinationRequest extends CustomerScopedRequest
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/' . $this->ctiId . '/destinations/' . $this->destId;
    }

    public function __construct(string $customerAccount, protected int $ctiId, protected int $destId)
    {
        parent::__construct($customerAccount);
    }
}
