<?php
function my_theme_enqueue_styles() {

    $parent_style = 'clean-retina-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

if ( ! isset( $content_width ) )
  $content_width = 962;

function wpsites_random_posts_order( $query ) {
    if ( $query->is_home() && !is_admin() && $query->is_main_query() ) {
        $query->set( 'orderby', 'rand' );
    }
}
add_action( 'pre_get_posts', 'wpsites_random_posts_order' );
?>