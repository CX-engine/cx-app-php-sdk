<?php

namespace CXEngine\AppSdk;

use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\RateLimitPlugin\Limit;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\RateLimitPlugin\Stores\MemoryStore;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use CXEngine\AppSdk\Requests\Auth\LoginRequest;
use CXEngine\AppSdk\Requests\Auth\SwitchToRequest;
use CXEngine\AppSdk\Exceptions\AuthenticationException;
use CXEngine\AppSdk\Resources\SmartRoutings\RoutingContactResource;
use CXEngine\AppSdk\Resources\SmartRoutings\RoutingFieldResource;
use CXEngine\AppSdk\Resources\SmartRoutings\GeoRoutingResource;
use CXEngine\AppSdk\Resources\SmartRoutings\CallQueueResource;
use CXEngine\AppSdk\Resources\SmartRoutings\CtiResource;
use CXEngine\AppSdk\Resources\SmartRoutings\CfdTokenResource;
use CXEngine\AppSdk\Resources\SmartRoutings\SurveyResource;

class CxEngineConnector extends Connector implements HasPagination
{
    protected string $apiToken;
    protected array $apiUser = [];
    protected string $currentBaseUrl;

    public function __construct(
        protected string $apiUrl,
        #[\SensitiveParameter]
        protected string $email,
        #[\SensitiveParameter]
        protected string $password,
        protected ?string $tenantId = null,
        protected ?string $tenantApiUrl = null,
    ) {
        $this->currentBaseUrl = $apiUrl;
    }

    public function resolveBaseUrl(): string
    {
        return $this->currentBaseUrl;
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        $this->authenticatePendingRequest($pendingRequest);
    }

    protected function setAccessToken(): void
    {
        $response = $this->send(
            new LoginRequest($this->email, $this->password)
        );

        if ($response->failed()) {
            throw new AuthenticationException(
                'Failed to authenticate with CX Engine API. Please check your credentials.'
            );
        }

        $body = $response->json();

        $this->apiUser = $body['user'] ?? [];
        $this->apiToken = $body['token'];

        if ($this->tenantId) {
            $switchResponse = $this->send(
                new SwitchToRequest($this->tenantId)
            );

            if ($switchResponse->failed()) {
                throw new AuthenticationException(
                    'Failed to switch to workspace. Please check the tenant ID.'
                );
            }

            $switchBody = $switchResponse->json();
            $this->apiToken = $switchBody['token'];

            if ($this->tenantApiUrl) {
                $this->currentBaseUrl = $this->tenantApiUrl;
            }
        }
    }

    protected function authenticatePendingRequest(PendingRequest $pendingRequest): void
    {
        if (get_class($pendingRequest->getRequest()) === LoginRequest::class) {
            return;
        }

        if ($pendingRequest->hasMockClient()) {
            return;
        }

        if (!isset($this->apiToken)) {
            $this->setAccessToken();
        }

        $pendingRequest->authenticate(new TokenAuthenticator($this->apiToken));
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function defaultConfig(): array
    {
        return [
            'timeout' => 60,
        ];
    }

    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator {
            protected ?int $perPageLimit = 40;

            protected function isLastPage(Response $response): bool
            {
                return is_null($response->json('next_page_url'));
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data') ?? [];
            }
        };
    }

    public function routingContacts(): RoutingContactResource
    {
        return new RoutingContactResource($this);
    }

    public function routingFields(): RoutingFieldResource
    {
        return new RoutingFieldResource($this);
    }

    public function geoRouting(): GeoRoutingResource
    {
        return new GeoRoutingResource($this);
    }

    public function callQueues(): CallQueueResource
    {
        return new CallQueueResource($this);
    }

    public function ctis(): CtiResource
    {
        return new CtiResource($this);
    }

    public function cfdTokens(): CfdTokenResource
    {
        return new CfdTokenResource($this);
    }

    public function surveys(): SurveyResource
    {
        return new SurveyResource($this);
    }
}
