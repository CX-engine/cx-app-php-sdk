<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;
use CXEngine\AppSdk\Requests\CustomerScopedRequest;

class UpdateSurveyRecordRequest extends CustomerScopedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/survey-records/' . $this->record->id;
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
