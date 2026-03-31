<?php

namespace CXEngine\AppSdk\Requests\SmartRoutings\Surveys;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteSurveyRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/smart-routings/surveys/' . $this->id;
    }

    public function __construct(protected int $id)
    {
        //
    }
}
