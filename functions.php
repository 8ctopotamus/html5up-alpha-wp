<?php
/**
 * html5up-alpha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package html5up-alpha
 */

if ( ! function_exists( 'html5up_alpha_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function html5up_alpha_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on html5up-alpha, use a find and replace
		 * to change 'html5up-alpha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'html5up-alpha', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		include 'nav_social_walker.php' ;

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'html5up-alpha' ),
			'social' => esc_html__( 'social', 'html4up-alpha')			
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'html5up_alpha_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'html5up_alpha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function html5up_alpha_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'html5up_alpha_content_width', 640 );
}
add_action( 'after_setup_theme', 'html5up_alpha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function html5up_alpha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'html5up-alpha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'html5up-alpha' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s box">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'html5up_alpha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function html5up_alpha_scripts() {
	wp_enqueue_style( 'html5up-alpha-style', get_stylesheet_uri() );
	wp_enqueue_script( 'html5up-alpha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'html5up_alpha_js', get_template_directory_uri() . '/js/bundle.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'html5up_alpha_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function h5ua_admin_enqueue() {
	wp_enqueue_style(
		'html5up-alpha-admin-style',
		get_template_directory_uri() . '/css/admin.css',
	);
	
	wp_enqueue_style('thickbox');
	wp_enqueue_script('jquery');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
}
add_action( 'admin_enqueue_scripts', 'h5ua_admin_enqueue' );


/**
 * Body Classes
 */
function my_body_classes( $classes ) {
	if ( is_page_template( 'page-landing.php' ) ) {
		$classes[] = 'landing';
	}
	$classes[] = 'is-preload';
  return $classes;
}
add_filter( 'body_class','my_body_classes' );

/**
 * Plugin Name: Menu Link Classes (I)
 * Description: Target menu link classes with the "a-class-" class prefix.
 * Author:      Birgir Erlendsson (birgire)
 * Plugin URI:  http://wordpress.stackexchange.com/a/190844/26350
 * Version:     0.0.1
 */

/**
 * Remove menu classes with the "a-class-" prefix
 */
add_filter( 'nav_menu_css_class', function( $classes )
{
    return array_filter( 
        $classes, 
        function( $val )
        {
            return 'a-class-' !== substr( $val, 0, strlen( 'a-class-' ) );
        } 
    );
} );

/**
 * Add only "a-class-" prefixed classes to the menu link attribute
 */
add_filter( 'nav_menu_link_attributes', function( $atts, $item )
{
    if( isset( $item->classes ) )
    {
        $atts['class'] = str_replace( 
            'a-class-',
            '',
            join( 
                ' ', 
                array_filter(
                    $item->classes, 
                    function( $val )
                    {
                        return 'a-class-' === substr( $val, 0, strlen( 'a-class-' ) );
                    } 
                ) 
            )
        );
    }
    return $atts;
}, 10, 2 );

/**
 * Custom Meta Boxes
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





