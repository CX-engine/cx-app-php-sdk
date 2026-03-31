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
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetSurveysRequest($filters));
    }

    public function show(int $id): Response
    {
        return $this->connector->send(new ShowSurveyRequest($id));
    }

    public function store(Survey $survey): Response
    {
        return $this->connector->send(new CreateSurveyRequest($survey));
    }

    public function update(Survey $survey): Response
    {
        return $this->connector->send(new UpdateSurveyRequest($survey));
    }

    public function destroy(int $id): Response
    {
        return $this->connector->send(new DeleteSurveyRequest($id));
    }

    public function records(): SurveyRecordResource
    {
        return new SurveyRecordResource($this->connector);
    }
}
