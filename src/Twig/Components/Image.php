<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(name: 'bs:img', template: '@ebitkovBootstrapTwigComponents/components/image.html.twig')]
class Image
{
    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    #[PostMount]
    public function configureAttributes(array $data): array
    {
        $data = [
            'class' => 'img-fluid',
            ...$data,
        ];
        ksort($data);
        return $data;
    }
}
