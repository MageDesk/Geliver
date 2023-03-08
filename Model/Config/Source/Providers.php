<?php

namespace MageDesk\Geliver\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Providers implements OptionSourceInterface
{
    /** @var array|\string[][]  */
    private array $options = [
        [
            'value' => 'SURAT_STANDART',
            'label' => 'Sürat kargo standart gönderi.'
        ],
        [
            'value' => 'YURTICI_STANDART',
            'label' => 'Yurtiçi kargo standart gönderi.'
        ],
        [
            'value' => 'PTT_STANDART',
            'label' => 'PTT kargo standart gönderi.'
        ],
        [
            'value' => 'SENDEO_STANDART',
            'label' => 'Sendeo standart gönderi.'
        ],
        [
            'value' => 'GELIVER_STANDART',
            'label' => 'Test gönderisi oluştururken kullanılır.'
        ]
    ];

    /**
     * All providers.
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->options;
    }
}
