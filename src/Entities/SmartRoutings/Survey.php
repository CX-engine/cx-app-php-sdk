<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class Survey extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $customer_id = null,
    ) {
        //
    }
}
