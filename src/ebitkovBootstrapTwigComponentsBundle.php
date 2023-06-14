<?php

namespace ebitkov\BootstrapTwigComponents;

use ebitkov\BootstrapTwigComponents\DependencyInjection\ebitkovBootstrapTwigComponentsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ebitkovBootstrapTwigComponentsBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ebitkovBootstrapTwigComponentsExtension();
    }
}
