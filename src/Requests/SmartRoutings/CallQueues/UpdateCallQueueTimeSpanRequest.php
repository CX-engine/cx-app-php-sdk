<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueTimeSpan;

class UpdateCallQueueTimeSpanRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/time-spans/' . $this->timeSpan->id;
    }

    public function __construct(string $customerAccount, protected CallQueueTimeSpan $timeSpan)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->timeSpan->toArray(filter: true);
    }
}
