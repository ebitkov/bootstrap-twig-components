<?php

namespace ebitkov\BootstrapTwigComponents\Component;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(name: 'bs:card:image', template: '@ebitkovBootstrapTwigComponents/components/card/image.html.twig')]
class CardImage
{
    public string $position = 'top';


    #[PreMount]
    public function validate(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefined(array_keys($data));

        $resolver->setDefaults([
            'position' => 'top'
        ]);

        $resolver->setAllowedValues('position', ['top', 'bottom', 'overlay']);

        return [
            ...$data, // to allow HTML attributes
            ...$resolver->resolve($data)
        ];
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
            'class' => 'card-img' .
                ($this->position != 'overlay' ? '-' . $this->position : '') .
                (!empty($data['class']) ? ' ' . $data['class'] : '')
        ];
        ksort($data);
        return $data;
    }
}
