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
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetCtisRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowCtiRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, Cti $cti): Response
    {
        return $this->connector->send(new CreateCtiRequest($customerAccount, $cti));
    }

    public function update(string $customerAccount, Cti $cti): Response
    {
        return $this->connector->send(new UpdateCtiRequest($customerAccount, $cti));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteCtiRequest($customerAccount, $id));
    }

    public function export(string $customerAccount): Response
    {
        return $this->connector->send(new ExportCtisRequest($customerAccount));
    }

    public function import(string $customerAccount, array $data): Response
    {
        return $this->connector->send(new ImportCtisRequest($customerAccount, $data));
    }

    public function bulkDestroy(string $customerAccount, array $ids): Response
    {
        return $this->connector->send(new BulkDeleteCtisRequest($customerAccount, $ids));
    }

    public function lookup(string $customerAccount, array $params = []): Response
    {
        return $this->connector->send(new LookupCtiRequest($customerAccount, $params));
    }

    public function destinations(int $ctiId): CtiDestinationResource
    {
        return new CtiDestinationResource($this->connector, $ctiId);
    }
}
