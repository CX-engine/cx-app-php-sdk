<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteRoutingContactRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
