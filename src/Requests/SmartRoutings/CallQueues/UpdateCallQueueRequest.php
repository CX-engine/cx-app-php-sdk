<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueue;

class UpdateCallQueueRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/queues/' . $this->queue->id;
    }

    public function __construct(protected CallQueue $queue)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->queue->toArray(filter: true);
    }
}
