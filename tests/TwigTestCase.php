<?php

namespace ebitkov\BootstrapTwigComponents\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class TwigTestCase extends KernelTestCase
{
    protected function getTwig(): Environment
    {
        self::bootKernel();
        $container = self::getContainer();

        /** @var Environment $twig */
        return $container->get(Environment::class);
    }
}
