<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueTimeSpan;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueTimeSpansRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\BulkCreateCallQueueTimeSpansRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\BulkDeleteCallQueueTimeSpansRequest;

class CallQueueTimeSpanResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueTimeSpansRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCallQueueTimeSpanRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new CreateCallQueueTimeSpanRequest($customerAccount, $timeSpan));
    }

    public function update(string $customerAccount, CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new UpdateCallQueueTimeSpanRequest($customerAccount, $timeSpan));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueTimeSpanRequest($customerAccount, $id));
    }

    public function bulkStore(string $customerAccount, array $data): Response
    {
        return $this->connector->send(new BulkCreateCallQueueTimeSpansRequest($customerAccount, $data));
    }

    public function bulkDestroy(string $customerAccount, array $ids): Response
    {
        return $this->connector->send(new BulkDeleteCallQueueTimeSpansRequest($customerAccount, $ids));
    }
}
