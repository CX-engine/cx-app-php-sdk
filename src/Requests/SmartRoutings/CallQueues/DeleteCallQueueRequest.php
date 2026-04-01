<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class DeleteCallQueueRequest extends CustomerScopedRequest
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/queues/' . $this->id;
    }

    public function __construct(string $customerAccount, protected int $id)
    {
        parent::__construct($customerAccount);
    }
}
