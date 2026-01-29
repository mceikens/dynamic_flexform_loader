<?php

namespace MCEikens\DynamicFlexformLoader\Registry;

class FlexFormItemsRegistry
{
    /**
     * @var FlexFormItemsProviderInterface[]
     */
    private array $providers = [];

    public function registerProvider(FlexFormItemsProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    /**
     * @return array<string, array{key: string, label: string, data?: array}>
     */
    public function getAllItems(): array
    {
        $items = [];

        foreach ($this->providers as $provider) {
            $providerItems = $provider->getFlexFormItems();
            $items = array_merge($items, $providerItems);
        }

        return $items;
    }

    /**
     * @return FlexFormItemsProviderInterface[]
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    public function hasProviders(): bool
    {
        return count($this->providers) > 0;
    }
}
