<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agenzia-nolana
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
		'agenzia-nolana-style',
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

	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], null, true);
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
add_action('init', 'crea_post_type_comuni');



function my_custom_block_pattern_category()
{
	register_block_pattern_category(
		'agenzia-nolana',
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
add_action('init', 'my_custom_block_pattern_category');



function register_patterns()
{

	register_block_pattern(
		'agenzia-nolana/arrow-link',
		array(
			'title'       => __('Arrow link', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/arrow-link.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/comuni-link',
		array(
			'title'       => __('Comuni link', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/comuni-link.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/card-tag',
		array(
			'title'       => __('Card Tag', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/card-tag.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/cards-tag',
		array(
			'title'       => __('Cards Tag', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/cards-tag.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/servizi-link',
		array(
			'title'       => __('Servizi link', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/servizi-link.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/card-content-img',
		array(
			'title'       => __('Card Content Img', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/card-content-img.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/card-agenzia-home',
		array(
			'title'       => __('Card Agenzia Home', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/card-agenzia-home.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/archive-agenzia',
		array(
			'title'       => __('Archive Agenzia', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/archive-agenzia.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/foto-video-card',
		array(
			'title'       => __('Foto Video Card', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/foto-video-card.php'),
		)
	);
	register_block_pattern(
		'agenzia-nolana/cards-title-and-content',
		array(
			'title'       => __('Cards Title and Content', 'textdomain'),
			'categories'  => array('agenzia-nolana'),
			'content'     => file_get_contents(get_template_directory() . '/patterns/cards-title-and-content.php'),
		)
	);
}
add_action('init', 'register_patterns');


// registrazione block custom

function myblocks_block_init()
{
	register_block_type(__DIR__ . '/build/modale');
	register_block_type(__DIR__ . '/build/mycarusel');
	register_block_type(__DIR__ . '/build/breadcrumbs');
	register_block_type(__DIR__ . '/build/search');
	register_block_type(__DIR__ . '/build/indice-pagina');
	register_block_type(__DIR__ . '/build/customhero');
}
add_action('init', 'myblocks_block_init');


// wp_ajax_ + custom_news_search → registra un hook per utenti loggati

// wp_ajax_nopriv_ + custom_news_search → registra un hook per utenti non loggati
add_action('wp_ajax_custom_news_search', 'custom_news_search_callback');
add_action('wp_ajax_nopriv_custom_news_search', 'custom_news_search_callback');

// function custom_news_search_callback()
// {

// 	// Verifica che esista un valore passato e lo sanitizza
// 	$term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';
// 	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 	$per_page = 10;

// 	if (empty($term)) {
// 		wp_send_json([]); // oppure wp_send_json(array());
// 		return;
// 	}

// 	// Dico su quale cpt fare la query
// 	$args = array(
// 		'post_type' => 'news',
// 		's' => $term,
// 		'posts_per_page' => $per_page,
// 		'paged' => $page,
// 		'post_status' => 'publish',
// 	);

// 	$args = array(
// 		'post_type' => 'servizi',
// 		's' => $term,
// 		'posts_per_page' => $per_page,
// 		'paged' => $page,
// 		'post_status' => 'publish',
// 	);

// 	$query = new WP_Query($args);

// 	$results = array();


// 	// Inserico i risultati in un array con solo titolo
// 	if ($query->have_posts()) {
// 		while ($query->have_posts()) {
// 			$query->the_post();
// 			$results[] = array(
// 				'title' => get_the_title(),
// 				'link' => get_permalink(),
// 			);
// 		}
// 	}
// 	// e lo restituisco in formato JSON
// 	// wp_send_json($results) è una funzione di WordPress che invia una risposta JSON al client
// 	// e termina l'esecuzione dello script

// 	wp_reset_postdata();

// 	$response = array(
// 		'posts' => $results,
// 		'filtri' => $filterArray,
// 		'current_page' => $page,
// 		'max_num_pages' => $query->max_num_pages,
// 	);

// 	wp_send_json($response);
// }




// Query di ricerca su piu cpt

// function custom_news_search_callback()
// {
// 	$term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';
// 	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 	$post_type_filter = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';

// 	$per_page = 4;

// 	if (empty($term)) {
// 		wp_send_json([]);
// 		return;
// 	}

// 	$post_types = ['news', 'servizi'];
// 	$results = [];
// 	$filterArray = [];
// 	$max_num_pages = 1;

// 	foreach ($post_types as $post_type) {
// 		$args = array(
// 			'post_type' => $post_type,
// 			's' => $term,
// 			'posts_per_page' => ($post_type_filter && $post_type !== $post_type_filter) ? 1 : $per_page,
// 			'paged' => $page,
// 			'post_status' => 'publish',
// 		);

// 		$query = new WP_Query($args);

// 		// Sempre aggiungere il filtro, anche se non ci sono risultati
// 		$filterArray[] = array(
// 			'name' => $post_type,
// 			'count' => $query->found_posts,
// 		);

// 		// Se è il post_type selezionato, allora prendi i post
// 		if (!$post_type_filter || $post_type_filter === $post_type) {
// 			if ($query->have_posts()) {
// 				while ($query->have_posts()) {
// 					$query->the_post();
// 					$results[] = array(
// 						'title' => get_the_title(),
// 						'link' => get_permalink(),
// 						'post_type' => $post_type,
// 					);
// 				}
// 			}
// 			$max_num_pages = $query->max_num_pages;
// 		}

// 		wp_reset_postdata();
// 	}

// 	$response = array(
// 		'posts' => $results,
// 		'filtri' => $filterArray,
// 		'current_page' => $page,
// 		'max_num_pages' => $max_num_pages,
// 	);

// 	wp_send_json($response);
// }



// Query di ricerca su piu cpt basata sul titolo di essi
function custom_news_search_callback()
{
	$term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$post_type_filter = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';

	$per_page = 4;

	if (empty($term)) {
		wp_send_json([]);
		return;
	}

	$post_types = ['news', 'servizi', 'comuni'];
	$results = [];
	$filterArray = [];
	$max_num_pages = 1; // Default



	$response = array(
		'posts' => $results,
		'filtri' => $filterArray,
		'current_page' => $page,
		'max_num_pages' => $max_num_pages,
	);


	// // Definisci il filtro per cercare solo sui titoli
	// $search_by_title_only = function ($search, $wp_query) {
	// 	global $wpdb;

	// 	if (empty($search)) {
	// 		return $search;
	// 	}

	// 	$q = $wp_query->query_vars;
	// 	$n = !empty($q['exact']) ? '' : '%';

	// 	$search_terms = $q['search_terms'];
	// 	$search = '';

	// 	foreach ($search_terms as $term) {
	// 		$term = esc_sql($wpdb->esc_like($term));
	// 		$search .= " AND {$wpdb->posts}.post_title LIKE '{$n}{$term}{$n}'";
	// 	}

	// 	return $search;
	// };

	// Applica il filtro SOLO per questa ricerca
	// add_filter('posts_search', $search_by_title_only, 10, 2);

	foreach ($post_types as $post_type) {


		$args = array(
			'post_type' => $post_type,
			's' => $term,
			'posts_per_page' => ($post_type_filter && $post_type !== $post_type_filter) ? 1 : $per_page,
			'paged' => $page,
			'post_status' => 'publish',
		);

		$query = new WP_Query($args);

		// Sempre aggiungere il filtro, anche se non ci sono risultati
		$filterArray[] = array(
			'name' => $post_type,
			'count' => $query->found_posts,
		);


		// Se è il post_type selezionato, allora prendi i post
		if (!$post_type_filter || $post_type_filter === $post_type) {
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					$results[] = array(
						'title' => get_the_title(),
						'link' => get_permalink(),
						'post_type' => $post_type,
					);
				}
			}
			$max_num_pages = $query->max_num_pages;
		}

		wp_reset_postdata();
	}

	// Rimuovi il filtro dopo che hai fatto la ricerca
	remove_filter('posts_search', $search_by_title_only, 10);

	$response = array(
		'posts' => $results,
		'filtri' => $filterArray,
		'current_page' => $page,
		'max_num_pages' => $max_num_pages,
	);

	wp_send_json($response);
}




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
