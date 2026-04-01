<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ImportRoutingContactsRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts/import';
    }

    public function __construct(string $customerAccount, protected array $data)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
