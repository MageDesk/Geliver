<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Api;

use MageDesk\Geliver\Api\Data\ShipBoxInterface;

/**
 * Interface MapperInterface
 */
interface MapperInterface
{

    /**
     * Map data
     *
     * @param ShipBoxInterface $data
     * @return array
     */
    public function map(ShipBoxInterface $data);
}
