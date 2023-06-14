<?php

namespace ebitkov\BootstrapTwigComponents\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('bootstrap:alert', template: '@ebitkovBootstrapTwigComponents/components/alert.html.twig')]
class Alert
{
    public ?string $message = null;

    public ?string $type = null;


    #[PostMount]
    public function configureAttributes(array $data): array
    {
        return [
            ...$data,
            'class' => 'alert' . ($this->type ? ' alert-' . $this->type : '') . (!empty($data['class']) ? ' ' . $data['class'] : ''),
            'role' => 'alert'
        ];
    }
}
