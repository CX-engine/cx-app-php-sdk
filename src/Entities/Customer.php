<?php

namespace CXEngine\AppSdk\Entities;

class Customer
{
    public function __construct(
        public readonly int $id,
        public readonly string $customer_account,
    ) {}
}
