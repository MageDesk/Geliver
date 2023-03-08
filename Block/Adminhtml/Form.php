<?php
/*
 * @author Atwix Team
 * @copyright Copyright (c) Atwix (https://www.atwix.com/)
 */

namespace MageDesk\Geliver\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use MageDesk\Geliver\Api\ShipmentRepositoryInterface;
use MageDesk\Geliver\Model\ResourceModel\Shipment\CollectionFactory;
use MageDesk\Geliver\Model\Shipment;
use Magento\Framework\View\Element\Template\Context;
use Magento\Sales\Api\ShipmentRepositoryInterface as MagentoShipmentRepositoryInterface;
use Magento\Framework\Data\Form\FormKey;

class Form extends Template
{
    /**
     * @var ShipmentRepositoryInterface
     */
    private $shipmentRepository;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var string
     */
    protected $_template = 'MageDesk_Geliver::form.phtml';

    /**
     * @var MagentoShipmentRepositoryInterface
     */
    private $magentoShipmentRepository;

    /**
     * @var FormKey
     */
    private $formKey;

    /**
     * Form constructor.
     *
     * @param Context $context
     * @param ShipmentRepositoryInterface $shipmentRepository
     * @param CollectionFactory $collectionFactory
     * @param MagentoShipmentRepositoryInterface $magentoShipmentRepository
     * @param FormKey $formKey
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        ShipmentRepositoryInterface $shipmentRepository,
        CollectionFactory $collectionFactory,
        MagentoShipmentRepositoryInterface $magentoShipmentRepository,
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->shipmentRepository = $shipmentRepository;
        $this->collectionFactory = $collectionFactory;
        $this->magentoShipmentRepository = $magentoShipmentRepository;
        $this->formKey = $formKey;
    }

    /**
     * Get Magento shipment id
     *
     * @return mixed
     */
    public function getShipmentId()
    {
        return $this->getRequest()->getParam('shipment_id');
    }

    /**
     * Get Geliver shipment
     *
     * @return mixed
     */
    public function getGeliverShipment()
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('magento_shipment_id', $this->getShipmentId())->getFirstItem();
    }

    /**
     * Check if shipment is Geliver shipment
     *
     * @return bool
     */
    public function isGeliverShipment()
    {
        return explode("_", $this->magentoShipmentRepository->get($this->getShipmentId())
                ->getOrder()->getShippingMethod())[0] === 'mgdskGlvr';
    }

    /**
     * Get Form Key
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
