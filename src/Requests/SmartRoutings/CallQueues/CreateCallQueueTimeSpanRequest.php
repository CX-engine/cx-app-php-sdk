<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueTimeSpan;

class CreateCallQueueTimeSpanRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/time-spans';
    }

    public function __construct(string $customerAccount, protected CallQueueTimeSpan $timeSpan)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return array_merge(parent::defaultQuery(), [
            'time_spanable_id' => $this->timeSpan->time_spanable_id,
            'time_spanable_type' => $this->timeSpan->time_spanable_type,
        ]);
    }

    protected function defaultBody(): array
    {
        return collect($this->timeSpan->toArray(filter: true))
            ->except('time_spanable_id', 'time_spanable_type')
            ->all();
    }
}
