<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingField;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\GetRoutingFieldsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\ShowRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\CreateRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\UpdateRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\DeleteRoutingFieldRequest;

class RoutingFieldResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingFieldsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowRoutingFieldRequest($id));
    }

    public function store(RoutingField $field): Response
    {
        return $this->connector->send(new CreateRoutingFieldRequest($field));
    }

    public function update(RoutingField $field): Response
    {
        return $this->connector->send(new UpdateRoutingFieldRequest($field));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteRoutingFieldRequest($id));
    }

    public function options(int $fieldId): RoutingFieldOptionResource
    {
        return new RoutingFieldOptionResource($this->connector, $fieldId);
    }
}
