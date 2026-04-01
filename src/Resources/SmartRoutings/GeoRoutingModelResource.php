<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\GetGeoRoutingModelsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\ShowGeoRoutingModelRequest;

class GeoRoutingModelResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetGeoRoutingModelsRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowGeoRoutingModelRequest($customerAccount, $id));
    }
}
