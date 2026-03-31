<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class CallQueue extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $number = null,
        public ?int $call_queue_group_id = null,
        public ?int $customer_id = null,
    ) {
        //
    }
}
