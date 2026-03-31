<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueue;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueuesRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\LookupCallQueueRequest;

class CallQueueResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueuesRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueRequest($id));
    }

    public function store(CallQueue $queue): Response
    {
        return $this->connector->send(new CreateCallQueueRequest($queue));
    }

    public function update(CallQueue $queue): Response
    {
        return $this->connector->send(new UpdateCallQueueRequest($queue));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueRequest($id));
    }

    public function lookup(array $params = []): Response
    {
        return $this->connector->send(new LookupCallQueueRequest($params));
    }

    public function groups(): CallQueueGroupResource
    {
        return new CallQueueGroupResource($this->connector);
    }

    public function timeSpans(): CallQueueTimeSpanResource
    {
        return new CallQueueTimeSpanResource($this->connector);
    }

    public function exceptions(): CallQueueExceptionResource
    {
        return new CallQueueExceptionResource($this->connector);
    }

    public function holidays(): CallQueueHolidayResource
    {
        return new CallQueueHolidayResource($this->connector);
    }
}
