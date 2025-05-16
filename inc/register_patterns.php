<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */

function register_patterns()
{

    register_block_pattern(
        'AgenziaNolana/arrow-link',
        array(
            'title'       => __('Arrow link', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/arrow-link.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/comuni-link',
        array(
            'title'       => __('Comuni link', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/comuni-link.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/card-tag',
        array(
            'title'       => __('Card Tag', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/card-tag.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/cards-tag',
        array(
            'title'       => __('Cards Tag', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/cards-tag.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/servizi-link',
        array(
            'title'       => __('Servizi link', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/servizi-link.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/card-content-img',
        array(
            'title'       => __('Card Content Img', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/card-content-img.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/card-agenzia-home',
        array(
            'title'       => __('Card Agenzia Home', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/card-agenzia-home.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/archive-agenzia',
        array(
            'title'       => __('Archive Agenzia', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/archive-agenzia.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/foto-video-card',
        array(
            'title'       => __('Foto Video Card', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/foto-video-card.php'),
        )
    );
    register_block_pattern(
        'AgenziaNolana/cards-title-and-content',
        array(
            'title'       => __('Cards Title and Content', 'textdomain'),
            'categories'  => array('AgenziaNolana'),
            'content'     => file_get_contents(get_template_directory() . '/patterns/cards-title-and-content.php'),
        )
    );
}
add_action('init', 'register_patterns');
