<?php

namespace ebitkov\BootstrapTwigComponents\Component;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('bootstrap:alert', template: '@ebitkovBootstrapTwigComponentsBundle/components/alert.html.twig')]
class Alert
{
    public ?string $message = null;

    public ?string $type = null;


    #[PreMount]
    public function validate(array $data): array
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults([
            'message' => null,
            'type' => null,
        ]);

        $resolver->setAllowedTypes('message', ['string', 'null']);
        $resolver->setAllowedTypes('type', ['string', 'null']);

        return $resolver->resolve($data);
    }

    #[PostMount]
    public function configureAttributes(array $data): array
    {
        $attr = [
            ...$data,
            'class' => 'alert',
            'role' => 'alert'
        ];

        if ($this->type) $attr['class'] .= sprintf(' alert-%s', $this->type);

        return $attr;
    }
}
