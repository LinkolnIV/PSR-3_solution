<?php

$config = new PhpCsFixer\Config();
return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@PSR12' => true,
        '@PHP81Migration' => true,
        'align_multiline_comment' => true,
        'array_syntax' => true,
        'class_definition' => true,
        'clean_namespace' => true,
        'combine_consecutive_issets' => true,
        'phpdoc_scalar' => true,
        'phpdoc_tag_casing' => true,
        'phpdoc_to_comment' => true,
        'phpdoc_types' => true,
        'phpdoc_types_order' => true,
        'semicolon_after_instruction' => true,
        'short_scalar_cast' => true,
        'simplified_if_return' => true,
        'strict_comparison' => true,
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'void_return' => true,
        'yoda_style' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__)
    )
;