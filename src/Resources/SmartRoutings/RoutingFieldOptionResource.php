<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\CxEngineConnector;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingFieldOption;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\GetRoutingFieldOptionsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\ShowRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\CreateRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\UpdateRoutingFieldOptionRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields\DeleteRoutingFieldOptionRequest;

class RoutingFieldOptionResource extends SmartRoutingsResource
{
    public function __construct(CxEngineConnector $connector, private int $fieldId)
    {
        parent::__construct($connector);
    }

    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingFieldOptionsRequest($this->fieldId, $filters));
    }

    public function show(int $optionId): Response
    {
        return $this->connector->send(new ShowRoutingFieldOptionRequest($this->fieldId, $optionId));
    }

    public function store(RoutingFieldOption $option): Response
    {
        return $this->connector->send(new CreateRoutingFieldOptionRequest($this->fieldId, $option));
    }

    public function update(RoutingFieldOption $option): Response
    {
        return $this->connector->send(new UpdateRoutingFieldOptionRequest($this->fieldId, $option));
    }

    public function destroy(int $optionId): Response
    {
        return $this->connector->send(new DeleteRoutingFieldOptionRequest($this->fieldId, $optionId));
    }
}
