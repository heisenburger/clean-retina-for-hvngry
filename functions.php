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
?>

add_theme_support( 'post-thumbnails' ); 

if ( ! isset( $content_width ) )
  $content_width = 962;

function cleanretina_core_functionality() {
  /** 
   * cleanretina_add_functionality hook
   *
   * Adding other addtional functionality if needed.
   */
  do_action( 'cleanretina_add_functionality' );

  // Add default posts and comments RSS feed links to head
  add_theme_support( 'automatic-feed-links' );

  // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
  add_theme_support( 'post-thumbnails' ); 
    
  // Remove WordPress version from header for security concern
  remove_action( 'wp_head', 'wp_generator' );
 
  // This theme uses wp_nav_menu() in header menu location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'cleanretina' ) );

  // Add Clean Retina custom image sizes
  add_image_size( 'featured', 962, 370, true);
  add_image_size( 'featured-medium', 330, 330, true);
  add_image_size( 'slider', 962, 390, true);    // used on Featured Slider on Homepage Header
  add_image_size( 'gallery', 330, 230, true);     // used to show gallery all images

  /**
   * This theme supports custom background color and image
   */
  add_theme_support( 'custom-background' );

  // Adding excerpt option box for pages as well
  add_post_type_support( 'page', 'excerpt' );
}