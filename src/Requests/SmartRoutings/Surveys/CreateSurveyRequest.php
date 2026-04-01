<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\Survey;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class CreateSurveyRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/surveys';
    }

    public function __construct(string $customerAccount, protected Survey $survey)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->survey->toArray(filter: true);
    }
}
