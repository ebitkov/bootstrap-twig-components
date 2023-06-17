<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use ebitkov\BootstrapTwigComponents\Tests\TwigTestCase;

class CardImageTest extends TwigTestCase
{
    public function testBasicMarkup()
    {
        $twig = $this->getTwig();
        $template = $twig->createTemplate('<twig:bs:card:image src="path/file.ext" alt="alt text" title="title text" data-attribute="value"/>');
        $expected = '<img alt="alt text" class="card-img-top" data-attribute="value" src="path/file.ext" title="title text">';
        $this->assertSame($expected, $template->render());
    }
}
