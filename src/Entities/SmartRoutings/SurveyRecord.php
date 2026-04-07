<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class SurveyRecord extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?int $survey_id = null,
        public ?string $caller = null,
        public ?string $score_1 = null,
        public ?string $score_2 = null,
        public ?string $score_3 = null,
        public ?string $agent_extension = null,
        public ?string $agent_name = null,
        public ?string $datetime = null,
    ) {
        //
    }
}
