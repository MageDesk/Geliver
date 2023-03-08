<?php

declare(strict_types=1);

namespace MageDesk\Geliver\Model;

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use MageDesk\Geliver\Api\Data\ShipmentInterface;
use MageDesk\Geliver\Api\Data\ShipmentInterfaceFactory;
use MageDesk\Geliver\Api\Data\ShipmentSearchResultsInterface;
use MageDesk\Geliver\Api\Data\ShipmentSearchResultsInterfaceFactory;
use MageDesk\Geliver\Api\ShipmentRepositoryInterface;
use MageDesk\Geliver\Model\ResourceModel\Shipment as ResourceShipment;
use MageDesk\Geliver\Model\ResourceModel\Shipment\CollectionFactory as ShipmentCollectionFactory;

class ShipmentRepository implements ShipmentRepositoryInterface
{
    /**
     * @param ResourceShipment $resource
     * @param ShipmentFactory $shipmentFactory
     * @param ShipmentCollectionFactory $shipmentCollectionFactory
     * @param ShipmentSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        private readonly ResourceShipment $resource,
        private readonly ShipmentFactory $shipmentFactory,
        private readonly ShipmentCollectionFactory $shipmentCollectionFactory,
        private readonly ShipmentSearchResultsInterfaceFactory $searchResultsFactory,
        private readonly CollectionProcessorInterface $collectionProcessor,
        private readonly JoinProcessorInterface $extensionAttributesJoinProcessor,
        private readonly ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
    }

    /**
     * @inheritDoc
     */
    public function save(ShipmentInterface $entity): ShipmentInterface
    {
        $shipmentData = $this->extensibleDataObjectConverter->toNestedArray(
            $entity,
            [],
            ShipmentInterface::class
        );

        $shipmentModel = $this->shipmentFactory->create()->setData($shipmentData);

        try {
            $this->resource->save($shipmentModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the shipment: %1',
                $exception->getMessage()
            ));
        }
        return $shipmentModel->getDataModel();
    }

    /**
     * @inheritDoc
     */
    public function get(int $id): ShipmentInterface
    {
        $shipment = $this->shipmentFactory->create();
        $this->resource->load($shipment, $id);
        if (!$shipment->getId()) {
            throw new NoSuchEntityException(__('Shipment with id "%1" does not exist.', $id));
        }
        return $shipment->getDataModel();
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $criteria): ShipmentSearchResultsInterface
    {
        $collection = $this->shipmentCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            ShipmentInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(ShipmentInterface $shipment): bool
    {
        try {
            $shipmentModel = $this->shipmentFactory->create();
            $this->resource->load($shipmentModel, $shipment->getEntityId());
            $this->resource->delete($shipmentModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Shipment: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }
}
