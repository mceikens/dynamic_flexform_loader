<?php

namespace MCEikens\DynamicFlexformLoader\Registry;

interface FlexFormItemsProviderInterface
{
    /**
     * @return array<string, array{key: string, label: string, data?: array}>
     */
    public function getFlexFormItems(): array;
}
