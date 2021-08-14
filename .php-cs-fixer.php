<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@Symfony'               => true,
    'phpdoc_no_empty_return' => false,
    'array_syntax'           => ['syntax' => 'short'],
    'yoda_style'             => false,
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align',
            '='  => 'align',
        ],
    ],
    'concat_space'            => ['spacing' => 'one'],
    'not_operator_with_space' => false,
];

$finder = Finder::create()->in([
    __DIR__ . '/app',
]);

$config = new Config();
$config->setIndent('    ');
$config->setRiskyAllowed(false)
    ->setRules($rules)
    ->setFinder($finder);

return $config;
