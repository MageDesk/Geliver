<?php
/*
 * @author Atwix Team
 * @copyright Copyright (c) Atwix (https://www.atwix.com/)
 */

namespace MageDesk\Geliver\Model\Data;

use MageDesk\Geliver\Api\Data\ShipBoxInterface;
use MageDesk\Geliver\Model\Shipment;
use Magento\Framework\DataObject;
use Magento\Sales\Api\Data\ShipmentInterface;
use Magento\Sales\Model\Order\Address;
use MageDesk\Geliver\Model\ResourceModel\Shipment\CollectionFactory;

class ShipBox extends DataObject implements ShipBoxInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        parent::__construct([]);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Getter for Width.
     *
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->getData(self::WIDTH) === null ? null
            : (int)$this->getData(self::WIDTH);
    }

    /**
     * Setter for Width.
     *
     * @param string|null $width
     *
     * @return void
     */
    public function setWidth(?string $width): void
    {
        $this->setData(self::WIDTH, $width);
    }

    /**
     * Getter for Height.
     *
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->getData(self::HEIGHT) === null ? null
            : (int)$this->getData(self::HEIGHT);
    }

    /**
     * Setter for Height.
     *
     * @param string|null $height
     *
     * @return void
     */
    public function setHeight(?string $height): void
    {
        $this->setData(self::HEIGHT, $height);
    }

    /**
     * Getter for Length.
     *
     * @return string|null
     */
    public function getLength(): ?string
    {
        return $this->getData(self::LENGTH) === null ? null
            : (int)$this->getData(self::LENGTH);
    }

    /**
     * Setter for Length.
     *
     * @param string|null $length
     *
     * @return void
     */
    public function setLength(?string $length): void
    {
        $this->setData(self::LENGTH, $length);
    }

    /**
     * Getter for Weight.
     *
     * @return string|null
     */
    public function getWeight(): ?string
    {
        return $this->getData(self::WEIGHT) === null ? null
            : (int)$this->getData(self::WEIGHT);
    }

    /**
     * Setter for Weight.
     *
     * @param string|null $weight
     *
     * @return void
     */
    public function setWeight(?string $weight): void
    {
        $this->setData(self::WEIGHT, $weight);
    }

    /**
     * Getter for Shipment.
     *
     * @return ShipmentInterface|null
     */
    public function getShipment(): ?ShipmentInterface
    {
        return $this->getData(self::SHIPMENT);
    }

    /**
     * Setter for Shipment.
     *
     * @param ShipmentInterface|null $shipment
     *
     * @return void
     */
    public function setShipment(?ShipmentInterface $shipment): void
    {
        $this->setData(self::SHIPMENT, $shipment);
    }

    /**
     * Getter for OfferId.
     *
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->getData(self::OFFER_ID);
    }

    /**
     * Setter for OfferId.
     *
     * @param string|null $offerId
     *
     * @return void
     */
    public function setOfferId(?string $offerId): void
    {
        $this->setData(self::OFFER_ID, $offerId);
    }

    /**
     * Getter for IsTest.
     *
     * @return bool|null
     */
    public function getIsTest(): ?bool
    {
        return $this->getData(self::IS_TEST) === null ? null
            : (bool)$this->getData(self::IS_TEST);
    }

    /**
     * Setter for IsTest.
     *
     * @param bool|null $isTest
     *
     * @return void
     */
    public function setIsTest(?bool $isTest): void
    {
        $this->setData(self::IS_TEST, $isTest);
    }

    /**
     * Getter for GeliverShipment.
     *
     * @return Shipment|null
     */
    public function getGeliverShipment(): ?\MageDesk\Geliver\Model\Shipment
    {
        $shipment = $this->getShipment();
        $geliverShipment = $this->collectionFactory->create()
            ->addFieldToFilter('magento_shipment_id', $shipment->getId())
            ->getFirstItem();
        return $geliverShipment;
    }
}
