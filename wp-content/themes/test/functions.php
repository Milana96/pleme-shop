<?php
/**
 * Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Test
 */

if ( ! function_exists( 'test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Test, use a find and replace
		 * to change 'test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'test' ),
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
		add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
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
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1.0.0', 'all');
	// ***** call jQuery before navigation where the jQuery is used *****
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', false );
	wp_enqueue_script( 'hamburger', get_template_directory_uri() . '/assets/js/hamburger.js', array('jQuery'), '', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '', true );
	wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/popup.js', array(), '1.0.0', true );
	wp_enqueue_script( 'test-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

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

// disable gutenberg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable gutenberg for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

//remove display notice - Showing all x results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

//remove default sorting drop-down from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//Custom Post Type
// Register Custom Post Type
function proizvodi() {

	$labels = array(
		'name'                  => _x( 'Proizvodi', 'Post Type General Name', 'twentyseventeen' ),
		'singular_name'         => _x( 'Proizvod', 'Post Type Singular Name', 'twentyseventeen' ),
		'menu_name'             => __( 'Proizvodi', 'twentyseventeen' ),
		'name_admin_bar'        => __( 'Proizvodi', 'twentyseventeen' ),
		'archives'              => __( 'Proizvodi', 'twentyseventeen' ),
		'attributes'            => __( 'Proizvodi', 'twentyseventeen' ),
		'parent_item_colon'     => __( 'Parent proizvod:', 'twentyseventeen' ),
		'all_items'             => __( 'Svi proizvodi', 'twentyseventeen' ),
		'add_new_item'          => __( 'Dodaj novi proizvod', 'twentyseventeen' ),
		'add_new'               => __( 'Dodaj proizvod', 'twentyseventeen' ),
		'new_item'              => __( 'Novi proizvod', 'twentyseventeen' ),
		'edit_item'             => __( 'Uredi proizvod', 'twentyseventeen' ),
		'update_item'           => __( 'Sacuvaj proizvod', 'twentyseventeen' ),
		'view_item'             => __( 'Pogledaj proizvod', 'twentyseventeen' ),
		'view_items'            => __( 'Pogledaj proizvode', 'twentyseventeen' ),
		'search_items'          => __( 'Trazi proizvode', 'twentyseventeen' ),
		'not_found'             => __( 'Not found', 'twentyseventeen' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'twentyseventeen' ),
		'featured_image'        => __( 'Featured Image', 'twentyseventeen' ),
		'set_featured_image'    => __( 'Set featured image', 'twentyseventeen' ),
		'remove_featured_image' => __( 'Remove featured image', 'twentyseventeen' ),
		'use_featured_image'    => __( 'Use as featured image', 'twentyseventeen' ),
		'insert_into_item'      => __( 'Insert into item', 'twentyseventeen' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'twentyseventeen' ),
		'items_list'            => __( 'Items list', 'twentyseventeen' ),
		'items_list_navigation' => __( 'Items list navigation', 'twentyseventeen' ),
		'filter_items_list'     => __( 'Filter items list', 'twentyseventeen' ),
	);
	$args = array(
		'label'                 => __( 'Opis proizvoda', 'twentyseventeen' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
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
	register_post_type( 'proizvodi', $args );

}
add_action( 'init', 'proizvodi', 0 );

//Register taxonomy

function colors() {
	$labels = array(
		'name'              => _x( 'Colors', 'taxonomy general name' ),
		'singular_name'     => _x( 'Color', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Colors' ),
		'all_items'         => __( 'All Colors' ),
		'parent_item'       => __( 'Parent Color' ),
		'parent_item_colon' => __( 'Parent Color:' ),
		'edit_item'         => __( 'Edit Color' ),
		'update_item'       => __( 'Update Color' ),
		'add_new_item'      => __( 'Add New Color' ),
		'new_item_name'     => __( 'New Color Name' ),
		'menu_name'         => __( 'Colors' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'colors' ),
	);

	register_taxonomy( 'colors', array( 'proizvodi' ), $args );
}
add_action( 'init', 'colors', 0 );

function jewelry() {
	$labels = array(
		'name'              => _x( 'Jewelry', 'taxonomy general name' ),
		'singular_name'     => _x( 'Jewelry', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Jewelry' ),
		'all_items'         => __( 'All Jewelry' ),
		'parent_item'       => __( 'Parent Jewelry' ),
		'parent_item_colon' => __( 'Parent Jewelry:' ),
		'edit_item'         => __( 'Edit Jewelry' ),
		'update_item'       => __( 'Update Jewelry' ),
		'add_new_item'      => __( 'Add New Jewelry' ),
		'new_item_name'     => __( 'New Jewelry Name' ),
		'menu_name'         => __( 'Jewelry' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'jewelry' ),
	);

	register_taxonomy( 'jewelry', array( 'product' ), $args );
}
add_action( 'init', 'jewelry', 0 );

//support for thumbnail image for custom post type
add_post_type_support( 'proizvodi', 'thumbnail' );
