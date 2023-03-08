<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Endpoints;

use MageDesk\Geliver\Api\Data\EndpointDataInterface;
use MageDesk\Geliver\Api\EndpointServiceInterface;
use MageDesk\Geliver\Model\Data\EndpointData;
use MageDesk\Geliver\Service\RequestClient\ClientService\Proxy as ClientService;

abstract class AbstractService extends EndpointData
{

    /**
     * @var string
     */
    public const POST_METHOD = 'POST';
    public const GET_METHOD = 'GET';
    public const BASE_URL = 'https://api.geliver.io/api/v1/';

    /**
     * @var string
     */
    protected string $url = '';

    /**
     * @var string
     */
    protected string $type = self::POST_METHOD;

    /**
     * @var bool
     */
    protected bool $response_json = true;

    /**
     * @var ClientService
     */
    protected ClientService $clientService;

    /**
     * AbstractService constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data[EndpointDataInterface::URL] = self::BASE_URL . $this->url;
        $data[EndpointDataInterface::TYPE] = $this->type;
        $this->_data = $data;
    }

    /**
     * Set body param
     *
     * @param string $key
     * @param string $value
     * @return EndpointDataInterface
     */
    public function setBodyParam(string $key, $value): EndpointDataInterface
    {
        $body = $this->getBody();
        $body[$key] = $value;
        $this->setBody($body);

        return $this;
    }

    /**
     * Get body param
     *
     * @param string $key
     * @return mixed
     */
    public function getBodyParam(string $key): EndpointDataInterface
    {
        $body = $this->getBody();
        return $body[$key];
    }

    /**
     * Execute request
     *
     * @param string|null $url
     * @return mixed
     */
    public function execute(string $url = null)
    {
        if ($url) {
            $this->setUrl($url);
        }
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->clientService = $objectManager->create(ClientService::class);
        return $this->clientService->execute($this, $this->response_json);
    }
}
