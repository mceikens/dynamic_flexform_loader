<?php

namespace MCEikens\DynamicFlexformLoader\DependencyInjection;

use MCEikens\DynamicFlexformLoader\Registry\FlexFormItemsRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FlexFormItemsProviderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(FlexFormItemsRegistry::class)) {
            return;
        }

        $registryDefinition = $container->findDefinition(FlexFormItemsRegistry::class);

        $taggedServices = $container->findTaggedServiceIds('mceikens.dynamic_flexform_provider');

        foreach ($taggedServices as $id => $tags) {
            $registryDefinition->addMethodCall('registerProvider', [new Reference($id)]);
        }
    }
}
