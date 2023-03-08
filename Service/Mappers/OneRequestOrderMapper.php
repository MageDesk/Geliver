<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

declare(strict_types=1);

namespace MageDesk\Geliver\Service\Mappers;

use MageDesk\Geliver\DataProvider\ConfigDataProvider;
use Magento\Framework\DataObject\Copy;
use MageDesk\Geliver\Service\Mappers\ShipmentMapper;
use Magento\Framework\Exception\LocalizedException;

class OneRequestOrderMapper extends AbstractMapper
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
     * Map order data
     *
     * @param Order $data
     * @return array|null
     */
    public function map($data)
    {
        return null;
    }
}
