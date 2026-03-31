<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingList;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingDestination;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingModelsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingModelRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingListsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\CreateGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\UpdateGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\DeleteGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingDestinationsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\CreateGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\UpdateGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\DeleteGeoRoutingDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\LookupGeoRoutingDestinationRequest;

class GeoRoutingResource extends SmartRoutingsResource
{
    public function indexModels(array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingModelsRequest($filters));
    }

    public function showModel(int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingModelRequest($id));
    }

    public function indexLists(array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingListsRequest($filters));
    }

    public function showList(int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingListRequest($id));
    }

    public function storeList(GeoRoutingList $list): Response
    {
        return $this->connector->send(new CreateGeoRoutingListRequest($list));
    }

    public function updateList(GeoRoutingList $list): Response
    {
        return $this->connector->send(new UpdateGeoRoutingListRequest($list));
    }

    public function destroyList(int $id): Response
    {
        return $this->connector->send(new DeleteGeoRoutingListRequest($id));
    }

    public function indexDestinations(int $listId, array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingDestinationsRequest($listId, $filters));
    }

    public function showDestination(int $listId, int $destId): Response
    {
        return $this->connector->send(new ShowGeoRoutingDestinationRequest($listId, $destId));
    }

    public function storeDestination(int $listId, GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new CreateGeoRoutingDestinationRequest($listId, $destination));
    }

    public function updateDestination(int $listId, GeoRoutingDestination $destination): Response
    {
        return $this->connector->send(new UpdateGeoRoutingDestinationRequest($listId, $destination));
    }

    public function destroyDestination(int $listId, int $destId): Response
    {
        return $this->connector->send(new DeleteGeoRoutingDestinationRequest($listId, $destId));
    }

    public function lookup(array $params = []): Response
    {
        return $this->connector->send(new LookupGeoRoutingDestinationRequest($params));
    }
}
