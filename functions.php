<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
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
		'AgenziaNolana-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'pa_centrale_styles');



// Bootstrap Italia 

// Carico i file di Bootstrap Italia nel frontend
function  bootstrap_italia_setup()
{
	wp_register_style('bootstrap-italia-style', get_parent_theme_file_uri('assets/css/bootstrap-italia.min.css'));
	wp_enqueue_style('bootstrap-italia-style');
	wp_register_script('bootstrap-italia-script', get_parent_theme_file_uri('assets/js/bootstrap-italia.min.js'));
	wp_enqueue_script('bootstrap-italia-script');

	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], null, true);


	wp_register_style('splide-style', get_parent_theme_file_uri('assets/css/splide-core.min.css'));
	wp_enqueue_style('splide-style');

	wp_register_script('splide-script', get_parent_theme_file_uri('assets/js/splide.min.js'));
	wp_enqueue_script('splide-script');
}
add_action('after_setup_theme', 'bootstrap_italia_setup');



// Carico i file di Bootstrap Italia anche nell'editor di WordPress
function mytheme_enqueue_editor_assets()
{
	// Carica il CSS principale del tema
	add_editor_style(get_parent_theme_file_uri('assets/css/bootstrap-italia.min.css'));


	add_editor_style(get_parent_theme_file_uri('assets/css/splide-core.min.css'));

	// // Carica il JS di Bootstrap Italia
	wp_enqueue_script(get_parent_theme_file_uri('assets/js/bootstrap-italia.min.js'));
	wp_enqueue_script(get_parent_theme_file_uri('assets/js/splide.min.js'));

	wp_enqueue_script('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), null, true);

	// Aggiungi lo script inline dopo che lo script principale è stato enqueued
	wp_add_inline_script('bootstrap-italia-script', 'bootstrap.loadFonts("' . get_parent_theme_file_uri('assets/fonts') . '");');
}
add_action('admin_init', 'mytheme_enqueue_editor_assets');


// Includo i file PHP della  cartella inc

foreach (glob(get_template_directory() . '/inc/*.php') as $file) {
	require_once $file;
}



function add_font_awesome()
{
	wp_enqueue_script('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_font_awesome');


// Aggiungo il supporto per i menu di navigazione
function agenzianolana_add_navigation_submenu()
{
	add_submenu_page(
		'themes.php',                          // Menu genitore: Aspetto
		__('Menu Navigazione', 'AgenziaNolana'), // Titolo pagina
		__('Menu Navigazione', 'AgenziaNolana'), // Titolo menu
		'edit_posts',                         // Capability richiesta
		'edit.php?post_type=wp_navigation'   // URL del CPT menu
	);
}
add_action('admin_menu', 'agenzianolana_add_navigation_submenu');
