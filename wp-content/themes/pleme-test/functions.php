<?php

/**
 * Pleme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pleme Theme
 */

if (!function_exists('kamaengine_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kamaengine_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme kamaengined on Pleme Theme, use a find and replace
		 * to change 'Pleme Theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('Pleme Theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'Pleme Theme'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('kamaengine_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'kamaengine_setup');

/**
 * Set the content width in pixels, kamaengined on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kamaengine_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('kamaengine_content_width', 640);
}
add_action('after_setup_theme', 'kamaengine_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function kamaengine_scripts()
{
	wp_enqueue_style('Pleme Theme-style', get_stylesheet_uri());
	wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.min.css');

	wp_enqueue_script('vendor-main', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '1.1', true);

	wp_dequeue_style('wp-block-library');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	/**************************************************
	 * Passed data in main.js
	 **************************************************/
	$dataToBePassed = array(
		'themeUrl'	=> get_stylesheet_directory_uri(),
		'ajaxUrl'	=> admin_url('admin-ajax.php')
	);

	wp_localize_script('main', 'GlobalThemeData', $dataToBePassed);
}

add_action('wp_enqueue_scripts', 'kamaengine_scripts');

function admin_style()
{
	wp_register_style('admin_css', get_stylesheet_directory_uri() . '/assets/css/admin.css', false, '1.0.0');
	wp_enqueue_style('admin_css', get_stylesheet_directory_uri() . '/assets/css/admin.css', false, '1.0.0');
}
add_action('admin_enqueue_scripts', 'admin_style');
/**************************************************
 * Include Theme vendor functions
 **************************************************/
require get_template_directory() . '/inc/vendor-include.php';
/**
 * Theme functions and options
 */
require get_template_directory() . '/inc/theme-core.php';
/**************************************************
 * Init all development files 
 **************************************************/
require get_template_directory() . '/inc/dev-functions/index.php';
/**************************************************
 * Init  Custom Post Type
 **************************************************/
require get_template_directory() . '/inc/cpt/index.php';

// Social media shortcode
add_shortcode('social-media', 'get_theme_social');

// Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
      'page_title'      => 'Theme Option',
      'menu_title'      => 'Theme Option',
      'menu_slug'       => 'theme-option',
      'capability'      => 'edit_posts',
      'post_id'         => 'option',
      'redirect'        => false
   ));
}

// Remove result count from Shop page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

	?>
	<a class="cart-icon" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Pogledaj korpu'); ?>"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></a>
    <?php

    $fragments['a.cart-icon'] = ob_get_clean();

    return $fragments;

}


