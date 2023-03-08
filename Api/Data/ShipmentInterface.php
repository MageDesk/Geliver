<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ShipmentInterface extends ExtensibleDataInterface
{
    public const ENTITY_ID = 'entity_id';
    public const ORDER_ID = 'order_id';
    public const OFFERS = 'offers';
    public const LABEL_URL = 'label_url';
    public const AMOUNT = 'amount';
    public const LENGTH = 'length';
    public const HEIGHT = 'height';
    public const WIDTH = 'width';
    public const WEIGHT = 'weight';
    public const SHIPMENT_ID = 'shipment_id';
    public const IS_SHIPPED = 'is_shipped';
    public const MAGENTO_SHIPMENT_ID = 'magento_shipment_id';
    public const BARCODE = 'barcode';
    public const TRACK_NUMBER = 'track_number';
    public const PROVIDER = 'provider';

    /**
     * Get Entity ID
     *
     * @return int|null
     */
    public function getEntityId(): ?int;

    /**
     * Set Entity ID
     *
     * @param int $entity_id
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setEntityId(int $entity_id): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Order ID
     *
     * @return string|null
     */
    public function getOrderId(): ?string;

    /**
     * Set Order ID
     *
     * @param string $order_id
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setOrderId(string $order_id): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Offers
     *
     * @return string|null
     */
    public function getOffers(): ?string;

    /**
     * Set Offers
     *
     * @param string $offers
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setOffers(string $offers): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Set Offers as object
     *
     * @param array $offers
     * @return ShipmentInterface
     */
    public function setOffersObject(array $offers): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Label URL
     *
     * @return string|null
     */
    public function getLabelUrl(): ?string;

    /**
     * Set Label URL
     *
     * @param string $label_url
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setLabelUrl(string $label_url): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Amount
     *
     * @return string|null
     */
    public function getAmount(): ?string;

    /**
     * Set Amount
     *
     * @param string $amount
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setAmount(string $amount): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Length
     *
     * @return string|null
     */
    public function getLength(): ?string;

    /**
     * Set Length
     *
     * @param string $length
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setLength(string $length): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Height
     *
     * @return string|null
     */
    public function getHeight(): ?string;

    /**
     * Set Height
     *
     * @param string $height
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setHeight(string $height): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Width
     *
     * @return string|null
     */
    public function getWidth(): ?string;

    /**
     * Set Width
     *
     * @param string $width
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setWidth(string $width): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Weight
     *
     * @return string|null
     */
    public function getWeight(): ?string;

    /**
     * Set Weight
     *
     * @param string $weight
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setWeight(string $weight): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Shipment ID
     *
     * @return string|null
     */
    public function getShipmentId(): ?string;

    /**
     * Set Shipment ID
     *
     * @param string $shipment_id
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setShipmentId(string $shipment_id): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Is Shipped
     *
     * @return int|null
     */
    public function getIsShipped(): ?int;

    /**
     * Set Is Shipped
     *
     * @param int $is_shipped
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setIsShipped(int $is_shipped): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Magento Shipment ID
     *
     * @return int|null
     */
    public function getMagentoShipmentId(): ?int;

    /**
     * Set Magento Shipment ID
     *
     * @param int $magento_shipment_id
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setMagentoShipmentId(int $magento_shipment_id): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Barcode
     *
     * @return string|null
     */
    public function getBarcode(): ?string;

    /**
     * Set Barcode
     *
     * @param string $barcode
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setBarcode(string $barcode): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Track Number
     *
     * @return string|null
     */
    public function getTrackNumber(): ?string;

    /**
     * Set Track Number
     *
     * @param string $track_number
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setTrackNumber(string $track_number): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Provider
     *
     * @return string|null
     */
    public function getProvider(): ?string;

    /**
     * Set Provider
     *
     * @param string $provider
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface
     */
    public function setProvider(string $provider): \MageDesk\Geliver\Api\Data\ShipmentInterface;

    /**
     * Get Extention Attributes
     *
     * @return \MageDesk\Geliver\Api\Data\ShipmentExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\MageDesk\Geliver\Api\Data\ShipmentExtensionInterface;

    /**
     * Set Extention Attributes
     *
     * @param \MageDesk\Geliver\Api\Data\ShipmentExtensionInterface $extensionAttributes
     * @return static
     */
    public function setExtensionAttributes(
        \MageDesk\Geliver\Api\Data\ShipmentExtensionInterface $extensionAttributes
    ): static;
}
