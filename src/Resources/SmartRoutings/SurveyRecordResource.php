<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\GetSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\ExportSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\CreateSurveyRecordRequest;

class SurveyRecordResource extends SmartRoutingsResource
{
    public function index(array $filters = []): Response
    {
        return $this->connector->send(new GetSurveyRecordsRequest($filters));
    }

    public function export(): Response
    {
        return $this->connector->send(new ExportSurveyRecordsRequest());
    }

    public function store(SurveyRecord $record): Response
    {
        return $this->connector->send(new CreateSurveyRecordRequest($record));
    }
}
