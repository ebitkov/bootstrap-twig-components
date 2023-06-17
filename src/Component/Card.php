<?php

namespace ebitkov\BootstrapTwigComponents\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(name: 'bs:card', template: '@ebitkovBootstrapTwigComponents/components/card.html.twig')]
class Card
{
    public ?string $header = null;

    /**
     * @var array{ src ?: ?string, alt ?: ?string, title ?: ?string }
     */
    public array $topImage = [];

    public ?string $topImageSrc = null;
    public ?string $topImageAlt = null;
    public ?string $topImageTitle = null;

    /**
     * @var array{ src ?: ?string, alt ?: ?string, title ?: ?string }
     */
    public array $bottomImage = [];

    public ?string $bottomImageSrc = null;
    public ?string $bottomImageAlt = null;
    public ?string $bottomImageTitle = null;

    public bool $cardOverlay = false;


    #[PostMount]
    public function configureImages(): void
    {
        // top image
        if (!empty($this->topImageSrc)) {
            $this->topImage = [
                'src' => $this->topImageSrc,
                'alt' => $this->topImageAlt,
                'title' => $this->topImageTitle
            ];
        }
        // bottom image
        if (!empty($this->bottomImageSrc)) {
            $this->bottomImage = [
                'src' => $this->bottomImageSrc,
                'alt' => $this->bottomImageAlt,
                'title' => $this->bottomImageTitle
            ];
        }
    }

    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    #[PostMount]
    public function configureAttributes(array $data): array
    {
        $data = [
            ...$data,
            'class' => 'card' . (!empty($data['class']) ? ' ' . $data['class'] : '')
        ];
        ksort($data);
        return $data;
    }
}
