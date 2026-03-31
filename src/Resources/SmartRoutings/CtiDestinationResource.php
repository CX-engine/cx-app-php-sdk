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

    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCtiDestinationsRequest($this->ctiId, $filters));
    }

    public function show(int $destId): Response
    {
        return $this->connector->send(new ShowCtiDestinationRequest($this->ctiId, $destId));
    }

    public function store(CtiDestination $destination): Response
    {
        return $this->connector->send(new CreateCtiDestinationRequest($this->ctiId, $destination));
    }

    public function update(CtiDestination $destination): Response
    {
        return $this->connector->send(new UpdateCtiDestinationRequest($this->ctiId, $destination));
    }

    public function destroy(int $destId): Response
    {
        return $this->connector->send(new DeleteCtiDestinationRequest($this->ctiId, $destId));
    }
}
