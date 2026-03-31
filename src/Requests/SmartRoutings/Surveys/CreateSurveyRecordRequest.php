<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;

class CreateSurveyRecordRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/survey-records';
    }

    public function __construct(protected SurveyRecord $record)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->record->toArray(filter: true);
    }
}
