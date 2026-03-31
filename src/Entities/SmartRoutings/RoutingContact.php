<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

class RoutingContact extends Entity
{
    public function __construct(
        public ?int $id = null,
        public ?string $id_code = null,
        public ?string $language_code = null,
        public ?string $company = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public mixed $emails = null,
        public mixed $telecoms = null,
        public ?string $email_destination = null,
        public ?string $telecom_destination = null,
        public ?string $field_select_1 = null,
        public ?string $field_select_2 = null,
        public ?string $field_select_3 = null,
        public ?string $field_select_4 = null,
        public ?bool $field_boolean_1 = null,
        public ?bool $field_boolean_2 = null,
        public ?bool $field_boolean_3 = null,
        public ?bool $field_boolean_4 = null,
        public ?int $customer_id = null,
    ) {
        //
    }
}
