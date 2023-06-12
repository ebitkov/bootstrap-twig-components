<?php

namespace ebitkov\BootstrapTwigComponents;

use ebitkov\BootstrapTwigComponents\DependencyInjection\ebitkovBootstrapTwigComponentsExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ebitkovBootstrapTwigComponentsBundle extends AbstractBundle
{
    protected function getContainerExtensionClass(): string
    {
        return ebitkovBootstrapTwigComponentsExtension::class;
    }
}
