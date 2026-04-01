<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\Survey;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\GetSurveysRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\ShowSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\CreateSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\UpdateSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\DeleteSurveyRequest;

class SurveyResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetSurveysRequest($customerAccount, $filters));
    }

    public function show(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new ShowSurveyRequest($customerAccount, $id));
    }

    public function store(string $customerAccount, Survey $survey): Response
    {
        return $this->connector->send(new CreateSurveyRequest($customerAccount, $survey));
    }

    public function update(string $customerAccount, Survey $survey): Response
    {
        return $this->connector->send(new UpdateSurveyRequest($customerAccount, $survey));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteSurveyRequest($customerAccount, $id));
    }

    public function records(): SurveyRecordResource
    {
        return new SurveyRecordResource($this->connector);
    }
}
