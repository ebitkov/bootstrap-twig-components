<?php

namespace ebitkov\BootstrapTwigComponents\Component;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(name: 'bs:card', template: '@ebitkovBootstrapTwigComponents/components/card.html.twig')]
class Card
{
    public ?string $header = null;

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
        $resolver->setDefined(array_keys($data));

        $resolver->setDefaults([
            'imagePosition' => 'top'
        ]);

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
                'alt' => $this->imageAlt,
                'title' => $this->imageTitle,
                'position' => $this->imagePosition,
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
