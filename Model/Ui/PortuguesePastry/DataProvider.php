<?php

declare(strict_types=1);

namespace PortuguesePastry\Form\Model\Ui\PortuguesePastry;

use Magento\Framework\Session\SessionManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\Collection;
use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\CollectionFactory as PortuguesePastryCollectionFactory;
use PortuguesePastry\Grid\Model\PortuguesePastry;
use PortuguesePastry\Grid\Model\PortuguesePastryFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData = [];

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var PortuguesePastryFactory
     */
    protected $portuguesePastryFactory;

    /**
     * @var SessionManagerInterface
     */
    protected $sessionManager;

    public function __construct(
        PortuguesePastryCollectionFactory $portuguesePastryCollectionFactory,
        PortuguesePastryFactory $portuguesePastryFactory,
        SessionManagerInterface $sessionManager,
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $portuguesePastryCollectionFactory->create();
        $this->portuguesePastryFactory = $portuguesePastryFactory;
        $this->sessionManager = $sessionManager;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if (!empty($this->loadedData)) {
            return $this->loadedData;
        }
        $result = $this->collection->getItems();
        /** @var PortuguesePastry $portuguesePastry */
        foreach ($result as $portuguesePastry) {
            $data['portuguese_pastry'] = $portuguesePastry->getData();
            $data['portuguese_pastry_entity_id'] = $portuguesePastry->getId() ?? null;
            $this->loadedData[$data['portuguese_pastry_entity_id']] = $data;
        }
        return $this->loadedData;
    }
}