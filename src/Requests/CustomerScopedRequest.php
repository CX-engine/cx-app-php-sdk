<?php

namespace CXEngine\AppSdk\Requests;

use Saloon\Http\Request;

abstract class CustomerScopedRequest extends Request
{
    public function __construct(protected string $customerAccount)
    {
    }

    protected function defaultQuery(): array
    {
        return ['customer_account' => $this->customerAccount];
    }
}
