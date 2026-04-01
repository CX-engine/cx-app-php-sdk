<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class BulkDeleteRoutingContactsRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts/bulk';
    }

    public function __construct(string $customerAccount, protected array $ids)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return ['ids' => $this->ids];
    }
}
