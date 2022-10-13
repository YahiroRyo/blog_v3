<?php

$config = new PhpCsFixer\Config();

return $config->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,

        'braces' => [
            'position_after_anonymous_constructs'=>'same',
            'position_after_control_structures'=>'same',
            'position_after_functions_and_oop_constructs'=>'same'
        ],
        'binary_operator_spaces' => [ 'default' => 'align' ],
        'return_type_declaration' => ['space_before'=>'none'],

        'phpdoc_separation' => false,
        'phpdoc_align' => [
            'align' => 'vertical',
        ],
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__)
    )
    ;
