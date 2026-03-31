<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class GeoRoutingDestination extends Entity
{
    public function __construct(
        public ?int $id = null,
        public mixed $zones = null,
        public ?string $nickname = null,
        public ?string $destination_1 = null,
        public ?string $destination_2 = null,
        public ?string $destination_3 = null,
        public ?string $destination_4 = null,
        public ?int $geo_routing_list_id = null,
    ) {
        //
    }
}
