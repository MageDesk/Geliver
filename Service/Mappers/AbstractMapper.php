<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Mappers;

use MageDesk\Geliver\Api\Data\ShipBoxInterface;
use Magento\Framework\DataObject\Copy;
use MageDesk\Geliver\Api\MapperInterface;

abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var Copy
     */
    protected Copy $objectCopyService;

    /**
     * AbstractMapper constructor.
     * @param Copy $objectCopyService
     */
    public function __construct(
        Copy $objectCopyService
    ) {
        $this->objectCopyService = $objectCopyService;
    }

    /**
     * Map data
     *
     * @param ShipBoxInterface $data
     * @return array|void
     */
    abstract public function map($data);
}
