<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Model\ResourceModel\Shipment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageDesk\Geliver\Model\Shipment;

class Collection extends AbstractCollection
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(Shipment::class, \MageDesk\Geliver\Model\ResourceModel\Shipment::class);
    }
}
