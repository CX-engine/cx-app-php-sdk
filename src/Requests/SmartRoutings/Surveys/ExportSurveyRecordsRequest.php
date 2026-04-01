<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class ExportSurveyRecordsRequest extends CustomerScopedRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/survey-records/export';
    }

    public function __construct(string $customerAccount)
    {
        parent::__construct($customerAccount);
    }
}
