<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class CreateSurveyRecordRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/survey-records';
    }

    public function __construct(string $customerAccount, protected SurveyRecord $record)
    {
        parent::__construct($customerAccount);
    }

    protected function defaultBody(): array
    {
        return $this->record->toArray(filter: true);
    }
}
