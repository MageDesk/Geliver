<?php
/*
 * @author Atwix Team
 * @copyright Copyright (c) Atwix (https://www.atwix.com/)
 */

namespace MageDesk\Geliver\Api\Data;

use Magento\Sales\Api\Data\ShipmentInterface;
use Magento\Customer\Api\Data\AddressInterface;

interface ShipBoxInterface
{
    /**
     * String constants for property names
     */
    public const WIDTH = "width";
    public const HEIGHT = "height";
    public const LENGTH = "length";
    public const WEIGHT = "weight";
    public const SHIPMENT = "shipment";
    public const OFFER_ID = "offer_id";
    public const IS_TEST = "is_test";

    /**
     * Getter for Width.
     *
     * @return string|null
     */
    public function getWidth(): ?string;

    /**
     * Setter for Width.
     *
     * @param string|null $width
     *
     * @return void
     */
    public function setWidth(?string $width): void;

    /**
     * Getter for Height.
     *
     * @return string|null
     */
    public function getHeight(): ?string;

    /**
     * Setter for Height.
     *
     * @param string|null $height
     *
     * @return void
     */
    public function setHeight(?string $height): void;

    /**
     * Getter for Length.
     *
     * @return string|null
     */
    public function getLength(): ?string;

    /**
     * Setter for Length.
     *
     * @param string|null $length
     *
     * @return void
     */
    public function setLength(?string $length): void;

    /**
     * Getter for Weight.
     *
     * @return string|null
     */
    public function getWeight(): ?string;

    /**
     * Setter for Weight.
     *
     * @param string|null $weight
     *
     * @return void
     */
    public function setWeight(?string $weight): void;

    /**
     * Getter for Shipment.
     *
     * @return ShipmentInterface|null
     */
    public function getShipment(): ?ShipmentInterface;

    /**
     * Setter for Shipment.
     *
     * @param ShipmentInterface|null $shipment
     *
     * @return void
     */
    public function setShipment(?ShipmentInterface $shipment): void;

    /**
     * Getter for Offer ID.
     *
     * @return string|null
     */
    public function getOfferId(): ?string;

    /**
     * Setter for Offer ID.
     *
     * @param string|null $offerId
     *
     * @return void
     */
    public function setOfferId(?string $offerId): void;

    /**
     * Getter for Is Test.
     *
     * @return bool|null
     */
    public function getIsTest(): ?bool;

    /**
     * Setter for Is Test.
     *
     * @param bool|null $isTest
     *
     * @return void
     */
    public function setIsTest(?bool $isTest): void;
}
