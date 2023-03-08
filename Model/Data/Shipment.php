<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Model\Data;

use MageDesk\Geliver\Api\Data\ShipBoxInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use MageDesk\Geliver\Api\Data\ShipmentExtensionInterface;
use MageDesk\Geliver\Api\Data\ShipmentInterface;

class Shipment extends AbstractExtensibleObject implements ShipmentInterface
{
    /**
     * Get entity_id
     *
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     *
     * @param int $entity_id
     * @return ShipmentInterface
     */
    public function setEntityId(int $entity_id): ShipmentInterface
    {
        return $this->setData(self::ENTITY_ID, $entity_id);
    }

    /**
     * Get order_id
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->_get(self::ORDER_ID);
    }

    /**
     * Set order_id
     *
     * @param string $order_id
     * @return ShipmentInterface
     */
    public function setOrderId(string $order_id): ShipmentInterface
    {
        return $this->setData(self::ORDER_ID, $order_id);
    }

    /**
     * Get offers
     *
     * @return string|null
     */
    public function getOffers(): ?string
    {
        return $this->_get(self::OFFERS);
    }

    /**
     * Set offers
     *
     * @param string $offers
     * @return ShipmentInterface
     */
    public function setOffers(string $offers): ShipmentInterface
    {
        return $this->setData(self::OFFERS, $offers);
    }

    /**
     * Get label_url
     *
     * @return string|null
     */
    public function getLabelUrl(): ?string
    {
        return $this->_get(self::LABEL_URL);
    }

    /**
     * Set label_url
     *
     * @param string $label_url
     * @return ShipmentInterface
     */
    public function setLabelUrl(string $label_url): ShipmentInterface
    {
        return $this->setData(self::LABEL_URL, $label_url);
    }

    /**
     * Get amount
     *
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->_get(self::AMOUNT);
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return ShipmentInterface
     */
    public function setAmount(string $amount): ShipmentInterface
    {
        return $this->setData(self::AMOUNT, $amount);
    }

    /**
     * Get label_url
     *
     * @return string|null
     */
    public function getLength(): ?string
    {
        return $this->_get(self::LENGTH);
    }

    /**
     * Set length
     *
     * @param string $length
     * @return ShipmentInterface
     */
    public function setLength(string $length): ShipmentInterface
    {
        return $this->setData(self::LENGTH, $length);
    }

    /**
     * Get height
     *
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->_get(self::HEIGHT);
    }

    /**
     * Set height
     *
     * @param string $height
     * @return ShipmentInterface
     */
    public function setHeight(string $height): ShipmentInterface
    {
        return $this->setData(self::HEIGHT, $height);
    }

    /**
     * Get width
     *
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->_get(self::WIDTH);
    }

    /**
     * Set width
     *
     * @param string $width
     * @return ShipmentInterface
     */
    public function setWidth(string $width): ShipmentInterface
    {
        return $this->setData(self::WIDTH, $width);
    }

    /**
     * Get weight
     *
     * @return string|null
     */
    public function getWeight(): ?string
    {
        return $this->_get(self::WEIGHT);
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return ShipmentInterface
     */
    public function setWeight(string $weight): ShipmentInterface
    {
        return $this->setData(self::WEIGHT, $weight);
    }

    /**
     * Get shipment_id
     *
     * @return string|null
     */
    public function getShipmentId(): ?string
    {
        return $this->_get(self::SHIPMENT_ID);
    }

    /**
     * Set shipment_id
     *
     * @param string $shipment_id
     * @return ShipmentInterface
     */
    public function setShipmentId(string $shipment_id): ShipmentInterface
    {
        return $this->setData(self::SHIPMENT_ID, $shipment_id);
    }

    /**
     * Get is shipped
     *
     * @return int|null
     */
    public function getIsShipped(): ?int
    {
        return $this->_get(self::IS_SHIPPED);
    }

    /**
     * Set is shipped
     *
     * @param int $is_shipped
     * @return ShipmentInterface
     */
    public function setIsShipped(int $is_shipped): ShipmentInterface
    {
        return $this->setData(self::IS_SHIPPED, $is_shipped);
    }

    /**
     * Get magento shipment id
     *
     * @return int|null
     */
    public function getMagentoShipmentId(): ?int
    {
        return $this->_get(self::MAGENTO_SHIPMENT_ID);
    }

    /**
     * Set magento shipment id
     *
     * @param int $magento_shipment_id
     * @return ShipmentInterface
     */
    public function setMagentoShipmentId(int $magento_shipment_id): ShipmentInterface
    {
        return $this->setData(self::MAGENTO_SHIPMENT_ID, $magento_shipment_id);
    }

    /**
     * Get barcode
     *
     * @return string|null
     */
    public function getBarcode(): ?string
    {
        return $this->_get(self::BARCODE);
    }

    /**
     * Set barcode
     *
     * @param string $barcode
     * @return ShipmentInterface
     */
    public function setBarcode(string $barcode): ShipmentInterface
    {
        return $this->setData(self::BARCODE, $barcode);
    }

    /**
     * Get track number
     *
     * @return string|null
     */
    public function getTrackNumber(): ?string
    {
        return $this->_get(self::TRACK_NUMBER);
    }

    /**
     * Set track number
     *
     * @param string $track_number
     * @return ShipmentInterface
     */
    public function setTrackNumber(string $track_number): ShipmentInterface
    {
        return $this->setData(self::TRACK_NUMBER, $track_number);
    }

    /**
     * Parse ship box
     *
     * @param ShipBoxInterface $shipBox
     * @return void
     */
    public function parseShipBox(ShipBoxInterface $shipBox)
    {
        $this->setWidth($shipBox->getWidth());
        $this->setHeight($shipBox->getHeight());
        $this->setLength($shipBox->getLength());
        $this->setWeight($shipBox->getWeight());
        if ($shipBox->getShipment()) {
            $this->setMagentoShipmentId((int)$shipBox->getShipment()->getEntityId());
        }
    }

    /**
     * Get Provider
     *
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->_get(self::PROVIDER);
    }

    /**
     * Set Provider
     *
     * @param string $provider
     * @return ShipmentInterface
     */
    public function setProvider(string $provider): ShipmentInterface
    {
        return $this->setData(self::PROVIDER, $provider);
    }

    /**
     * Set Offers Object
     *
     * @param array $offers
     * @return ShipmentInterface
     */
    public function setOffersObject(array $offers): ShipmentInterface
    {
        $offers = json_encode($offers);
        $this->setOffers($offers);

        return $this;
    }

    /**
     * Get Extension Attributes
     *
     * @return ShipmentExtensionInterface|null
     */
    public function getExtensionAttributes(): ?ShipmentExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set Extension Attributes
     *
     * @param ShipmentExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        ShipmentExtensionInterface $extensionAttributes
    ): static {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
