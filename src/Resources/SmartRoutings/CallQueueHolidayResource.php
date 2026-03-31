<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueException;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueHolidaysRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueHolidayRequest;

class CallQueueHolidayResource extends SmartRoutingsResource
{
    public function index(): Response
    {
        return $this->connector->send(new GetCallQueueHolidaysRequest());
    }

    public function store(CallQueueException $exception): Response
    {
        return $this->connector->send(new CreateCallQueueHolidayRequest($exception));
    }
}
