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
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueExceptionsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueExceptionRequest($id));
    }

    public function store(CallQueueException $exception): Response
    {
        return $this->connector->send(new CreateCallQueueExceptionRequest($exception));
    }

    public function update(CallQueueException $exception): Response
    {
        return $this->connector->send(new UpdateCallQueueExceptionRequest($exception));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueExceptionRequest($id));
    }
}
