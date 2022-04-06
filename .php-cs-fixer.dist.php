<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
	->in([
		__DIR__ . '/config',
		__DIR__ . '/src'
	])
	->append([
		__FILE__
	])
	->name('*.php');

$config = new Config;

return $config->setFinder($finder)
	->setIndent("\t")
	->setLineEnding("\n")
	->setRules([
		'align_multiline_comment' => ['comment_type' => 'all_multiline'],
		'array_indentation' => true,
		'array_syntax' => true,
		'binary_operator_spaces' => true,
		'blank_line_after_namespace' => true,
		'braces' => ['allow_single_line_closure' => true, 'allow_single_line_anonymous_class_with_empty_body' => true],
		'cast_spaces' => ['space' => 'single'],
		'class_attributes_separation' => ['elements' => ['method' => 'one']],
		'class_definition' => ['single_item_single_line' => true, 'single_line' => true, 'space_before_parenthesis' => false],
		'concat_space' => ['spacing' => 'one'],
		'combine_consecutive_issets' => true,
		'combine_consecutive_unsets' => true,
		'compact_nullable_typehint' => true,
		'constant_case' => true,
		'nullable_type_declaration_for_default_null_value' => true,
		'encoding' => true,
		'self_static_accessor' => true,
		'function_declaration' => true,
		'function_typehint_space' => true,
		'explicit_indirect_variable' => true,
		'fully_qualified_strict_types' => true,
		'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],
		'include' => true,
		'increment_style' => ['style' => 'post'],
		'indentation_type' => true,
		'line_ending' => true,
		'lowercase_cast' => true,
		'lowercase_keywords' => true,
		'lowercase_static_reference' => true,
		'magic_constant_casing' => true,
		'magic_method_casing' => true,
		'method_argument_space' => ['on_multiline' => 'ensure_single_line'],
		'native_function_casing' => true,
		'native_function_type_declaration_casing' => true,
		'new_with_braces' => ['named_class' => false, 'anonymous_class' => false],
		'no_blank_lines_after_class_opening' => true,
		'no_closing_tag' => true,
		'no_empty_comment' => true,
		'no_empty_statement' => true,
		'no_extra_blank_lines' => true,
		'no_leading_import_slash' => true,
		'no_leading_namespace_whitespace' => true,
		'no_mixed_echo_print' => ['use' => 'echo'],
		'no_multiline_whitespace_around_double_arrow' => true,
		'no_short_bool_cast' => true,
		'no_singleline_whitespace_before_semicolons' => true,
		'no_spaces_after_function_name' => true,
		'no_spaces_around_offset' => true,
		'no_spaces_inside_parenthesis' => true,
		'no_trailing_comma_in_list_call' => true,
		'no_trailing_comma_in_singleline_array' => true,
		'no_trailing_whitespace' => true,
		'no_trailing_whitespace_in_comment' => true,
		'no_unneeded_control_parentheses' => true,
		'no_unneeded_curly_braces' => true,
		'no_unused_imports' => true,
		'no_whitespace_before_comma_in_array' => true,
		'no_whitespace_in_blank_line' => true,
		'normalize_index_brace' => true,
		'return_type_declaration' => true,
		'short_scalar_cast' => true,
		'single_blank_line_at_eof' => true,
		'single_blank_line_before_namespace' => true,
		'single_class_element_per_statement' => true,
		'single_import_per_statement' => true,
		'single_trait_insert_per_statement' => false,
		'single_line_after_imports' => true,
		'single_line_comment_style' => true,
		'single_quote' => true,
		'standardize_increment' => true,
		'standardize_not_equals' => true,
		'switch_case_semicolon_to_colon' => true,
		'switch_case_space' => true,
		'ternary_operator_spaces' => true,
		'trim_array_spaces' => true,
		'unary_operator_spaces' => true,
		'visibility_required' => true,
		'whitespace_after_comma_in_array' => true,
		'list_syntax' => true,
		'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
		'elseif' => true,
		'no_superfluous_elseif' => true,
		'no_unset_cast' => true,
		'no_useless_else' => true,
		'no_useless_return' => true,
		'ordered_class_elements' => true,
		'ordered_imports' => ['sort_algorithm' => 'length'],
		'protected_to_private' => true,
		'return_assignment' => true,
		'simplified_null_return' => true,
		'ternary_to_null_coalescing' => true,
		'simplified_if_return' => true,
		'operator_linebreak' => ['position' => 'beginning'],
		'single_space_after_construct' => true,
		'echo_tag_syntax' => ['format' => 'short'],
		'lambda_not_used_import' => true,
		'switch_continue_to_break' => true,
		'no_alias_language_construct_call' => true,
		'clean_namespace' => true,
		'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
		'types_spaces' => true,
		'empty_loop_body' => true,
		'declare_parentheses' => true,
		'assign_null_coalescing_to_coalesce_equal' => true,
		'empty_loop_condition' => true,
		'integer_literal_case' => true,
		'octal_notation' => true,
		'no_space_around_double_colon' => true,
		'no_unneeded_import_alias' => true,
		'class_reference_name_casing' => true,
		'single_line_comment_spacing' => true,
		'date_time_create_from_format_call' => true,

		'no_blank_lines_after_phpdoc' => true,
		'no_empty_phpdoc' => true,
		'no_superfluous_phpdoc_tags' => true,
		'phpdoc_add_missing_param_annotation' => true,
		'phpdoc_align' => ['align' => 'left'],
		'phpdoc_annotation_without_dot' => true,
		'phpdoc_indent' => true,
		'phpdoc_inline_tag_normalizer' => true,
		'phpdoc_line_span' => true,
		'phpdoc_no_useless_inheritdoc' => true,
		'phpdoc_order' => true,
		'phpdoc_order_by_value' => true,
		'phpdoc_return_self_reference' => true,
		'phpdoc_scalar' => true,
		'phpdoc_separation' => true,
		'phpdoc_single_line_var_spacing' => true,
		'phpdoc_summary' => true,
		'phpdoc_tag_casing' => true,
		'phpdoc_tag_type' => true,
		'phpdoc_to_comment' => true,
		'phpdoc_trim' => true,
		'phpdoc_trim_consecutive_blank_line_separation' => true,
		'phpdoc_types' => true,
		'phpdoc_types_order' => ['sort_algorithm' => 'alpha', 'null_adjustment' => 'always_last'],
		'phpdoc_var_annotation_correct_order' => true,
		'phpdoc_var_without_name' => true,

		'blank_line_before_statement' => [
			'statements' => [
				'break',
				'case',
				'continue',
				'declare',
				'default',
				'phpdoc',
				'do',
				'exit',
				'for',
				'foreach',
				'goto',
				'if',
				'include',
				'include_once',
				'require',
				'require_once',
				'return',
				'switch',
				'throw',
				'try',
				'while',
				'yield',
				'yield_from',
			]
		],
	]);
