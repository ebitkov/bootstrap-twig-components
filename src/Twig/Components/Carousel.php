<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('bs:carousel', template: '@ebitkovBootstrapTwigComponents/components/carousel.html.twig')]
final class Carousel
{
    public ?string $id = null;

    /**
     * @var array<int<0, max>, string> A list of image src links. Rendered as carousel items.
     */
    public array $items = [];

    /**
     * @var bool Enables sliding.
     */
    public bool $slide = true;

    /**
     * @var bool Enables controls.
     */
    public bool $controls = false;
}