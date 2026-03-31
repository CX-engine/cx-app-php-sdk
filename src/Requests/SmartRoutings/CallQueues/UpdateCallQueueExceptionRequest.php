<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueException;

class UpdateCallQueueExceptionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/exceptions/' . $this->exception->id;
    }

    public function __construct(protected CallQueueException $exception)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->exception->toArray(filter: true);
    }
}
