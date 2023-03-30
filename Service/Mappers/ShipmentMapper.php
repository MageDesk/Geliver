<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

declare(strict_types=1);

namespace MageDesk\Geliver\Service\Mappers;

use MageDesk\Geliver\DataProvider\ConfigDataProvider;
use MageDesk\Geliver\Model\Data\ShipBox;
use Magento\Framework\DataObject\Copy;
use Magento\Framework\Exception\LocalizedException;

class ShipmentMapper extends AbstractMapper
{
    /**
     * @var ConfigDataProvider
     */
    private $configDataProvider;

    /**
     * @param ConfigDataProvider $configDataProvider
     */
    public function __construct(
        ConfigDataProvider $configDataProvider
    ) {
        $this->configDataProvider = $configDataProvider;
    }

    /**
     * Shipment mapper
     *
     * @param ShipBox $shipBox
     * @return array
     * @throws LocalizedException
     */
    public function map($shipBox)
    {
        $responseData = [];
        $responseData['test'] = $this->configDataProvider->isTestMode();
        $responseData['senderAddressID'] = $this->configDataProvider->getSenderAddressId();
        $responseData['returnAddressID'] = $this->configDataProvider->getReturnAddressId();
        $responseData['length'] = $shipBox->getLength();
        $responseData['height'] = $shipBox->getHeight();
        $responseData['width'] = $shipBox->getWidth();
        $responseData['distanceUnit'] = 'cm';
        $responseData['weight'] = $shipBox->getWeight();
        $responseData['massUnit'] = 'kg';
        $responseData['items'] = [];
        foreach ($shipBox->getShipment()->getItems() as $item) {
            $responseData['items'][] = [
                'title' => $item['name'],
                'quantity' => (int) $item['qty']
            ];
        }
        /** @var \Magento\Sales\Model\Order\Address $shippingAddress */
        $shippingAddress = $shipBox->getShipment()->getOrder()->getShippingAddress();
        $responseData['recipientAddress'] = [];
        $responseData['recipientAddress']['name'] =
            $shippingAddress->getFirstname() . ' ' . $shippingAddress->getLastname();
        $responseData['recipientAddress']['email'] = $shippingAddress->getEmail();
        $responseData['recipientAddress']['phone'] =         $responseData['recipientAddress']['phone'] = strlen($shippingAddress->getTelephone()) == 13 ?
            $shippingAddress->getTelephone() : '+90' . $shippingAddress->getTelephone();
        $responseData['recipientAddress']['address1'] =
            $shippingAddress->getStreetLine(1) . ' ' . $shippingAddress->getStreetLine(2);
        $responseData['recipientAddress']['countryCode'] = $shippingAddress->getCountryId();
        $responseData['recipientAddress']['cityCode'] = $shippingAddress->getRegionCode();
        $responseData['recipientAddress']['districtName'] = $shippingAddress->getCity();

        return $responseData;
    }
}
