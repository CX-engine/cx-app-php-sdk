<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use CXEngine\AppSdk\Entities\SmartRoutings\Survey;

class UpdateSurveyRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/surveys/' . $this->survey->id;
    }

    public function __construct(protected Survey $survey)
    {
        //
    }

    protected function defaultBody(): array
    {
        return $this->survey->toArray(filter: true);
    }
}
