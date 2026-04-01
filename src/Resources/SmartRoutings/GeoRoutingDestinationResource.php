<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\CxEngineConnector;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingDestination;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingDestinationsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\CreateGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\UpdateGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\DeleteGeoRoutingDestinationRequest;

class GeoRoutingDestinationResource extends SmartRoutingsResource
{
    public function __construct(CxEngineConnector $connector, private int $listId)
    {
        parent::__construct($connector);
    }

    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingDestinationsRequest($customerAccount, $this->listId, $filters));
    }

    public function show(string $customerAccount, int $destId): Response
    {
        return $this->connector->send(new ShowGeoRoutingDestinationRequest($customerAccount, $this->listId, $destId));
    }

    public function store(string $customerAccount, GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new CreateGeoRoutingDestinationRequest($customerAccount, $this->listId, $destination));
    }

    public function update(string $customerAccount, GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new UpdateGeoRoutingDestinationRequest($customerAccount, $this->listId, $destination));
    }

    public function destroy(string $customerAccount, int $destId): Response
    {
        return $this->connector->send(new DeleteGeoRoutingDestinationRequest($customerAccount, $this->listId, $destId));
    }
}
