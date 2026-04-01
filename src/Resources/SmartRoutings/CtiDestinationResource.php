<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\CxEngineConnector;
use CXEngine\AppSdk\Entities\SmartRoutings\CtiDestination;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\GetCtiDestinationsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\ShowCtiDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\CreateCtiDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\UpdateCtiDestinationRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\DeleteCtiDestinationRequest;

class CtiDestinationResource extends SmartRoutingsResource
{
    public function __construct(CxEngineConnector $connector, private int $ctiId)
    {
        parent::__construct($connector);
    }

    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCtiDestinationsRequest($customerAccount, $this->ctiId, $filters));
    }

    public function show(string $customerAccount, int $destId): Response
    {
        return $this->connector->send(new ShowCtiDestinationRequest($customerAccount, $this->ctiId, $destId));
    }

    public function store(string $customerAccount, CtiDestination $destination): Response
    {
        return $this->connector->send(new CreateCtiDestinationRequest($customerAccount, $this->ctiId, $destination));
    }

    public function update(string $customerAccount, CtiDestination $destination): Response
    {
        return $this->connector->send(new UpdateCtiDestinationRequest($customerAccount, $this->ctiId, $destination));
    }

    public function destroy(string $customerAccount, int $destId): Response
    {
        return $this->connector->send(new DeleteCtiDestinationRequest($customerAccount, $this->ctiId, $destId));
    }
}
