<?php

/**
 * Register Custom Post Type
 *
 * @return void
 */

// get the acf tramite shortcode

function mostra_acf($atts)
{
    $atts = shortcode_atts([
        'campo' => '',
        'id' => get_the_ID(),
    ], $atts);

    if (function_exists('get_field') && $atts['campo']) {
        return get_field($atts['campo'], $atts['id']);
    }

    return '';
}
add_shortcode('acf_field', 'mostra_acf');
