<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueException;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueExceptionsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueExceptionRequest;

class CallQueueExceptionResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueExceptionsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCallQueueExceptionRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, CallQueueException $exception): Response
    {
        return $this->connector->send(new CreateCallQueueExceptionRequest($customerAccount, $exception));
    }

    public function update(string $customerAccount, CallQueueException $exception): Response
    {
        return $this->connector->send(new UpdateCallQueueExceptionRequest($customerAccount, $exception));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueExceptionRequest($customerAccount, $id));
    }
}
