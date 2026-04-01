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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingListsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingListRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, GeoRoutingList $list): Response
    {
        return $this->connector->send(new CreateGeoRoutingListRequest($customerAccount, $list));
    }

    public function update(string $customerAccount, GeoRoutingList $list): Response
    {
        return $this->connector->send(new UpdateGeoRoutingListRequest($customerAccount, $list));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteGeoRoutingListRequest($customerAccount, $id));
    }

    public function destinations(int $listId): GeoRoutingDestinationResource
    {
        return new GeoRoutingDestinationResource($this->connector, $listId);
    }
}
