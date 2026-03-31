<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class SurveyRecord extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?int $survey_id = null,
        public ?string $caller = null,
        public ?int $score_1 = null,
        public ?int $score_2 = null,
        public ?int $score_3 = null,
        public ?string $agent_extension = null,
        public ?string $agent_name = null,
        public ?string $datetime = null,
    ) {
        //
    }
}
