<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('bs:alert', template: '@ebitkovBootstrapTwigComponents/components/alert.html.twig')]
class Alert
{
    public ?string $message = null;

    public ?string $type = null;

    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    #[PostMount]
    public function configureAttributes(array $data): array
    {
        $data = [
            ...$data,
            'class' => 'alert' . ($this->type ? ' alert-' . $this->type : '') . (!empty($data['class']) ? ' ' . $data['class'] : ''),
            'role' => 'alert'
        ];
        ksort($data);
        return $data;
    }
}
