<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ShipmentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Shipment list.
     *
     * @return \MageDesk\Geliver\Api\Data\ShipmentInterface[]
     */
    public function getItems(): array;

    /**
     * Set Shipment list.
     *
     * @param \MageDesk\Geliver\Api\Data\ShipmentInterface[] $items
     */
    public function setItems(array $items): static;
}
