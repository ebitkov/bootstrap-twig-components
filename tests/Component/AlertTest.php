<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class AlertTest extends KernelTestCase
{
    public function testBasicAlertMarkup()
    {
        self::bootKernel();
        $container = self::getContainer();

        /** @var Environment $twig */
        $twig = $container->get(Environment::class);

        $template = $twig->createTemplate('<twig:bootstrap:alert type="primary" message="hello world"/>');
        $result = $template->render();

        self::assertSame('<div class="alert alert-primary" role="alert">hello world</div>', $result);
    }
}
