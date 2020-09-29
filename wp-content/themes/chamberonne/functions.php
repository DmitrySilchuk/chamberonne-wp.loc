<?php


/**
 * Register and Enqueue Styles.
 */
function chamberonne_register_styles() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'chamberonne-style', get_stylesheet_uri(), array(), $theme_version );

    wp_enqueue_style( 'chamberonne-swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css', null, $theme_version );

    wp_enqueue_style( 'chamberonne-main', get_template_directory_uri() . '/assets/css/style.css', null, $theme_version );

}

add_action( 'wp_enqueue_scripts', 'chamberonne_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function chamberonne_register_scripts() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'chamberonne-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), $theme_version, false );
    wp_enqueue_script( 'chamberonne-swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.js', array('chamberonne-jquery'), $theme_version, false );
    wp_enqueue_script( 'chamberonne-function-slider', get_template_directory_uri() . '/assets/js/function_slider.js', array('chamberonne-swiper'), $theme_version, false );
    wp_enqueue_script( 'chamberonne-main', get_template_directory_uri() . '/assets/js/main.js', array('chamberonne-function-slider'), $theme_version, false );

}

add_action( 'wp_enqueue_scripts', 'chamberonne_register_scripts' );

/**
 * Add support mime types
 *
 * @param array $mime_types
 *
 * @return array mixed
 */
function chamberonne_mime_types( array $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';        // Adding .svg extension

    return $mime_types;
}
add_filter( 'upload_mimes', 'chamberonne_mime_types', 1, 1 );

function chamberonne_setup() {
    /**
     * Register navigation menus uses wp_nav_menu.
     */
    register_nav_menus([
        'main_menu' => esc_html__('Main menu', 'chamberonne'),
    ]);

    add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme', 'chamberonne_setup');

// Register Custom Post Type
function divers_post_type() {

    $labels = array(
        'name'                  => _x( 'Divers', 'Post Type General Name', 'chamberonne' ),
        'singular_name'         => _x( 'Divers', 'Post Type Singular Name', 'chamberonne' ),
        'menu_name'             => __( 'Divers', 'chamberonne' ),
        'name_admin_bar'        => __( 'Divers', 'chamberonne' ),
        'archives'              => __( 'Divers Archives', 'chamberonne' ),
        'attributes'            => __( 'Divers Attributes', 'chamberonne' ),
        'parent_item_colon'     => __( 'Parent Divers:', 'chamberonne' ),
        'all_items'             => __( 'All Divers', 'chamberonne' ),
        'add_new_item'          => __( 'Add New Divers', 'chamberonne' ),
        'add_new'               => __( 'Add New Divers', 'chamberonne' ),
        'new_item'              => __( 'New Divers', 'chamberonne' ),
        'edit_item'             => __( 'Edit Divers', 'chamberonne' ),
        'update_item'           => __( 'Update Divers', 'chamberonne' ),
        'view_item'             => __( 'View Divers', 'chamberonne' ),
        'view_items'            => __( 'View Divers', 'chamberonne' ),
        'search_items'          => __( 'Search Divers', 'chamberonne' ),
        'not_found'             => __( 'Not found', 'chamberonne' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chamberonne' ),
        'featured_image'        => __( 'Featured Image', 'chamberonne' ),
        'set_featured_image'    => __( 'Set featured image', 'chamberonne' ),
        'remove_featured_image' => __( 'Remove featured image', 'chamberonne' ),
        'use_featured_image'    => __( 'Use as featured image', 'chamberonne' ),
        'insert_into_item'      => __( 'Insert into divers', 'chamberonne' ),
        'uploaded_to_this_item' => __( 'Uploaded to this divers', 'chamberonne' ),
        'items_list'            => __( 'Divers list', 'chamberonne' ),
        'items_list_navigation' => __( 'Divers list navigation', 'chamberonne' ),
        'filter_items_list'     => __( 'Filter divers list', 'chamberonne' ),
    );
    $args = array(
        'label'                 => __( 'Divers', 'chamberonne' ),
        'description'           => __( 'Post Type Description', 'chamberonne' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'taxonomies'            => array( 'type', ' commune' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'divers', $args );

}
add_action( 'init', 'divers_post_type', 0 );

// Register Custom Post Type
function alarm_type() {

    $labels = array(
        'name'                  => _x( 'Alarmes', 'Post Type General Name', 'chamberonne' ),
        'singular_name'         => _x( 'Alarme', 'Post Type Singular Name', 'chamberonne' ),
        'menu_name'             => __( 'Alarmes', 'chamberonne' ),
        'name_admin_bar'        => __( 'Alarme', 'chamberonne' ),
        'archives'              => __( 'Alarme Archives', 'chamberonne' ),
        'attributes'            => __( 'Alarme Attributes', 'chamberonne' ),
        'parent_item_colon'     => __( 'Parent Alarme:', 'chamberonne' ),
        'all_items'             => __( 'All Alarmes', 'chamberonne' ),
        'add_new_item'          => __( 'Add New Alarme', 'chamberonne' ),
        'add_new'               => __( 'Add New Alarme', 'chamberonne' ),
        'new_item'              => __( 'New Alarme', 'chamberonne' ),
        'edit_item'             => __( 'Edit Alarme', 'chamberonne' ),
        'update_item'           => __( 'Update Alarme', 'chamberonne' ),
        'view_item'             => __( 'View Alarme', 'chamberonne' ),
        'view_items'            => __( 'View Alarmes', 'chamberonne' ),
        'search_items'          => __( 'Search Alarme', 'chamberonne' ),
        'not_found'             => __( 'Not found', 'chamberonne' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chamberonne' ),
        'featured_image'        => __( 'Featured Image', 'chamberonne' ),
        'set_featured_image'    => __( 'Set featured image', 'chamberonne' ),
        'remove_featured_image' => __( 'Remove featured image', 'chamberonne' ),
        'use_featured_image'    => __( 'Use as featured image', 'chamberonne' ),
        'insert_into_item'      => __( 'Insert into alarme', 'chamberonne' ),
        'uploaded_to_this_item' => __( 'Uploaded to this alarme', 'chamberonne' ),
        'items_list'            => __( 'Alarmes list', 'chamberonne' ),
        'items_list_navigation' => __( 'Alarmes list navigation', 'chamberonne' ),
        'filter_items_list'     => __( 'Filter alarmes list', 'chamberonne' ),
    );
    $args = array(
        'label'                 => __( 'Alarme', 'chamberonne' ),
        'description'           => __( 'Alarme Description', 'chamberonne' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'post-formats' ),
        'taxonomies'            => array( 'type', 'commune' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-bell',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'alarm', $args );

}
add_action( 'init', 'alarm_type', 0 );

// Register Custom Taxonomy
function type_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Types', 'Taxonomy General Name', 'chamberonne' ),
        'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'chamberonne' ),
        'menu_name'                  => __( 'Type', 'chamberonne' ),
        'all_items'                  => __( 'All Items', 'chamberonne' ),
        'parent_item'                => __( 'Parent Item', 'chamberonne' ),
        'parent_item_colon'          => __( 'Parent Item:', 'chamberonne' ),
        'new_item_name'              => __( 'New Item Name', 'chamberonne' ),
        'add_new_item'               => __( 'Add New Item', 'chamberonne' ),
        'edit_item'                  => __( 'Edit Item', 'chamberonne' ),
        'update_item'                => __( 'Update Item', 'chamberonne' ),
        'view_item'                  => __( 'View Item', 'chamberonne' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'chamberonne' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'chamberonne' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'chamberonne' ),
        'popular_items'              => __( 'Popular Items', 'chamberonne' ),
        'search_items'               => __( 'Search Items', 'chamberonne' ),
        'not_found'                  => __( 'Not Found', 'chamberonne' ),
        'no_terms'                   => __( 'No items', 'chamberonne' ),
        'items_list'                 => __( 'Items list', 'chamberonne' ),
        'items_list_navigation'      => __( 'Items list navigation', 'chamberonne' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'types', array( 'alarm', 'activity', 'divers' ), $args );

}
add_action( 'init', 'type_taxonomy', 0 );

// Register Custom Post Type
function activity_type() {

    $labels = array(
        'name'                  => _x( 'Activities', 'Post Type General Name', 'chamberonne' ),
        'singular_name'         => _x( 'Activity', 'Post Type Singular Name', 'chamberonne' ),
        'menu_name'             => __( 'Activities', 'chamberonne' ),
        'name_admin_bar'        => __( 'Activity', 'chamberonne' ),
        'archives'              => __( 'Activity Archives', 'chamberonne' ),
        'attributes'            => __( 'Activity Attributes', 'chamberonne' ),
        'parent_item_colon'     => __( 'Parent Activity:', 'chamberonne' ),
        'all_items'             => __( 'All Activities', 'chamberonne' ),
        'add_new_item'          => __( 'Add New Activity', 'chamberonne' ),
        'add_new'               => __( 'Add New Activity', 'chamberonne' ),
        'new_item'              => __( 'New Activity', 'chamberonne' ),
        'edit_item'             => __( 'Edit Activity', 'chamberonne' ),
        'update_item'           => __( 'Update Activity', 'chamberonne' ),
        'view_item'             => __( 'View Activity', 'chamberonne' ),
        'view_items'            => __( 'View Activities', 'chamberonne' ),
        'search_items'          => __( 'Search Activity', 'chamberonne' ),
        'not_found'             => __( 'Not found', 'chamberonne' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chamberonne' ),
        'featured_image'        => __( 'Featured Image', 'chamberonne' ),
        'set_featured_image'    => __( 'Set featured image', 'chamberonne' ),
        'remove_featured_image' => __( 'Remove featured image', 'chamberonne' ),
        'use_featured_image'    => __( 'Use as featured image', 'chamberonne' ),
        'insert_into_item'      => __( 'Insert into activity', 'chamberonne' ),
        'uploaded_to_this_item' => __( 'Uploaded to this activity', 'chamberonne' ),
        'items_list'            => __( 'Activities list', 'chamberonne' ),
        'items_list_navigation' => __( 'Activities list navigation', 'chamberonne' ),
        'filter_items_list'     => __( 'Filter activities list', 'chamberonne' ),
    );
    $args = array(
        'label'                 => __( 'Activity', 'chamberonne' ),
        'description'           => __( 'Post Type Description', 'chamberonne' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'type', 'commune' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-editor-textcolor',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'activity', $args );

}
add_action( 'init', 'activity_type', 0 );

// Register Custom Taxonomy
function commune_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Commune', 'Taxonomy General Name', 'chamberonne' ),
        'singular_name'              => _x( 'Commune', 'Taxonomy Singular Name', 'chamberonne' ),
        'menu_name'                  => __( 'Commune', 'chamberonne' ),
        'all_items'                  => __( 'All Items', 'chamberonne' ),
        'parent_item'                => __( 'Parent Item', 'chamberonne' ),
        'parent_item_colon'          => __( 'Parent Item:', 'chamberonne' ),
        'new_item_name'              => __( 'New Item Name', 'chamberonne' ),
        'add_new_item'               => __( 'Add New Item', 'chamberonne' ),
        'edit_item'                  => __( 'Edit Item', 'chamberonne' ),
        'update_item'                => __( 'Update Item', 'chamberonne' ),
        'view_item'                  => __( 'View Item', 'chamberonne' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'chamberonne' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'chamberonne' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'chamberonne' ),
        'popular_items'              => __( 'Popular Items', 'chamberonne' ),
        'search_items'               => __( 'Search Items', 'chamberonne' ),
        'not_found'                  => __( 'Not Found', 'chamberonne' ),
        'no_terms'                   => __( 'No items', 'chamberonne' ),
        'items_list'                 => __( 'Items list', 'chamberonne' ),
        'items_list_navigation'      => __( 'Items list navigation', 'chamberonne' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'commune', array( 'alarm', 'activity', 'divers' ), $args );

}
add_action( 'init', 'commune_taxonomy', 0 );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// Register Sidebars
function chamberonne_sidebars() {

    $args = array(
        'id'            => 'home_sidebar',
        'name'          => __( 'Home sidebar', 'chamberonne' ),
        'before_title'  => '',
		'after_title'   => '',
		'before_widget' => '',
		'after_widget'  => '',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'chamberonne_sidebars' );

require get_template_directory() . '/inc/Prochainesactivits_Widget.php';
require get_template_directory() . '/inc/Derniresalarmes_Widget.php';

// Register Sidebars
function chamberonne_alarme_sidebars() {

    $args = array(
        'id'            => 'alarme_sidebar',
        'name'          => __( 'Alarme sidebar', 'chamberonne' ),
        'before_title'  => '',
		'after_title'   => '',
		'before_widget' => '',
		'after_widget'  => '',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'chamberonne_alarme_sidebars' );

require get_template_directory() . '/inc/Alarme_Widget.php';
require get_template_directory() . '/inc/Alarmesarchives_Widget.php';

$alarm_year = $_GET['alarm_year'];
