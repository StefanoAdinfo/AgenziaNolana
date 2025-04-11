<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pa-centrale
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pa_centrale_styles()
{
	wp_enqueue_style(
		'pa-centrale-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'pa_centrale_styles');


add_action('after_setup_theme', 'bootstrap_italia_setup');

function  bootstrap_italia_setup()
{
	wp_register_style('bootstrap-italia-style', get_parent_theme_file_uri('assets/css/bootstrap-italia.min.css'));
	wp_enqueue_style('bootstrap-italia-style');
	wp_register_script('bootstrap-italia-script', get_parent_theme_file_uri('assets/js/bootstrap-italia.min.js'));
	wp_enqueue_script('bootstrap-italia-script');
}

// Carico i file di Bootstrap Italia anche nell'editor di WordPress
function mytheme_enqueue_editor_assets()
{
	// Carica il CSS principale del tema
	add_editor_style(get_parent_theme_file_uri('assets/css/bootstrap-italia.min.css'));


	// // Carica il JS di Bootstrap Italia
	wp_enqueue_script(get_parent_theme_file_uri('assets/js/bootstrap-italia.min.js'));

	wp_enqueue_script('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), null, true);

	// Aggiungi lo script inline dopo che lo script principale è stato enqueued
	wp_add_inline_script('bootstrap-italia-script', 'bootstrap.loadFonts("' . get_parent_theme_file_uri('assets/fonts') . '");');
}
add_action('admin_init', 'mytheme_enqueue_editor_assets');


function add_font_awesome()
{
	wp_enqueue_script('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_font_awesome');

function crea_post_type_comuni()
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
			'supports' => array('title', 'thumbnail', 'editor'),
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
}
add_action('init', 'crea_post_type_comuni');


function wpdocs_block_pattern_category()
{
	register_block_pattern_category('wpdocs-patterns', array(
		'label' => __('My Patterns', 'text-domain')
	));
}

add_action('init', 'wpdocs_block_pattern_category');
