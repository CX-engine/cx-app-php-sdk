<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueue;

class CreateCallQueueRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/queues';
    }

    public function __construct(string $customerAccount, protected CallQueue $queue)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->queue->toArray(filter: true);
    }
}
