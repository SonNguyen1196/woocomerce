<?php
/**
 * e-shopper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package e-shopper
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'e_shopper_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function e_shopper_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on e-shopper, use a find and replace
		 * to change 'e-shopper' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'e-shopper', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'e-shopper' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'e_shopper_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'e_shopper_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function e_shopper_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'e_shopper_content_width', 640 );
}
add_action( 'after_setup_theme', 'e_shopper_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function e_shopper_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'e-shopper' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'e-shopper' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'e_shopper_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function e_shopper_scripts() {

    wp_enqueue_style('e-shopper-boostrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('e-shopper-carousel', get_stylesheet_directory_uri().'/assets/css/owl.carousel.min.css');
    wp_enqueue_style('e-shopper-carousel-default', get_stylesheet_directory_uri().'/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('e-shopper-core', get_stylesheet_directory_uri().'/assets/css/core.css');
    wp_enqueue_style('e-shopper-shortcodes', get_stylesheet_directory_uri().'/assets/css/shortcode/shortcodes.css');
    wp_enqueue_style('e-shopper-style', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_style('e-shopper-responsive', get_stylesheet_directory_uri().'/assets/css/responsive.css');
    wp_enqueue_style('e-shopper-custom', get_stylesheet_directory_uri().'/assets/css/custom.css');

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'e-shopper-modernizr-3.5.0', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array(), _S_VERSION, true );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.2.1.min.js', array(), _S_VERSION, true );
    wp_enqueue_script('e-shopper-jquery');
    wp_enqueue_script( 'e-shopper-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-waypoints-js', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'e-shopper-ajax-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), _S_VERSION, true );
    wp_localize_script( 'e-shopper-ajax-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'e_shopper_scripts' );

require 'inc/class-nav-walker-menu.php';

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce');
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.htc__shopping__cart
    $cols = 9;
    return $cols;
}

add_action("wp_ajax_get_data_product_page_ajax", "get_data_product_page_ajax");
add_action("wp_ajax_nopriv_get_data_product_page_ajax", "get_data_product_page_ajax");

function get_data_product_page_ajax(){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'numberposts' => 5,
        'post_type'   => 'product',
        'max_num_pages' =>$paged
    );

    try {
        $latest_books = get_posts( $args );
        print_r($latest_books) ;
    } catch (Exception $exception){
        return $exception->getLine() . ' ---- ' . $exception->getMessage();
    }


    die();
}

add_action("wp_ajax_custom_ajax_add_to_cart", "custom_ajax_add_to_cart");
add_action("wp_ajax_nopriv_custom_ajax_add_to_cart", "custom_ajax_add_to_cart");

function custom_ajax_add_to_cart() {

    $product_id = absint($_POST['product_id']);

    if ($product_id) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        WC_AJAX :: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}

//function custom_ajax_add_to_cart(){
//    if(!empty($_POST['product_id'])){
//        $product_id = $_POST['product_id'];
//        global $woocommerce;
//        $woocommerce->cart->add_to_cart($product_id);
//        WC_AJAX :: get_refreshed_fragments();
//        wp_send_json_success(['message' => 'Success',  'code' => 200]);
//    } else{
//        wp_send_json_error(['message' => 'Fail',  'code' => 500]);
//    }
//
//    die();
//}

//add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
//
//function iconic_cart_count_fragments( $fragments ) {
//
////    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
//    global $woocommerce;
//    ob_start();
//    $fragments['a.mini-cart-custom'] = ob_get_clean();
//    $fragments['span.htc__qua'] = '<span class="htc__qua">'. $woocommerce->cart->cart_contents_count .'</span>';
//    return $fragments;
//
//}

add_filter( 'woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1 );
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="mini-cart-custom" href="#"><span class="htc__qua"><?php echo $woocommerce->cart->cart_contents_count ;?></span></a>
    <?php
    $fragments['a.mini-cart-custom'] = ob_get_clean();

    return $fragments;
}

//apply_filters( 'wc_add_to_cart_message_html',  $message,  $products );
//
//add_filter('wc_add_to_cart_message', 'filter_add_to_cart_error');
//function filter_add_to_cart_error($message,  $products){
//    print_r($message);
//    die();
//}
require 'inc/woocomerce_function.php';
