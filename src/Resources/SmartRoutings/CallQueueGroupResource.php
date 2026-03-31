<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueGroup;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueGroupsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueGroupRequest;

class CallQueueGroupResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueGroupsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueGroupRequest($id));
    }

    public function store(CallQueueGroup $group): Response
    {
        return $this->connector->send(new CreateCallQueueGroupRequest($group));
    }

    public function update(CallQueueGroup $group): Response
    {
        return $this->connector->send(new UpdateCallQueueGroupRequest($group));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueGroupRequest($id));
    }
}
