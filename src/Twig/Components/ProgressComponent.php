<?php

namespace ebitkov\BootstrapTwigComponents\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(name: 'bs:progress', template: '@ebitkovBootstrapTwigComponents/components/progress.html.twig')]
final class ProgressComponent
{
    public int $progress = 0;

    public string $description;

    public ?string $label = null;

    public bool $allowLabelOverflow = false;

    public ?string $bgColor = null;

    public bool $isStriped = false;

    public bool $isAnimated = false;


    #[ExposeInTemplate]
    private string $barClass;


    #[PostMount]
    public function configureBarClass(): void
    {
        $this->barClass = 'progress-bar';

        if ($this->isStriped) $this->barClass .= ' progress-bar-striped';
        if ($this->isAnimated) $this->barClass .= ' progress-bar-animated';
        if ($this->bgColor) $this->barClass .= ' text-bg-' . $this->bgColor;
        if ($this->allowLabelOverflow) $this->barClass .= ' overflow-visible';
    }


    /**
     * @param array<string, string> $data
     * @return array<string, string|int>
     */
    #[PostMount]
    public function configureAttributes(array $data): array
    {
        $data = [
            ...$data,
            'class' => 'progress' . (!empty($data['class']) ? ' ' . $data['class'] : ''),
            'role' => 'progressbar',
            'aria-label' => $this->description,
            'aria-valuenow' => $this->progress,
            'aria-valuemin' => 0,
            'aria-valuemax' => 100,
        ];
        ksort($data);
        return $data;
    }


    public function getBarClass(): string
    {
        return $this->barClass;
    }
}