<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Requests\SmartRoutings\GeoRouting\LookupGeoRoutingDestinationRequest;

class GeoRoutingResource extends SmartRoutingsResource
{
    public function models(): GeoRoutingModelResource
    {
        return new GeoRoutingModelResource($this->connector);
    }

    public function lists(): GeoRoutingListResource
    {
        return new GeoRoutingListResource($this->connector);
    }

    public function lookup(string $customerAccount, array $params = []): Response
    {
        return $this->connector->send(new LookupGeoRoutingDestinationRequest($customerAccount, $params));
    }
}
