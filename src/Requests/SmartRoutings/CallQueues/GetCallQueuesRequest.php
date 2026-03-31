<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCallQueuesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/queues';
    }

    public function __construct(protected array $filters = [])
    {
        //
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }
}
