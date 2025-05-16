<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */

// Registro il menu di navigazione

function agenzianolana_register_menus()
{
    register_nav_menus([
        'header-menu' => __('Header Menu', 'AgenziaNolana'),
        'footer-menu' => __('Footer Menu', 'AgenziaNolana'),
    ]);
}
add_action('after_setup_theme', 'agenzianolana_register_menus');


$header_menu = array(
    'name' => 'header-menu',
    'menu_title'      => 'Header Menu',
    'content' => '
        <!-- wp:navigation-submenu {"label":"Chi siamo","type":"page","id":11,"url":"' . home_url('/prova/') . '","kind":"post-type"} -->
        <!-- wp:navigation-link {"label":"Agenzia","type":"page","id":44,"url":"' . home_url('/chi-siamo/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"I Comuni","type":"page","id":42,"url":"' . home_url('/i-comuni/') . '","kind":"post-type"} /-->
        <!-- /wp:navigation-submenu -->

        <!-- wp:navigation-link {"label":"Servizi","type":"page","id":34,"url":"' . home_url('/servizi/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-submenu {"label":"Lavoro","type":"page","id":11,"url":"' . home_url('/prova/') . '","kind":"post-type"} -->
        <!-- wp:navigation-link {"label":"Lavoro","type":"page","id":63,"url":"' . home_url('/lavoro/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Short List","type":"page","id":46,"url":"' . home_url('/short-list/') . '","kind":"post-type"} /-->
        <!-- /wp:navigation-submenu -->

        <!-- wp:navigation-link {"label":"News","type":"page","id":36,"url":"' . home_url('/news/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-submenu {"label":"Stampa","type":"page","id":11,"url":"' . home_url('/prova/') . '","kind":"post-type"} -->
        <!-- wp:navigation-link {"label":"Ufficio Stampa","type":"page","id":48,"url":"' . home_url('/ufficio-stampa/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Comunicati","type":"page","id":50,"url":"' . home_url('/comunicati/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Rassegna","type":"page","id":52,"url":"' . home_url('/rassegna/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Foto","type":"page","id":54,"url":"' . home_url('/foto/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Video","type":"page","id":56,"url":"' . home_url('/video/') . '","kind":"post-type"} /-->
        <!-- wp:navigation-link {"label":"Contatti","type":"page","id":58,"url":"' . home_url('/contatti-2/') . '","kind":"post-type"} /-->
        <!-- /wp:navigation-submenu -->

        <!-- wp:navigation-link {"label":"Amm.ne Tranparente","type":"page","id":38,"url":"' . home_url('/amm-ne-tranparente/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-link {"label":"Contatti","type":"page","id":58,"url":"' . home_url('/contatti-2/') . '","kind":"post-type"} /-->
    '
);
$footer_menu = array(
    'name' => 'footer-menu',
    'menu_title' => 'Footer Menu',
    'content' => '
        <!-- wp:navigation-link {"label":"Media policy","type":"page","id":100,"url":"' . home_url('/media-policy/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-link {"label":"Note legali","type":"page","id":102,"url":"' . home_url('/note-legali/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-link {"label":"Privacy policy","type":"page","id":104,"url":"' . home_url('/privacy-policy-2/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-link {"label":"Mappa del sito","type":"page","id":106,"url":"' . home_url('/mappa-del-sito/') . '","kind":"post-type"} /-->

        <!-- wp:navigation-link {"label":"Dichiarazione di accessibilità","type":"page","id":108,"url":"' . home_url('/dichiarazione-di-accessibilita/') . '","kind":"post-type"} /-->
    '
);
// Funzione generica per creare un menu wp_navigation
function agenzianolana_create_navigation_menu($name, $menu_title, $content)
{
    // Controlla se il menu esiste già
    $menu_exists = get_posts([
        'post_type'   => 'wp_navigation',
        'name'        => $name,
        'post_status' => 'publish',
        'numberposts' => 1,
    ]);

    if ($menu_exists) {
        return; // Esci se già esiste
    }

    // Crea il post wp_navigation
    $menu_id = wp_insert_post([
        'post_title'  => $menu_title,
        'post_name'   => $name,
        'post_status' => 'publish',
        'post_type'   => 'wp_navigation',
    ]);

    if (is_wp_error($menu_id)) {
        return; // Errore nella creazione
    }

    // Aggiorna il contenuto con i blocchi
    wp_update_post([
        'ID'           => $menu_id,
        'post_content' => $content,
    ]);
}

// Funzione che crea tutti i menu al cambio tema e alla prima attivazione
$menus_to_create = array(
    $header_menu,
    $footer_menu,
);
// Funzione che crea i menu di navigazione

function agenzianolana_create_navigation_menus()
{
    global $menus_to_create;

    foreach ($menus_to_create as $menu) {
        agenzianolana_create_navigation_menu(
            $menu['name'],
            $menu['menu_title'],
            $menu['content']
        );
    }
}
add_action('after_switch_theme', 'agenzianolana_create_navigation_menus');
