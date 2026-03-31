<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueGroup;

class UpdateCallQueueGroupRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/groups/' . $this->group->id;
    }

    public function __construct(protected CallQueueGroup $group)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->group->toArray(filter: true);
    }
}
