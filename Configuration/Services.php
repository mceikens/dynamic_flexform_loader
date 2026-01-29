<?php

use MCEikens\DynamicFlexformLoader\DependencyInjection\FlexFormItemsProviderPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

return function (ContainerBuilder $container) {
    $container->addCompilerPass(new FlexFormItemsProviderPass());
};
