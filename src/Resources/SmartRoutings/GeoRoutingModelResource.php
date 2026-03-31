<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingModelsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingModelRequest;

class GeoRoutingModelResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingModelsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingModelRequest($id));
    }
}
