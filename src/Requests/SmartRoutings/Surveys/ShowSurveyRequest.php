<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowSurveyRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/surveys/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
