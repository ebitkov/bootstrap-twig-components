<?php

namespace ebitkov\BootstrapTwigComponents\Tests\Component;

use ebitkov\BootstrapTwigComponents\Tests\TwigTestCase;

class CardTest extends TwigTestCase
{
    public function testBaseCardMarkup(): void
    {
        $twig = $this->getTwig();

        $template = $twig->createTemplate('<twig:bs:card>This is some text within a card body</twig:bs:card>');

        $this->assertSame('<div class="card"><div class="card-body">This is some text within a card body</div></div>', $template->render());
    }

    public function testTitlesTextAndLinks(): void
    {
        $twig = $this->getTwig();

        $template = $twig->createTemplate(
            '<twig:bs:card style="width: 18rem;">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </twig:bs:card>'
        );

        $expected =
            '<div class="card" style="width: 18rem;">' .
            '<div class="card-body">' .
            '<h5 class="card-title">Card title</h5>' .
            '<h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>' .
            '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>' .
            '<a href="#" class="card-link">Card link</a>' .
            '<a href="#" class="card-link">Another link</a>' .
            '</div>' .
            '</div>';

        $this->assertSame($expected, $template->render());
    }

    public function testTopImage(): void
    {
        $twig = $this->getTwig();

        // single value attributes
        $template = $twig->createTemplate(
            '<twig:bs:card
                imageSrc="some/image.ext"
                imageAlt="alt text"
                imageTitle="title text">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
            </twig:bs:card>');

        $expected =
            '<div class="card">' .
                '<img alt="alt text" class="card-img-top" src="some/image.ext" title="title text">' .
                '<div class="card-body">' .
                    '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>' .
                '</div>' .
            '</div>';

        $this->assertSame($expected, $template->render());
    }

    public function testBottomImage(): void
    {
        $twig = $this->getTwig();

        // single value attributes
        $template = $twig->createTemplate(
            '<twig:bs:card
                imagePosition="bottom"
                imageSrc="some/image.ext"
                imageAlt="alt text"
                imageTitle="title text">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
            </twig:bs:card>');

        $expected =
            '<div class="card">' .
                '<div class="card-body">' .
                    '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>' .
                '</div>' .
                '<img alt="alt text" class="card-img-bottom" src="some/image.ext" title="title text">' .
            '</div>';

        $this->assertSame($expected, $template->render());
    }

    public function testImageOverlay(): void
    {
        $twig = $this->getTwig();

        // single value attributes
        $template = $twig->createTemplate(
            '<twig:bs:card class="text-bg-dark"
                imagePosition="overlay"
                imageSrc="some/image.ext"
                imageAlt="alt text"
                imageTitle="title text">
                <p class="card-text">hello world</p>
            </twig:bs:card>');

        $expected =
            '<div class="card text-bg-dark">' .
                '<img alt="alt text" class="card-img" src="some/image.ext" title="title text">' .
                '<div class="card-img-overlay">' .
                    '<p class="card-text">hello world</p>' .
                '</div>' .
            '</div>';

        $this->assertSame($expected, $template->render());
    }
}
