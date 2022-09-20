<?php

namespace PortuguesePastry\Form\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class AllergensOptions implements OptionSourceInterface
{
    public const ATTRIBUTE_OPTIONS = [
        ['label' => 'No Allergens', 'value' => "0"],
        ['label' => 'Contains Allergens', 'value' => "1"],
    ];

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return self::ATTRIBUTE_OPTIONS;
    }
}