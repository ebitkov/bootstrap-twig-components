<?php

namespace ebitkov\BootstrapTwigComponents\Tests;

use ebitkov\BootstrapTwigComponents\ebitkovBootstrapTwigComponentsBundle;
use Exception;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\UX\TwigComponent\TwigComponentBundle;

/**
 * @internal
 */
final class TestKernel extends Kernel
{
    use MicroKernelTrait;


    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new TwigBundle();
        yield new TwigComponentBundle();
        yield new ebitkovBootstrapTwigComponentsBundle();
    }

    public function getEnvironment(): string
    {
        return 'test';
    }

    /**
     * @throws Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $dir = __DIR__ . '/config';
        $finder = (new Finder())
            ->in($dir)
            ->name('*.yaml');

        foreach ($finder as $file) {
            $loader->load($file->getRealPath());
        }
    }
}