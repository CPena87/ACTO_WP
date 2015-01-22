<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'zdmv5lp26tfbp7jcwiw51ix9sj389e712' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme installation
				'includes/theme-woocommerce.php',		// WooCommerce options
				'includes/theme-plugin-integrations.php'	// Plugin integrations
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

add_post_type_support('page', 'excerpt');
if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('encabezado', 870, 200, true );
add_image_size('col-md-4', 235, 237, true);
add_image_size('col-md-8', 500, 237, true);
add_image_size('col-md-12', 765, 237, true);
add_image_size( 'encabezadopost',870, 350, true ); 
// add_image_size('libros',);
};

// add_post_type_support('page', 'excerpt');
// if ( function_exists('add_theme_support') ) {
//     add_theme_support( 'set_post_thumbnail_size' );
// set_post_thumbnail_size( 'corte-encabezado',150, 150 );
// };


    //Post type register

add_action('init', 'novedades_register');
function novedades_register() {
    $args = array(
        'label' => 'Novedades',
        'singular_label' => 'Novedad',
        'public' => true,
        'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'novedades'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('novedades', $args);
    flush_rewrite_rules();
}


add_action('init', 'actividades_register');
function actividades_register() {
    $args = array(
        'label' => 'Actividades',
        'singular_label' => 'Actividad',
        'public' => true,
        'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'actividades'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('actividades', $args);
    flush_rewrite_rules();
}

add_action('init', 'resenas_register');
function resenas_register() {
    $args = array(
        'label' => 'Reseñas',
        'singular_label' => 'Reseña',
        'public' => true,
        'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'resenas'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('resenas', $args);
    flush_rewrite_rules();
}

add_action('init', 'direcciones_register');
function direcciones_register() {
    $args = array(
        'label' => 'Direcciones',
        'singular_label' => 'Dirección',
        'public' => true,
        'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'direcciones'),
        'supports' => array('title' , 'editor' )
    );
    register_post_type('direcciones', $args);
    flush_rewrite_rules();
}

register_taxonomy('autores', array('product'), array("hierarchical" => true, "label" => "Autores", "singular_label" => "Autor", "rewrite" => 'hierarchical'));

register_taxonomy('tipos', array('product'), array("hierarchical" => true, "label" => "Tipos", "singular_label" => "Tipo", "rewrite" => 'hierarchical'));

register_taxonomy('idiomas', array('product'), array("hierarchical" => true, "label" => "Idiomas", "singular_label" => "Idioma", "rewrite" => 'hierarchical'));


// Activación de Options en Advance Custom Fields
if( function_exists('acf_add_options_page') ) {
    
   acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'redirect'      => false
    )); 
}



/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>