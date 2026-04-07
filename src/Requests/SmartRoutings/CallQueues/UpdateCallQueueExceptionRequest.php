<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueException;

class UpdateCallQueueExceptionRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/exceptions/' . $this->exception->id;
    }

    public function __construct(string $customerAccount, protected CallQueueException $exception)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return collect($this->exception->toArray(filter: true))
            ->except('exceptionable_id', 'exceptionable_type')
            ->all();
    }
}
