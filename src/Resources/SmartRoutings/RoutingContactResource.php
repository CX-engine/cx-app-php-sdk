<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingContact;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\GetRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ShowRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\CreateRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\UpdateRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\DeleteRoutingContactRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ExportRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\ImportRoutingContactsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts\BulkDeleteRoutingContactsRequest;

class RoutingContactResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetRoutingContactsRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowRoutingContactRequest($id));
    }

    public function store(RoutingContact $contact): Response
    {
        return $this->connector->send(new CreateRoutingContactRequest($contact));
    }

    public function update(RoutingContact $contact): Response
    {
        return $this->connector->send(new UpdateRoutingContactRequest($contact));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteRoutingContactRequest($id));
    }

    public function export(): Response
    {
        return $this->connector->send(new ExportRoutingContactsRequest());
    }

    public function import(array $data): Response
    {
        return $this->connector->send(new ImportRoutingContactsRequest($data));
    }

    public function bulkDestroy(array $ids): Response
    {
        return $this->connector->send(new BulkDeleteRoutingContactsRequest($ids));
    }
}
