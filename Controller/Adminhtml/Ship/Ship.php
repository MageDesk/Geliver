<?php
/*
 * @author Atwix Team
 * @copyright Copyright (c) Atwix (https://www.atwix.com/)
 */

namespace MageDesk\Geliver\Controller\Adminhtml\Ship;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\App\Request\Http;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Sales\Api\ShipmentRepositoryInterface;
use MageDesk\Geliver\Service\Engines\CreateOrderEngine;
use MageDesk\Geliver\Service\Engines\GetOffersEngine;
use MageDesk\Geliver\Service\Engines\PickOfferEngine;
use MageDesk\Geliver\Service\Engines\UpdateOffersEngine;
use MageDesk\Geliver\Model\Data\ShipBox;

class Ship extends \Magento\Backend\App\Action
{
    /**
     * @var ResultInterface
     */
    private $result;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var Http
     */
    private $request;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var Redirect
     */
    private $redirect;

    /**
     * @var ShipmentRepositoryInterface
     */
    private $shipmentRepository;

    /**
     * @var CreateOrderEngine
     */
    private $CreateOrderEngine;

    /**
     * @var GetOffersEngine
     */
    private $GetOffersEngine;

    /**
     * @var PickOfferEngine
     */
    private $PickOfferEngine;

    /**
     * @var UpdateOffersEngine
     */
    private $UpdateOffersEngine;

    /**
     * @var ShipBox
     */
    private $shipBox;

    /**
     * @param Context $context
     * @param Http $request
     * @param OrderRepositoryInterface $orderRepository
     * @param Redirect $redirect
     * @param ShipmentRepositoryInterface $shipmentRepository
     * @param CreateOrderEngine $CreateOrderEngine
     * @param GetOffersEngine $GetOffersEngine
     * @param PickOfferEngine $PickOfferEngine
     * @param UpdateOffersEngine $UpdateOffersEngine
     * @param ShipBox $shipBox
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        Http $request,
        OrderRepositoryInterface $orderRepository,
        Redirect $redirect,
        ShipmentRepositoryInterface $shipmentRepository,
        CreateOrderEngine $CreateOrderEngine,
        GetOffersEngine $GetOffersEngine,
        PickOfferEngine $PickOfferEngine,
        UpdateOffersEngine $UpdateOffersEngine,
        ShipBox $shipBox
    ) {
        parent::__construct($context);
        $this->request = $request;
        $this->orderRepository = $orderRepository;
        $this->redirect = $redirect;
        $this->shipmentRepository = $shipmentRepository;
        $this->CreateOrderEngine = $CreateOrderEngine;
        $this->GetOffersEngine = $GetOffersEngine;
        $this->PickOfferEngine = $PickOfferEngine;
        $this->UpdateOffersEngine = $UpdateOffersEngine;
        $this->shipBox = $shipBox;
    }

    /**
     * Execute action based on request and return result
     *
     * @return void
     * @throws \Exception
     */
    public function execute()
    {
        $shipment = $this->shipmentRepository->get($this->request->getParam('shipment_id'));
        $method = $this->request->getParam('method');
        $offerId = $this->request->getParam('offer_id') ?? false;
        $this->shipBox->setShipment($shipment);

        if ($method == 'form') {
            $isDefault = $this->request->getParam('is_default');
            $isNew = $this->request->getParam('is_new');
            $this->shipBox->setWidth($this->request->getParam('width'));
            $this->shipBox->setHeight($this->request->getParam('height'));
            $this->shipBox->setLength($this->request->getParam('length'));
            $this->shipBox->setWeight($this->request->getParam('weight'));

            if ($isDefault) {
                $this->CreateOrderEngine->execute($this->shipBox);
            } elseif ($isNew) {
                $this->GetOffersEngine->execute($this->shipBox);
            } else {
                $this->UpdateOffersEngine->execute($this->shipBox);
            }
        } elseif ($offerId) {
            $this->shipBox->setOfferId($offerId);
            $this->PickOfferEngine->execute($this->shipBox);
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $this->_redirect($this->_redirect->getRefererUrl());
    }
}
