<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class CallQueueException extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $reference = null,
        public ?string $label = null,
        public ?string $destination = null,
        public ?string $day = null,
        public ?int $exceptionable_id = null,
        public ?string $exceptionable_type = null,
    ) {
        //
    }
}
