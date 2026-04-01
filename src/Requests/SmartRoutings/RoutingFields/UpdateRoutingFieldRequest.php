<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\RoutingField;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class UpdateRoutingFieldRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->field->id;
    }

    public function __construct(string $customerAccount, protected RoutingField $field)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->field->toArray(filter: true);
    }
}
