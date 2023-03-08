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
use MageDesk\Geliver\Service\Mappers\ShipmentMapper;
use Magento\Framework\Exception\LocalizedException;

class OrderMapper extends AbstractMapper
{
    /**
     * @var ConfigDataProvider
     */
    private $configDataProvider;

    /**
     * @var ShipmentMapper
     */
    private $shipmentMapper;

    /**
     * @param ConfigDataProvider $configDataProvider
     * @param ShipmentMapper $shipmentMapper
     */
    public function __construct(
        ConfigDataProvider $configDataProvider,
        ShipmentMapper $shipmentMapper
    ) {
        $this->configDataProvider = $configDataProvider;
        $this->shipmentMapper = $shipmentMapper;
    }

    /**
     * Map data
     *
     * @param ShipBox $shipBox
     * @return array
     * @throws LocalizedException
     */
    public function map($shipBox)
    {
        $responseData = [];
        $responseData['providerServiceCode'] = $data['shipping_method'] ?? '';
        $responseData['test'] = $this->configDataProvider->isTestMode();
        $responseData['shipment'] = $this->shipmentMapper->map($data);

        return $responseData;
    }
}
