<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Ctis;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ExportCtisRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/ctis/export';
    }

    public function __construct(string $customerAccount)
    {
        parent::__construct($customerAccount);
    }
}
