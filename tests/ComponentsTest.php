<?php

namespace ebitkov\BootstrapTwigComponents\Tests;

use Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Finder\Finder;
use Twig\Environment;

class ComponentsTest extends KernelTestCase
{

    public function getFixtures(): array
    {
        $fixtures = [];

        // get all fixtures
        $fixtureDir = __DIR__ . '/Fixtures/';

        $finder = new Finder();
        $finder->files()
            ->depth('< 2')
            ->name('*.template.twig')
            ->in($fixtureDir);

        foreach ($finder as $file) {
            $testName = str_replace('.template', '', $file->getFilenameWithoutExtension());
            $path = $file->getRelativePath();

            // get expected result
            $expectedValueFilePath = $fixtureDir . sprintf('/%s/%s.expected.html', $path, $testName);
            if (file_exists($expectedValueFilePath)) {
                $expected = file_get_contents($expectedValueFilePath);
            } else {
                throw new Exception(sprintf('%s not found!', $expectedValueFilePath));
            }

            $fixtures[$testName] = [
                $path . '/'. $file->getFilename(),
                $expected
            ];
        }

        return $fixtures;
    }

    /**
     * @dataProvider getFixtures
     * @throws Exception
     */
    public function testTemplates($template, $expectedHtml)
    {
        $this->assertSame(
            $expectedHtml,
            $this->getTwig()->render(sprintf('@bundle_test/%s', $template))
        );
    }

    protected function getTwig(): Environment
    {
        self::bootKernel();
        $container = self::getContainer();

        /** @var Environment $twig */
        return $container->get(Environment::class);
    }
}
