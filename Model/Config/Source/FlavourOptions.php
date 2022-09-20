<?php

declare(strict_types=1);

namespace PortuguesePastry\Form\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class FlavourOptions implements OptionSourceInterface
{
    public const PORTUGUESE_PASTRY_FLAVOURS = [
        ["label" => 'Beer', "value" => 'Beer'],
        ["label" => 'Custard', "value" => 'Custard'],
        ["label" => 'Coconut', "value" => 'Coconut'],
        ["label" => 'Cream', "value" => 'Cream'],
    ];

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        return self::PORTUGUESE_PASTRY_FLAVOURS;
    }
}