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

}
add_action('after_setup_theme', 'chamberonne_setup');

// Register Custom Post Type
function alarm_type() {

    $labels = array(
        'name'                  => _x( 'Alarms', 'Post Type General Name', 'chamberonne' ),
        'singular_name'         => _x( 'Alarm', 'Post Type Singular Name', 'chamberonne' ),
        'menu_name'             => __( 'Alarms', 'chamberonne' ),
        'name_admin_bar'        => __( 'Alarm', 'chamberonne' ),
        'archives'              => __( 'Alarm Archives', 'chamberonne' ),
        'attributes'            => __( 'Alarm Attributes', 'chamberonne' ),
        'parent_item_colon'     => __( 'Parent Alarm:', 'chamberonne' ),
        'all_items'             => __( 'All Alarms', 'chamberonne' ),
        'add_new_item'          => __( 'Add New Alarm', 'chamberonne' ),
        'add_new'               => __( 'Add New Alarm', 'chamberonne' ),
        'new_item'              => __( 'New Alarm', 'chamberonne' ),
        'edit_item'             => __( 'Edit Alarm', 'chamberonne' ),
        'update_item'           => __( 'Update Alarm', 'chamberonne' ),
        'view_item'             => __( 'View Alarm', 'chamberonne' ),
        'view_items'            => __( 'View Alarms', 'chamberonne' ),
        'search_items'          => __( 'Search Alarm', 'chamberonne' ),
        'not_found'             => __( 'Not found', 'chamberonne' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chamberonne' ),
        'featured_image'        => __( 'Featured Image', 'chamberonne' ),
        'set_featured_image'    => __( 'Set featured image', 'chamberonne' ),
        'remove_featured_image' => __( 'Remove featured image', 'chamberonne' ),
        'use_featured_image'    => __( 'Use as featured image', 'chamberonne' ),
        'insert_into_item'      => __( 'Insert into alarm', 'chamberonne' ),
        'uploaded_to_this_item' => __( 'Uploaded to this alarm', 'chamberonne' ),
        'items_list'            => __( 'Alarms list', 'chamberonne' ),
        'items_list_navigation' => __( 'Alarms list navigation', 'chamberonne' ),
        'filter_items_list'     => __( 'Filter alarms list', 'chamberonne' ),
    );
    $args = array(
        'label'                 => __( 'Alarm', 'chamberonne' ),
        'description'           => __( 'Alarm Description', 'chamberonne' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'alarm_categories', ' cities' ),
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
function alarm_category_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Alarm Categories', 'Taxonomy General Name', 'chamberonne' ),
        'singular_name'              => _x( 'Alarm Category', 'Taxonomy Singular Name', 'chamberonne' ),
        'menu_name'                  => __( 'Alarm Category', 'chamberonne' ),
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
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'alarm_categories', array( 'alarm' ), $args );

}
add_action( 'init', 'alarm_category_taxonomy', 0 );

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
        'taxonomies'            => array( 'activity_categories', ' cities' ),
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
function activity_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Activity Categories', 'Taxonomy General Name', 'chamberonne' ),
        'singular_name'              => _x( 'Activity Category', 'Taxonomy Singular Name', 'chamberonne' ),
        'menu_name'                  => __( 'Activity Category', 'chamberonne' ),
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
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'activity_categories', array( 'activity' ), $args );

}
add_action( 'init', 'activity_taxonomy', 0 );

// Register Custom Taxonomy
function city_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Cities', 'Taxonomy General Name', 'chamberonne' ),
        'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'chamberonne' ),
        'menu_name'                  => __( 'City', 'chamberonne' ),
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
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'city', array( 'alarm', 'activity' ), $args );

}
add_action( 'init', 'city_taxonomy', 0 );