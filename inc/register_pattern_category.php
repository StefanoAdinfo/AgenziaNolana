<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */
function my_pattern_category()
{
    register_block_pattern_category(
        'AgenziaNolana',
        array(
            'label' => __('Pa Centrale', 'textdomain'),
        )
    );
    register_block_pattern_category(
        'acf',
        array(
            'label' => __('Acf', 'textdomain'),
        )
    );
}
add_action('init', 'my_pattern_category');
