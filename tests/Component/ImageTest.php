<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use ebitkov\BootstrapTwigComponents\Tests\TwigTestCase;

class ImageTest extends TwigTestCase
{
    public function testBasicMarkup(): void
    {
        $twig = $this->getTwig();
        $template = $twig->createTemplate('<twig:bs:image src="path/file.ext" alt="alt text" title="title text" data-attribute="value"/>');
        $expected = '<img alt="alt text" class="img-fluid" data-attribute="value" src="path/file.ext" title="title text">';
        $this->assertSame($expected, $template->render());
    }

    public function testOverwriteClassAttr(): void
    {
        $twig = $this->getTwig();
        $template = $twig->createTemplate('<twig:bs:image src="path/file.ext" class="card-img-top"/>');
        $expected = '<img class="card-img-top" src="path/file.ext">';
        $this->assertSame($expected, $template->render());
    }
}
