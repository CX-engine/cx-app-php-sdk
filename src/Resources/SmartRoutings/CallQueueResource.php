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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueuesRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCallQueueRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, CallQueue $queue): Response
    {
        return $this->connector->send(new CreateCallQueueRequest($customerAccount, $queue));
    }

    public function update(string $customerAccount, CallQueue $queue): Response
    {
        return $this->connector->send(new UpdateCallQueueRequest($customerAccount, $queue));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueRequest($customerAccount, $id));
    }

    public function lookup(string $customerAccount, array $params = []): Response
    {
        return $this->connector->send(new LookupCallQueueRequest($customerAccount, $params));
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
