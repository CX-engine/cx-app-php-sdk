<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCallQueueRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/queues/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
