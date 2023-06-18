<?php

$bundlePath = 'bundle';
$appBaseDir = dirname(__DIR__) . '/..';

require $appBaseDir . '/vendor/autoload.php';


### CONFIGURE TWIG ###

// add required namespace to test

$fileName = $appBaseDir . '/config/packages/twig.yaml';
$config = \Symfony\Component\Yaml\Yaml::parseFile($fileName);

$config['when@test']['twig']['paths']['%kernel.project_dir%/' . $bundlePath . '/tests/Fixtures'] = 'bundle_test';

file_put_contents($fileName, \Symfony\Component\Yaml\Yaml::dump($config));


### CONFIGURE COMPOSER ###

$composer = json_decode(file_get_contents('composer.json'), true);

// add bundle repo
$composer['repositories']['bundle'] = [
    'type' => 'path',
    'url' => './' . $bundlePath,
];

// add dev autoload
$composer['autoload-dev']['psr-4']['ebitkov\\BootstrapTwigComponents\\Tests\\'] = './' . $bundlePath . '/tests/';

// unset, since it throws errors
if (empty($composer['require-dev'])) unset($composer['require-dev']);

file_put_contents('composer.json', json_encode($composer));
