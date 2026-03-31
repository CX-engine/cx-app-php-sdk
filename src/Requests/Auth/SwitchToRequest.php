<?php

namespace CXEngine\AppSdk\Requests\Auth;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class SwitchToRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/switch-to';
    }

    public function __construct(
        protected string $workspaceId,
    ) {
        //
    }

    protected function defaultBody(): array
    {
        return [
            'workspace_id' => $this->workspaceId,
        ];
    }
}
