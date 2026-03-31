<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class GeoRoutingModel extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $max_length = null,
        public ?string $match_method = null,
        public ?string $match_position = null,
        public mixed $zones = null,
    ) {
        //
    }
}
