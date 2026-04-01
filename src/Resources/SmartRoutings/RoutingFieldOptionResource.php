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

    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingFieldOptionsRequest($customerAccount, $this->fieldId, $filters));
    }

    public function show(string $customerAccount, int $optionId): Response
    {
        return $this->connector->send(new ShowRoutingFieldOptionRequest($customerAccount, $this->fieldId, $optionId));
    }

    public function store(string $customerAccount, RoutingFieldOption $option): Response
    {
        return $this->connector->send(new CreateRoutingFieldOptionRequest($customerAccount, $this->fieldId, $option));
    }

    public function update(string $customerAccount, RoutingFieldOption $option): Response
    {
        return $this->connector->send(new UpdateRoutingFieldOptionRequest($customerAccount, $this->fieldId, $option));
    }

    public function destroy(string $customerAccount, int $optionId): Response
    {
        return $this->connector->send(new DeleteRoutingFieldOptionRequest($customerAccount, $this->fieldId, $optionId));
    }
}
