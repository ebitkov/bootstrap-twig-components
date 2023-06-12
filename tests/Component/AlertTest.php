<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class AlertTest extends KernelTestCase
{
    public function testSimpleAlert()
    {
        $this->bootKernel();
        $container = $this->getContainer();

        /** @var Environment $twig */
        $twig = $container->get('twig');

        $template = $twig->createTemplate('<twig:bootstrap:alert/>');

        self::assertSame('<div class="alert"></div>', $template->render());
    }
}
