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