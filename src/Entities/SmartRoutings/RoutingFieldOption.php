<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class RoutingFieldOption extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $value = null,
        public ?int $routing_field_id = null,
    ) {
        //
    }
}
