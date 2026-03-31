<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\Survey;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\GetSurveysRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\ShowSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\CreateSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\UpdateSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\DeleteSurveyRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\GetSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\ExportSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\CreateSurveyRecordRequest;

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

    public function indexRecords(array $filters = []): Response
    {
        return $this->connector->send(new GetSurveyRecordsRequest($filters));
    }

    public function exportRecords(): Response
    {
        return $this->connector->send(new ExportSurveyRecordsRequest());
    }

    public function storeRecord(SurveyRecord $record): Response
    {
        return $this->connector->send(new CreateSurveyRecordRequest($record));
    }
}
