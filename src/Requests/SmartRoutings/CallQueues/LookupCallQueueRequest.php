<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class LookupCallQueueRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/lookup';
    }

    public function __construct(protected array $params = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->params;
    }
}
