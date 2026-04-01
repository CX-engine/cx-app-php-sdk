<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetCallQueueHolidaysRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/exceptions/holidays';
    }

    public function __construct(string $customerAccount)
    {
        parent::__construct($customerAccount);
    }
}
