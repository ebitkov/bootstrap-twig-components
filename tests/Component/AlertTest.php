<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use ebitkov\BootstrapTwigComponents\Tests\TwigTestCase;

class AlertTest extends TwigTestCase
{
    public function testBasicAlertMarkup()
    {
        $twig = $this->getTwig();

        $template = $twig->createTemplate('<twig:bs:alert type="primary" message="hello world"/>');
        $result = $template->render();

        self::assertSame('<div class="alert alert-primary" role="alert">hello world</div>', $result);
    }

    public function testWithCustomContentAndAttributes()
    {
        $twig = $this->getTwig();

        $template = $twig->createTemplate('<twig:bs:alert type="success" data-controller="alert"><h4 class="alert-heading">Custom Title!</h4><p>This is some content.</p></twig:bs:alert>');

        self::assertSame(
            '<div class="alert alert-success" data-controller="alert" role="alert"><h4 class="alert-heading">Custom Title!</h4><p>This is some content.</p></div>',
            $template->render()
        );
    }
}