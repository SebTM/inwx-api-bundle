<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('tests/var/')
    ->exclude('vendor')
    ->files()
    ->name('*.php')
;

$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'align_multiline_comment' => ['comment_type' => 'all_multiline'],
        'array_indentation' => true,
        'array_syntax' => true,
        'blank_line_before_return' => true,
        'class_keyword_remove' => false,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'comment_to_phpdoc' => true,
        'compact_nullable_typehint' => true,
        'date_time_immutable' => true,
        'escape_implicit_backslashes' => [
            'double_quoted' => false,
            'heredoc_syntax' => true,
            'single_quoted' => true,
        ],
        'explicit_indirect_variable' => true,
        'explicit_string_variable' => true,
        'final_internal_class' => true,
        'fully_qualified_strict_types' => true,
        'heredoc_to_nowdoc' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => true,
        'mb_str_functions' => true,
        'method_chaining_indentation' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => true,
        'native_function_invocation' => true,
        'no_alternative_syntax' => true,
        'no_blank_lines_before_namespace' => false,
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'not_operator_with_space' => true,
        'not_operator_with_successor_space' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'php_unit_dedicate_assert' => [
            'target' => 'newest',
        ],
        'php_unit_expectation' => true,
        'php_unit_mock' => true,
        'php_unit_namespaced' => true,
        'php_unit_no_expectation_annotation' => true,
        'php_unit_ordered_covers' => true,
        'php_unit_strict' => true,
        'php_unit_test_annotation' => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => [
            'only_untyped' => false,
        ],
        'phpdoc_order' => true,
        'phpdoc_types_order' => true,
        'psr0' => true,
        'simplified_null_return' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'string_line_ending' => true,
    ])
;

return $config;
