<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */

// Custom Styles for Gutenberg Blocks

add_action('init', 'themeslug_register_block_styles');

function themeslug_register_block_styles()
{
    register_block_style('core/image', array(
        'name'         => 'hand-drawn',
        'label'        => __('Hand Drawn', 'themeslug'),
        'inline_style' => '.wp-block-image.is-style-hand-drawn img {
			border: 2px solid currentColor;
			overflow: hidden;
			box-shadow: 0 4px  10px 0 rgba( 0, 0, 0, 0.3 );
			border-radius: 255px 15px 225px 15px/15px 225px 15px 255px !important;
		}'
    ));
}
