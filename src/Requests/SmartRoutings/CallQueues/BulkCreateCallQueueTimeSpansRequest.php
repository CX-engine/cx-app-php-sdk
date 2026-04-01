<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class BulkCreateCallQueueTimeSpansRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/time-spans/bulk';
    }

    public function __construct(string $customerAccount, protected array $data)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
