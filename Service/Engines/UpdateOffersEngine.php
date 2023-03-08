<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Engines;

use MageDesk\Geliver\Api\Data\GeliverOrderInterface;
use MageDesk\Geliver\Api\Data\ShipBoxInterface;
use MageDesk\Geliver\Api\GeliverOrderRepositoryInterface;
use MageDesk\Geliver\Service\Endpoints\CreateOrderService;
use MageDesk\Geliver\Service\Mappers\OneRequestOrderMapper;
use Magento\Framework\DataObject;
use Magento\Sales\Model\Order;
use MageDesk\Geliver\Service\Endpoints\GetRequest;

class UpdateOffersEngine
{
    /**
     * @var CreateOrderService
     */
    private $createOrderService;

    /**
     * @var OneRequestOrderMapper
     */
    private $orderMapper;

    /**
     * @var GetRequest
     */
    private $getRequest;

    /**
     * @param CreateOrderService $createOrderService
     * @param OneRequestOrderMapper $orderMapper
     * @param GetRequest $getRequest
     */
    public function __construct(
        CreateOrderService $createOrderService,
        OneRequestOrderMapper $orderMapper,
        GetRequest $getRequest
    ) {
        $this->createOrderService = $createOrderService;
        $this->orderMapper = $orderMapper;
        $this->getRequest = $getRequest;
    }

    /**
     * Execute update offers
     *
     * @param ShipBoxInterface $request
     * @return DataObject
     * @throws \Exception
     */
    public function execute($request)
    {
        $orderData = $this->orderMapper->map($request);
        $this->createOrderService->setBody($orderData);
        $response = $this->createOrderService->execute();
        if (!$response['result']) {
            return;
        }

        $responseInfo = new DataObject();
        $responseInfo->setTrackingNumber($response['data']['shipment']['trackingNumber'] ?? '');
        $responseInfo->setShippingLabelContent($response['data']['shipment']['labelURL']);
        return $responseInfo;
    }
}
