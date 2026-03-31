<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class CfdToken extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?int $user_id = null,
        public ?string $name = null,
        public mixed $hosts = null,
        public ?string $expires_at = null,
    ) {
        //
    }
}
