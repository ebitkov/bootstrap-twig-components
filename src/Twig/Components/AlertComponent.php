<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('bs:alert', template: '@ebitkovBootstrapTwigComponents/components/alert.html.twig')]
final class AlertComponent
{
    public ?string $message = null;
    public ?string $type = null;
}
