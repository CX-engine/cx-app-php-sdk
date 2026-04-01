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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCfdTokensRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCfdTokenRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, CfdToken $token): Response
    {
        return $this->connector->send(new CreateCfdTokenRequest($customerAccount, $token));
    }

    public function update(string $customerAccount, CfdToken $token): Response
    {
        return $this->connector->send(new UpdateCfdTokenRequest($customerAccount, $token));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCfdTokenRequest($customerAccount, $id));
    }
}
