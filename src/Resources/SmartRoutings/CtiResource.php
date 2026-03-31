<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\Cti;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\GetCtisRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\ShowCtiRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\CreateCtiRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\UpdateCtiRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\DeleteCtiRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\ExportCtisRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\ImportCtisRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\BulkDeleteCtisRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Ctis\LookupCtiRequest;

class CtiResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetCtisRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowCtiRequest($id));
    }

    public function store(Cti $cti): Response
    {
        return $this->connector->send(new CreateCtiRequest($cti));
    }

    public function update(Cti $cti): Response
    {
        return $this->connector->send(new UpdateCtiRequest($cti));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteCtiRequest($id));
    }

    public function export(): Response
    {
        return $this->connector->send(new ExportCtisRequest());
    }

    public function import(array $data): Response
    {
        return $this->connector->send(new ImportCtisRequest($data));
    }

    public function bulkDestroy(array $ids): Response
    {
        return $this->connector->send(new BulkDeleteCtisRequest($ids));
    }

    public function lookup(array $params = []): Response
    {
        return $this->connector->send(new LookupCtiRequest($params));
    }

    public function destinations(int $ctiId): CtiDestinationResource
    {
        return new CtiDestinationResource($this->connector, $ctiId);
    }
}
