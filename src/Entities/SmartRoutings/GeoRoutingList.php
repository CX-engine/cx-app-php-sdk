<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class GeoRoutingList extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $list_id = null,
        public ?string $list_name = null,
        public ?string $fallback_destination_1 = null,
        public ?string $fallback_destination_2 = null,
        public ?string $fallback_destination_3 = null,
        public ?string $fallback_destination_4 = null,
        public ?int $geo_routing_model_id = null,
        public ?int $customer_id = null,
    ) {
        //
    }
}
