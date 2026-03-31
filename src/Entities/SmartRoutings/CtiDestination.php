<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class CtiDestination extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $origin = null,
        public ?string $destination = null,
        public ?int $cti_id = null,
    ) {
        //
    }
}
