<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class CallQueueTimeSpan extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $reference = null,
        public ?string $destination = null,
        public ?int $day_of_week = null,
        public ?string $date_full = null,
        public ?string $start_time = null,
        public ?string $end_time = null,
        public ?int $time_spanable_id = null,
        public ?string $time_spanable_type = null,
    ) {
        //
    }
}
