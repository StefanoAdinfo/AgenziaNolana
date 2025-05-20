<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */

// registrazione block custom
function my_custom_block()
{
    $base = get_template_directory() . '/build';

    register_block_type($base . '/modale');
    register_block_type($base . '/mycarusel');
    register_block_type($base . '/breadcrumbs');
    register_block_type($base . '/search');
    register_block_type($base . '/indice-pagina');
    // register_block_type($base . '/customhero');
    register_block_type($base . '/card');
    // register_block_type($base . '/myhero');
    register_block_type($base . '/adinfo-hero');
    register_block_type($base . '/adinfo-carusel');
}
add_action('init', 'my_custom_block');
