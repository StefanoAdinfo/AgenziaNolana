<?php

/**
 * Register Custom Post Type
 *
 * @return void
 */
function create_cpt()
{
    register_post_type(
        'comuni',
        array(
            'labels' => array(
                'name' => 'Comuni',
                'singular_name' => 'Comune',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'i-comuni'),
            'supports' => array('title', 'thumbnail', 'editor'), // titolo , immagine, editor: È il campo principale: scrivi qui tutto il testo, immagini, formattazione, ecc.
            'menu_icon' => 'dashicons-location-alt',
        )
    );
    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => 'News',
                'singular_name' => 'News',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'news'),
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
            'taxonomies' => array('post_tag'), // Aggiunge il supporto per i tag
            'menu_icon' => 'dashicons-format-aside',
        )
    );
    register_post_type(
        'servizi',
        array(
            'labels' => array(
                'name' => 'Servizi',
                'singular_name' => 'Servizi',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'servizi'),
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
            'menu_icon' => 'dashicons-portfolio',
        )
    );
    register_post_type(
        'agenzia',
        array(
            'labels' => array(
                'name' => 'Agenzia',
                'singular_name' => 'Agenzia',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'agenzia'),
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
            'menu_icon' => 'dashicons-building',
        )
    );
    register_post_type(
        'foto',
        array(
            'labels' => array(
                'name' => 'Foto',
                'singular_name' => 'Foto',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'foto'),
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
            'menu_icon' => 'dashicons-format-image',
        )
    );
    register_post_type(
        'video',
        array(
            'labels' => array(
                'name' => 'Video',
                'singular_name' => 'Video',
            ),
            'public' => true, // Rende il post type pubblico
            'publicly_queryable' => true, // Rende il post type interrogabile
            'has_archive' => false, // Non mostrara l'archivio
            'show_in_rest' => true, // Abilita l'editor a blocchi
            'rewrite' => array('slug' => 'video'),
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
            'menu_icon' => 'dashicons-format-video',
        )
    );
}
add_action('init', 'create_cpt');
