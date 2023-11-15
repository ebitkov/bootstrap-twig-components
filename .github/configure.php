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
