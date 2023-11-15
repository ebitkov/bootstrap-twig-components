<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(name: 'bs:card', template: '@ebitkovBootstrapTwigComponents/components/card.html.twig')]
final class CardComponent
{
    public ?string $header = null;
    public ?string $body = null;
    public ?string $footer = null;

    /**
     * @var array{ src ?: ?string, alt ?: ?string, title ?: ?string, position ?: "top" | "bottom" | "overlay" }
     */
    public array $image = [];

    public ?string $imageSrc = null;
    public ?string $imageAlt = null;
    public ?string $imageTitle = null;

    /** @var "top"|"bottom"|"overlay" */
    public string $imagePosition = 'top';


    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    #[PreMount]
    public function validate(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined();

        $resolver->setDefaults([
            'header' => null,
            'body' => null,
            'footer' => null,
            'image' => [],
            'imagePosition' => 'top',
            'imageSrc' => null,
            'imageAlt' => null,
            'imageTitle' => null,
        ]);

        $resolver->setAllowedTypes('header', ['null', 'string']);
        $resolver->setAllowedTypes('body', ['null', 'string']);
        $resolver->setAllowedTypes('footer', ['null', 'string']);
        $resolver->setAllowedTypes('image', ['null', 'array']);
        $resolver->setAllowedTypes('imageSrc', ['null', 'string']);
        $resolver->setAllowedTypes('imageAlt', ['null', 'string']);
        $resolver->setAllowedTypes('imageTitle', ['null', 'string']);

        $resolver->setAllowedValues('imagePosition', ['top', 'bottom', 'overlay']);

        return [
            ... $data,
            ... $resolver->resolve($data)
        ];
    }

    #[PostMount]
    public function configureImages(): void
    {
        // top image
        if (!empty($this->imageSrc)) {
            $this->image = [
                'src' => $this->imageSrc,
                'class' => 'card-img' . ($this->imagePosition != 'overlay' ? '-' . $this->imagePosition : ''),
                'position' => $this->imagePosition
            ];

            if ($this->imageAlt) $this->image['alt'] = $this->imageAlt;
            if ($this->imageTitle) $this->image['title'] = $this->imageTitle;
        }
    }
}
