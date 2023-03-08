<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Engines;

use MageDesk\Geliver\Api\Data\GeliverOrderInterface;
use MageDesk\Geliver\Api\GeliverOrderRepositoryInterface;
use MageDesk\Geliver\Model\Data\ShipBox;
use MageDesk\Geliver\Service\Endpoints\CreateOrderService;
use MageDesk\Geliver\Service\Mappers\OneRequestOrderMapper;
use Magento\Framework\DataObject;
use Magento\Sales\Model\Order;
use MageDesk\Geliver\Service\Endpoints\GetRequest;
use MageDesk\Geliver\Api\Data\ShipmentInterface;
use MageDesk\Geliver\Service\Endpoints\GetOffersService;
use MageDesk\Geliver\Service\Mappers\ShipmentMapper;
use MageDesk\Geliver\Api\ShipmentRepositoryInterface;
use Magento\Framework\Message\ManagerInterface;

class GetOffersEngine
{
    /**
     * @var ShipmentInterface
     */
    private $shipment;

    /**
     * @var GetOffersService
     */
    private $getOffersService;

    /**
     * @var ShipmentMapper
     */
    private $shipmentMapper;

    /**
     * @var ShipmentRepositoryInterface
     */
    private $shipmentRepository;

    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * @param ShipmentInterface $shipment
     * @param GetOffersService $getOffersService
     * @param ShipmentMapper $shipmentMapper
     * @param ShipmentRepositoryInterface $shipmentRepository
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        ShipmentInterface $shipment,
        GetOffersService $getOffersService,
        ShipmentMapper $shipmentMapper,
        ShipmentRepositoryInterface $shipmentRepository,
        ManagerInterface $messageManager
    ) {
        $this->shipment = $shipment;
        $this->getOffersService = $getOffersService;
        $this->shipmentMapper = $shipmentMapper;
        $this->shipmentRepository = $shipmentRepository;
        $this->messageManager = $messageManager;
    }

    /**
     * Execute engine
     *
     * @param ShipBox $shipBox
     * @return void
     * @throws \Exception
     */
    public function execute($shipBox)
    {
        $body = $this->shipmentMapper->map($shipBox);
        $this->getOffersService->setBody($body);
        $response = $this->getOffersService->execute();
        if (!isset($response['data']['offers']['list'])) {
            $this->messageManager->addError($response['message']);
            return;
        }
        $this->shipment->parseShipBox($shipBox);
        $this->shipment->setOffersObject($response['data']['offers']['list']);
        $this->shipment->setOrderId($response['data']['orderID']);
        $this->shipmentRepository->save($this->shipment);
    }
}
