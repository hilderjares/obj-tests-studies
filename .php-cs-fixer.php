<?php
 
$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);
 
return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
    ->setUsingCache(false)
;
