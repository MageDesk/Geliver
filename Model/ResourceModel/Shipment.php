<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Shipment extends AbstractDb
{
    public const MAIN_TABLE = 'magedesk_geliver_shipment';

    public const ID_FIELD_NAME = 'entity_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
