<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use MageDesk\Geliver\Api\Data\ShipmentInterface;
use MageDesk\Geliver\Api\Data\ShipmentSearchResultsInterface;

interface ShipmentRepositoryInterface
{
    /**
     * Get Shipment by id
     *
     * @param int $id
     * @return ShipmentInterface
     */
    public function get(int $id): ShipmentInterface;

    /**
     * Search for Shipment
     *
     * @param SearchCriteriaInterface $criteria
     * @return ShipmentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria): ShipmentSearchResultsInterface;

    /**
     * Save Shipment
     *
     * @param ShipmentInterface $entity
     * @return ShipmentInterface
     */
    public function save(ShipmentInterface $entity): ShipmentInterface;

    /**
     * Delete Shipment
     *
     * @param ShipmentInterface $entity
     * @return bool
     */
    public function delete(ShipmentInterface $entity): bool;

    /**
     * Delete Shipment by id
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
