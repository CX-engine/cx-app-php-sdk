<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class GetSurveyRecordsRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/survey-records';
    }

    public function __construct(string $customerAccount, protected array $filters = [])
    {
        parent::__construct($customerAccount);
    }

    protected function defaultQuery(): array
    {
        return [...parent::defaultQuery(), ...$this->filters];
    }
}
