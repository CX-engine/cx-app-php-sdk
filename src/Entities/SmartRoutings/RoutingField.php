<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class RoutingField extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $default_value = null,
        public ?int $default_option_id = null,
        public ?int $customer_id = null,
    ) {
        //
    }
}
