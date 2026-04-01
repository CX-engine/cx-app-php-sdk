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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueGroupsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCallQueueGroupRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, CallQueueGroup $group): Response
    {
        return $this->connector->send(new CreateCallQueueGroupRequest($customerAccount, $group));
    }

    public function update(string $customerAccount, CallQueueGroup $group): Response
    {
        return $this->connector->send(new UpdateCallQueueGroupRequest($customerAccount, $group));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueGroupRequest($customerAccount, $id));
    }
}
