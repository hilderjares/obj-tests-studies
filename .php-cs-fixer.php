<?php
 
$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);
 
return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'strict_param' => true,
        'array_indentation' => true,
        'cast_spaces' => ['space' => 'single'],
        'blank_line_after_namespace' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_useless_else' => true,
        'fully_qualified_strict_types' => true,
        'yoda_style' => ['equal' => true, 'identical' => true, 'less_and_greater' => true],
    ])
    ->setFinder($finder)
    ->setUsingCache(false)
;
