<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueue;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueGroup;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueTimeSpan;
use CXEngine\AppSdk\Entities\SmartRoutings\CallQueueException;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueuesRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueGroupsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueGroupRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueTimeSpansRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueTimeSpanRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\BulkCreateCallQueueTimeSpansRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\BulkDeleteCallQueueTimeSpansRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueExceptionsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\ShowCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\UpdateCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\DeleteCallQueueExceptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\GetCallQueueHolidaysRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\CreateCallQueueHolidayRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CallQueues\LookupCallQueueRequest;

class CallQueueResource extends SmartRoutingsResource
{
    // Queues

    public function indexQueues(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueuesRequest($filters));
    }

    public function showQueue(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueRequest($id));
    }

    public function storeQueue(CallQueue $queue): Response
    {
        return $this->connector->send(new CreateCallQueueRequest($queue));
    }

    public function updateQueue(CallQueue $queue): Response
    {
        return $this->connector->send(new UpdateCallQueueRequest($queue));
    }

    public function destroyQueue(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueRequest($id));
    }

    // Groups

    public function indexGroups(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueGroupsRequest($filters));
    }

    public function showGroup(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueGroupRequest($id));
    }

    public function storeGroup(CallQueueGroup $group): Response
    {
        return $this->connector->send(new CreateCallQueueGroupRequest($group));
    }

    public function updateGroup(CallQueueGroup $group): Response
    {
        return $this->connector->send(new UpdateCallQueueGroupRequest($group));
    }

    public function destroyGroup(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueGroupRequest($id));
    }

    // Time spans

    public function indexTimeSpans(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueTimeSpansRequest($filters));
    }

    public function showTimeSpan(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueTimeSpanRequest($id));
    }

    public function storeTimeSpan(CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new CreateCallQueueTimeSpanRequest($timeSpan));
    }

    public function updateTimeSpan(CallQueueTimeSpan $timeSpan): Response
    {
        return $this->connector->send(new UpdateCallQueueTimeSpanRequest($timeSpan));
    }

    public function destroyTimeSpan(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueTimeSpanRequest($id));
    }

    public function bulkStoreTimeSpans(array $data): Response
    {
        return $this->connector->send(new BulkCreateCallQueueTimeSpansRequest($data));
    }

    public function bulkDestroyTimeSpans(array $ids): Response
    {
        return $this->connector->send(new BulkDeleteCallQueueTimeSpansRequest($ids));
    }

    // Exceptions

    public function indexExceptions(array $filters = []): Response
    {
        return $this->connector->send(new GetCallQueueExceptionsRequest($filters));
    }

    public function showException(int $id): Response
    {
        return $this->connector->send(new ShowCallQueueExceptionRequest($id));
    }

    public function storeException(CallQueueException $exception): Response
    {
        return $this->connector->send(new CreateCallQueueExceptionRequest($exception));
    }

    public function updateException(CallQueueException $exception): Response
    {
        return $this->connector->send(new UpdateCallQueueExceptionRequest($exception));
    }

    public function destroyException(int $id): Response
    {
        return $this->connector->send(new DeleteCallQueueExceptionRequest($id));
    }

    // Holidays

    public function indexHolidays(): Response
    {
        return $this->connector->send(new GetCallQueueHolidaysRequest());
    }

    public function storeHoliday(CallQueueException $exception): Response
    {
        return $this->connector->send(new CreateCallQueueHolidayRequest($exception));
    }

    // Lookup

    public function lookup(array $params = []): Response
    {
        return $this->connector->send(new LookupCallQueueRequest($params));
    }
}
