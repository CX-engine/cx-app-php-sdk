<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class DeleteSurveyRequest extends CustomerScopedRequest
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/surveys/' . $this->id;
    }

    public function __construct(string $customerAccount, protected int $id)
    {
        parent::__construct($customerAccount);
    }
}
