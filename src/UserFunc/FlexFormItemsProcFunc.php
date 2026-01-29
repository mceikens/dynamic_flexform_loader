<?php

namespace MCEikens\DynamicFlexformLoader\UserFunc;

use MCEikens\DynamicFlexformLoader\Registry\FlexFormItemsRegistry;

class FlexFormItemsProcFunc
{
    public function __construct(
        private readonly FlexFormItemsRegistry $registry
    ) {}

    public function getRegisteredKeys(array &$config): void
    {
        $registeredItems = $this->registry->getAllItems();
        foreach ($registeredItems as $item) {
            $config['items'][] = [
                'label' => $item['label'],
                'value' => $item['key'],
            ];
        }
    }
}
