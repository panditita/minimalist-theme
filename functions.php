<?php

if ( ! function_exists( 'minimalist_theme_setup' ) ) :

  /**
  * Sets up theme defaults and registers support for various WordPress features
  *
  *  It is important to set up these functions before the init hook so that none of these
  *  features are lost.
  *
  *  @since Minimalist Theme 1.0
  */

  function minimalist_theme_setup() {

    // Make theme translatable
    load_theme_textdomain( 'minimalist-theme', get_template_directory() . '/languages' );

    // One menu registered
    register_nav_menus( array(
      'main-menu'   => __( 'Main Menu', 'minimalist-theme' )
    ) );

    // Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

  }

}
add_action('after_setup_theme', 'minimalist_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function minimalist_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minimalist_theme_content_width', 800 );
}
add_action( 'after_setup_theme', 'minimalist_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimalist_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minimalist-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'minimalist-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'minimalist_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function minimalist_theme_scripts() {
	wp_enqueue_style( 'minimalist-theme-style', get_stylesheet_uri() );

  wp_enqueue_script( 'carmemias-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'minimalist_theme_scripts' );
