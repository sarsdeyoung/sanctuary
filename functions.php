<?php
/**
 * sanctuary functions and definitions
 *
 * @package sanctuary
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sanctuary_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sanctuary_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sanctuary, use a find and replace
	 * to change 'sanctuary' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sanctuary', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sanctuary' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sanctuary_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // sanctuary_setup
add_action( 'after_setup_theme', 'sanctuary_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sanctuary_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sanctuary' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sanctuary_widgets_init' );

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-left-widget',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}


/**
 * Custom Post Types
 */
add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
 register_post_type( 'cabin_page', 
 array(
      'labels' => array(
      	'name' => __( 'Cabin Pages' ),
      	'singular_name' => __( 'Cabin Page' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Cabin Page' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Cabin Page' ),
      	'new_item' => __( 'New Cabin Page' ),
      	'view' => __( 'View Cabin Page' ),
      	'view_item' => __( 'View Cabin Page' ),
      	'search_items' => __( 'Search Cabin Pages' ),
      	'not_found' => __( 'No Cabin Pages found' ),
      	'not_found_in_trash' => __( 'No Cabin Pages found in Trash' ),
      	'parent' => __( 'Parent Cabin Page' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'cabin_pages'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
}



/**
 * Enqueue scripts and styles.
 */
function sanctuary_scripts() {
	
	wp_enqueue_script( 'jquery', false, false, false, false );
	wp_enqueue_style( 'sanctuary-style', get_stylesheet_uri() );
	
	wp_enqueue_style('Arvo', 'http://fonts.googleapis.com/css?family=Arvo:400,700', false, false, false );
	wp_enqueue_style('Open Sans', 'http://fonts.googleapis.com/css?family=Open+Sans', false, false, false );
	wp_enqueue_style('Open Sans Condensed', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', false, false, false );

	//wp_enqueue_script( 'sanctuary-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	
	wp_enqueue_script( 'sanctuary-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sanctuary_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
