<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingContacts;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingContact;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class CreateRoutingContactRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/contacts';
    }

    public function __construct(string $customerAccount, protected RoutingContact $contact)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->contact->toArray(filter: true);
    }
}
