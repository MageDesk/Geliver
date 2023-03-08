<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Engines;

use MageDesk\Geliver\Api\Data\GeliverOrderInterface;
use MageDesk\Geliver\Api\Data\ShipBoxInterface;
use MageDesk\Geliver\Api\Data\ShipmentInterface;
use MageDesk\Geliver\Api\GeliverOrderRepositoryInterface;
use MageDesk\Geliver\Service\Endpoints\CreateOrderService;
use MageDesk\Geliver\Service\Mappers\OneRequestOrderMapper;
use Magento\Framework\DataObject;
use Magento\Sales\Model\Order;
use MageDesk\Geliver\Service\Endpoints\GetRequest;
use MageDesk\Geliver\Service\Endpoints\PickOfferService;
use MageDesk\Geliver\Api\ShipmentRepositoryInterface;
use Magento\Framework\Message\ManagerInterface;

class PickOfferEngine
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
     * @var PickOfferService
     */
    private $pickOfferService;

    /**
     * @var ShipmentRepositoryInterface
     */
    private $shipmentRepository;

    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * @param CreateOrderService $createOrderService
     * @param OneRequestOrderMapper $orderMapper
     * @param GetRequest $getRequest
     * @param PickOfferService $pickOfferService
     * @param ShipmentRepositoryInterface $shipmentRepository
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        CreateOrderService $createOrderService,
        OneRequestOrderMapper $orderMapper,
        GetRequest $getRequest,
        PickOfferService $pickOfferService,
        ShipmentRepositoryInterface $shipmentRepository,
        ManagerInterface $messageManager
    ) {
        $this->createOrderService = $createOrderService;
        $this->orderMapper = $orderMapper;
        $this->getRequest = $getRequest;
        $this->pickOfferService = $pickOfferService;
        $this->shipmentRepository = $shipmentRepository;
        $this->messageManager = $messageManager;
    }

    /**
     * Execute engine
     *
     * @param ShipBoxInterface $shipBox
     * @return void
     * @throws \Exception
     */
    public function execute($shipBox)
    {
        $this->pickOfferService->setOfferId($shipBox->getOfferId());
        $response = $this->pickOfferService->execute();
        if (!isset($response['data'])) {
            $this->messageManager->addError($response['message']);
            return;
        }
        /** @var ShipmentInterface $geliverShipment */
        $geliverShipment = $shipBox->getGeliverShipment();
        $geliverShipment->setLabelUrl($response['data']['shipment']['labelURL']);
        $geliverShipment->setShipmentId($response['data']['shipment']['id']);
        $geliverShipment->setAmount(
            $response['data']['shipment']['amount'] . ' ' . $response['data']['shipment']['currency']
        );
        $geliverShipment->setBarcode($response['data']['shipment']['barcode']);
        $geliverShipment->setProvider($response['data']['shipment']['providerServiceCode']);
        $geliverShipment->setOffersObject($response['data']['shipment']);
        $geliverShipment->setIsShipped(true);
        $geliverShipment->save();
    }
}
