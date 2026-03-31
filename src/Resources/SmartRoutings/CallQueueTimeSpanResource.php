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
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueTimeSpansRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueTimeSpanRequest($id));
    }

    public function store(CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new CreateCallQueueTimeSpanRequest($timeSpan));
    }

    public function update(CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new UpdateCallQueueTimeSpanRequest($timeSpan));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueTimeSpanRequest($id));
    }

    public function bulkStore(array $data): Response
    {
        return $this->connector->send(new BulkCreateCallQueueTimeSpansRequest($data));
    }

    public function bulkDestroy(array $ids): Response
    {
        return $this->connector->send(new BulkDeleteCallQueueTimeSpansRequest($ids));
    }
}
