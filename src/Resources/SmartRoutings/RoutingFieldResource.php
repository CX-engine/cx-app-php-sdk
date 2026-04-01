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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingFieldsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowRoutingFieldRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, RoutingField $field): Response
    {
        return $this->connector->send(new CreateRoutingFieldRequest($customerAccount, $field));
    }

    public function update(string $customerAccount, RoutingField $field): Response
    {
        return $this->connector->send(new UpdateRoutingFieldRequest($customerAccount, $field));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteRoutingFieldRequest($customerAccount, $id));
    }

    public function options(int $fieldId): RoutingFieldOptionResource
    {
        return new RoutingFieldOptionResource($this->connector, $fieldId);
    }
}
