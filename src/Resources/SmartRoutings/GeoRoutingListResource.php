<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\GeoRoutingList;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingListsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\CreateGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\UpdateGeoRoutingListRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\DeleteGeoRoutingListRequest;

class GeoRoutingListResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingListsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingListRequest($id));
    }

    public function store(GeoRoutingList $list): Response
    {
        return $this->connector->send(new CreateGeoRoutingListRequest($list));
    }

    public function update(GeoRoutingList $list): Response
    {
        return $this->connector->send(new UpdateGeoRoutingListRequest($list));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteGeoRoutingListRequest($id));
    }

    public function destinations(int $listId): GeoRoutingDestinationResource
    {
        return new GeoRoutingDestinationResource($this->connector, $listId);
    }
}
