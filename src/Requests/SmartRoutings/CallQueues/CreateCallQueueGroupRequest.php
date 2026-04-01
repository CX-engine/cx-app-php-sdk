<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueGroup;

class CreateCallQueueGroupRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/groups';
    }

    public function __construct(string $customerAccount, protected CallQueueGroup $group)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->group->toArray(filter: true);
    }
}
