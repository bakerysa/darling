<?php
/**
 * Darling functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Darling
 */

if ( ! function_exists( 'darling_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function darling_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Darling, use a find and replace
		 * to change 'darling' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'darling', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'darling' ),
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
		add_theme_support( 'custom-background', apply_filters( 'darling_custom_background_args', array(
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
add_action( 'after_setup_theme', 'darling_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function darling_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'darling_content_width', 640 );
}
add_action( 'after_setup_theme', 'darling_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function darling_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'darling' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'darling' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'darling_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function darling_scripts() {

	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300' );

	wp_enqueue_style( 'fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'darling-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js' );

	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/assets/js/custom.min.js' );

	wp_enqueue_script( 'darling-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'darling-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'darling_scripts' );

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

function create_post_type() {
	/**
	 * Directors Post Type
	 */
  register_post_type( 'Videos',
    array(
      'labels' => array(
        'name' => __( 'Videos' ),
        'singular_name' => __( 'Video' )
      ),
      'public' => true,
			'menu_icon'   => 'dashicons-video-alt2',
			'supports' => array( 'title', 'editor', 'thumbnail', 'cat' ),
			'taxonomies' => array( 'director' ),
    )
  );

	register_taxonomy(
    		'directors',
    		array(
    			'hierarchical'  => false,
    			'label'         => __( 'Directors', CURRENT_THEME ),
    			'singular_name' => __( 'Director', CURRENT_THEME ),
    			'rewrite'       => true,
    			'query_var'     => true
    		)
    	);
}
add_action( 'init', 'create_post_type' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('location', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Locations', 'taxonomy general name' ),
      'singular_name' => _x( 'Location', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'parent_item' => __( 'Parent Location' ),
      'parent_item_colon' => __( 'Parent Location:' ),
      'edit_item' => __( 'Edit Location' ),
      'update_item' => __( 'Update Location' ),
      'add_new_item' => __( 'Add New Location' ),
      'new_item_name' => __( 'New Location Name' ),
      'menu_name' => __( 'Locations' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'locations', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );
