<?php
$bundlePath = './libs/ebitkov/bootstrap-twig-components';

$composer = json_decode(file_get_contents('composer.json'), true);

// add bundle repo
$composer['repositories']['bundle'] = [
    'type' => 'path',
    'url' => $bundlePath,
];

// add dev autoload
$composer['autoload-dev']['psr-4']['ebitkov\\BootstrapTwigComponents\\Tests\\'] = $bundlePath . '/tests/';

// unset, since it throws errors
if (empty($composer['require-dev'])) unset($composer['require-dev']);

file_put_contents('composer.json', json_encode($composer));
