<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueTimeSpan;

class CreateCallQueueTimeSpanRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/time-spans';
    }

    public function __construct(protected CallQueueTimeSpan $timeSpan)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->timeSpan->toArray(filter: true);
    }
}
