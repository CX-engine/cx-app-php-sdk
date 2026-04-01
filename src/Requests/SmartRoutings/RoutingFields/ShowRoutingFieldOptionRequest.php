<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\RoutingFields;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ShowRoutingFieldOptionRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/fields/' . $this->fieldId . '/options/' . $this->optionId;
    }

    public function __construct(string $customerAccount, protected int $fieldId, protected int $optionId)
    {
        parent::__construct($customerAccount);
    }
}
