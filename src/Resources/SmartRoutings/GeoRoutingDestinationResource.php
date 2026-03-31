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

    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingDestinationsRequest($this->listId, $filters));
    }

    public function show(int $destId): Response
    {
        return $this->connector->send(new ShowGeoRoutingDestinationRequest($this->listId, $destId));
    }

    public function store(GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new CreateGeoRoutingDestinationRequest($this->listId, $destination));
    }

    public function update(GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new UpdateGeoRoutingDestinationRequest($this->listId, $destination));
    }

    public function destroy(int $destId): Response
    {
        return $this->connector->send(new DeleteGeoRoutingDestinationRequest($this->listId, $destId));
    }
}
