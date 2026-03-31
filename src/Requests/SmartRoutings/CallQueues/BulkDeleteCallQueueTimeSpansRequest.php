<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\CallQueues;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class BulkDeleteCallQueueTimeSpansRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/call-queues/time-spans/bulk';
    }

    public function __construct(protected array $ids)
    {
        //
    }

    protected function defaultBody(): array
    {
        return ['ids' => $this->ids];
    }
}
