<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use MageDesk\Geliver\Api\Data\ShipmentInterface;
use MageDesk\Geliver\Api\Data\ShipmentInterfaceFactory;

class Shipment extends AbstractModel
{
    /**
     * @param Context $context
     * @param Registry $registry
     * @param DataObjectHelper $dataObjectHelper
     * @param ShipmentInterfaceFactory $shipmentDataFactory
     * @param ResourceModel\Shipment $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        private readonly DataObjectHelper $dataObjectHelper,
        private readonly  ShipmentInterfaceFactory $shipmentDataFactory,
        ResourceModel\Shipment $resource,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Get data model
     *
     * @return ShipmentInterface
     */
    public function getDataModel(): ShipmentInterface
    {
        $data = $this->getData();

        $dataObject = $this->shipmentDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $dataObject,
            $data,
            ShipmentInterfaceFactory::class
        );

        return $dataObject;
    }
}
