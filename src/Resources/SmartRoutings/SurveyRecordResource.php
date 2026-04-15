<?php

namespace CXEngine\AppSdk\Resources\SmartRoutings;

use Saloon\Http\Response;
use CXEngine\AppSdk\Entities\SmartRoutings\SurveyRecord;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\GetSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\ExportSurveyRecordsRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\CreateSurveyRecordRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\UpdateSurveyRecordRequest;
use CXEngine\AppSdk\Requests\SmartRoutings\Surveys\DeleteSurveyRecordRequest;

class SurveyRecordResource extends SmartRoutingsResource
{
    public function index(string $customerAccount, array $filters = []): Response
    {
        return $this->connector->send(new GetSurveyRecordsRequest($customerAccount, $filters));
    }

    public function export(string $customerAccount): Response
    {
        return $this->connector->send(new ExportSurveyRecordsRequest($customerAccount));
    }

    public function store(string $customerAccount, SurveyRecord $record): Response
    {
        return $this->connector->send(new CreateSurveyRecordRequest($customerAccount, $record));
    }

    public function update(string $customerAccount, SurveyRecord $record): Response
    {
        return $this->connector->send(new UpdateSurveyRecordRequest($customerAccount, $record));
    }

    public function destroy(string $customerAccount, int $id): Response
    {
        return $this->connector->send(new DeleteSurveyRecordRequest($customerAccount, $id));
    }
}
