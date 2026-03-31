<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\CfdToken;
use CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens\GetCfdTokensRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens\ShowCfdTokenRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens\CreateCfdTokenRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens\UpdateCfdTokenRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\CfdTokens\DeleteCfdTokenRequest;

class CfdTokenResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCfdTokensRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCfdTokenRequest($id));
    }

    public function store(CfdToken $token): Response
    {
        return $this->connector->send(new CreateCfdTokenRequest($token));
    }

    public function update(CfdToken $token): Response
    {
        return $this->connector->send(new UpdateCfdTokenRequest($token));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCfdTokenRequest($id));
    }
}
