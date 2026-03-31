<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class BulkDeleteRoutingContactsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts/bulk';
    }

    public function __construct(protected array $ids)
    {
        //
    }

    protected function defaultBody(): array
    {
        return ['ids' => $this->ids];
    }
}
