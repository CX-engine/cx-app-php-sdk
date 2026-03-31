<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingField;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingFieldOption;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\GetRoutingFieldsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\ShowRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\CreateRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\UpdateRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\DeleteRoutingFieldRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\GetRoutingFieldOptionsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\ShowRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\CreateRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\UpdateRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\DeleteRoutingFieldOptionRequest;

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

    public function indexOptions(int $fieldId, array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingFieldOptionsRequest($fieldId, $filters));
    }

    public function showOption(int $fieldId, int $optionId): Response
    {
        return $this->connector->send(new ShowRoutingFieldOptionRequest($fieldId, $optionId));
    }

    public function storeOption(int $fieldId, RoutingFieldOption $option): Response
    {
        return $this->connector->send(new CreateRoutingFieldOptionRequest($fieldId, $option));
    }

    public function updateOption(int $fieldId, RoutingFieldOption $option): Response
    {
        return $this->connector->send(new UpdateRoutingFieldOptionRequest($fieldId, $option));
    }

    public function destroyOption(int $fieldId, int $optionId): Response
    {
        return $this->connector->send(new DeleteRoutingFieldOptionRequest($fieldId, $optionId));
    }
}
