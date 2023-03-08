<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

declare(strict_types=1);

namespace MageDesk\Geliver\Service\RequestClient;

use MageDesk\Geliver\Api\EndpointServiceInterface;
use Magento\Framework\HTTP\Client\Curl as HttpClient;
use Magento\Framework\HTTP\Client\CurlFactory as HttpClientFactory;
use MageDesk\Geliver\DataProvider\ConfigDataProvider;
use MageDesk\Geliver\Service\Endpoints\AbstractService;
use Magento\Framework\Exception\LocalizedException;

class ClientService
{

    /**
     * @var HttpClientFactory
     */
    private $httpClientFactory;

    /**
     * @var ConfigDataProvider
     */
    private $configDataProvider;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var TokenCheckService
     */
    private $tokenCheckService;

    /**
     * @param HttpClientFactory $httpClientFactory
     * @param ConfigDataProvider $configDataProvider
     */
    public function __construct(
        HttpClientFactory $httpClientFactory,
        ConfigDataProvider $configDataProvider
    ) {
        $this->httpClientFactory = $httpClientFactory;
        $this->configDataProvider = $configDataProvider;
    }

    /**
     * Get HTTP client
     *
     * @return HttpClient
     */
    public function getHttpClient(): HttpClient
    {
        if (null === $this->httpClient) {
            $this->httpClient = $this->httpClientFactory->create();
        }

        return $this->httpClient;
    }

    /**
     * Execute request
     *
     * @param AbstractService $endpointService
     * @param bool $json
     * @return null|array
     * @throws \Exception
     */
    public function execute(AbstractService $endpointService, $json = true)
    {
        if (!$this->getAccessToken()) {
            throw new LocalizedException('Access token is not set');
        }

        $this->getHttpClient()->addHeader('Content-Type', 'application/json');
        $this->getHttpClient()->addHeader('Authorization', 'Bearer ' . $this->getAccessToken());
        $this->executeRequest($endpointService);
        $response = $json ? json_decode($this->getHttpClient()->getBody(), true) : $this->getHttpClient()->getBody();

        return $response;
    }

    /**
     * Get response body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->getHttpClient()->getBody();
    }

    /**
     * Get Access Token
     *
     * @return null|string
     */
    private function getAccessToken(): ?string
    {
        return $this->configDataProvider->getAccessToken();
    }

    /**
     * Execute request
     *
     * @param AbstractService $endpointService
     * @return void
     * @throws \Exception
     */
    private function executeRequest(AbstractService $endpointService): void
    {
        $body = $endpointService->getBody();
        $fullUrl = $endpointService->getUrl();
        try {
            switch ($endpointService->getType()) {
                case AbstractService::GET_METHOD:
                    $this->getHttpClient()->get($fullUrl);
                    break;
                case AbstractService::POST_METHOD:
                    $this->getHttpClient()->post($fullUrl, json_encode($body));
                    break;
            }
        } catch (\Exception $e) {
            throw new LocalizedException($e->getMessage());
        }
        $this->checkResponseStatus();
    }

    /**
     * Check response status
     *
     * @return void
     */
    private function checkResponseStatus(): void
    {
        if ($this->getHttpClient()->getStatus() === 401) {
            $this->tokenCheckService->checkToken();
        }
    }
}
