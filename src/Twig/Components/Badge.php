<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(name: 'bs:badge', template: '@ebitkovBootstrapTwigComponents/components/badge.html.twig')]
class Badge
{
    public ?string $label = null;

    public ?string $visuallyHiddenLabel = null;

    /**  @var "inline" | "top-end" */
    public string $position = 'inline';


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
            'position' => 'inline'
        ]);

        $resolver->setAllowedValues('position', ['inline', 'top-end']);

        return [
            ... $data,
            ... $resolver->resolve($data)
        ];
    }


    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    #[PostMount]
    public function configureAttributes(array $data): array
    {
        if ($this->label) {
            $class = 'badge';
        } else {
            $class = 'p-2 rounded-circle'; // spacing to display generic indicator
        }

        // predefined styling
        if ($this->position == 'top-end') {
            $class .= ' position-absolute top-0 start-100 translate-middle';
        }


        $data = [
            ...$data,
            'class' => $class . (!empty($data['class']) ? ' ' . $data['class'] : '')
        ];
        ksort($data);
        return $data;
    }

}