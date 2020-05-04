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


require 'inc/woocomerce/woocomerce_function.php';

$row = $wpdb->get_results(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = 'wp_users' AND column_name = 'user_phone'"  );

if(empty($row)){
    $wpdb->query("ALTER TABLE wp_users ADD user_phone VARCHAR (30) NOT NULL DEFAULT ''");
}


add_action('init', function() {
    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    if ( $url_path === 'login/order' ) {
        $load = locate_template('template-name/view/order.php', true);
        if ($load) {
            exit(); //
        }
    }

    if ( $url_path === 'login/dashboard' ) {
        $load = locate_template('template-name/view/dashboard.php', true);
        if ($load) {
            exit(); //
        }
    }

    if ( $url_path === 'login/info' ) {
        $load = locate_template('template-name/view/info.php', true);
        if ($load) {
            exit(); //
        }
    }
});

/**
 * Perform automatic login.
 */
function wpdocs_custom_login() {

    if(isset($_POST['username']) && isset($_POST['username']) ){

        $errors = [];
        if(empty($_POST['username'])){
            $errors['username'] = 'Username is not empty';
        }

        if(empty($_POST['password'])){
            $errors['password'] = 'Password is not empty';
        }

        if (count($errors)> 0){
            $string = http_build_query($errors);
            $url_redirect = home_url('login?'.$string);
            header("Refresh:0;".$url_redirect);
        } else{
            $creds = array(
                'user_login'    => $_POST['username'],
                'user_password' => $_POST['password'],
                'remember'      => true
            );
            $user = wp_signon( $creds, false );

            if ( is_wp_error( $user ) ) {
                $errors['error_login'] = $user->get_error_message();
                $string = http_build_query($errors);
                $url_redirect = home_url('login?'.$string);
                header("Refresh:0;".$url_redirect);
            } else{
                wp_redirect(site_url(), 301);
                exit();
            }
        }

    }

}

add_action( 'after_setup_theme', 'wpdocs_custom_login' );

function wpdocs_custom_register() {

    if(isset($_POST['user_name_create']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password_create']) && isset($_POST['phone']) &&  isset($_POST['email']) && isset($_POST['password_confirm'])){
        $errors = [];
        if(empty($_POST['user_name_create'])){
            $errors['user_name_create'] = 'Username is not empty';
        }

        if(empty($_POST['first_name'])){
            $errors['first_name'] = 'First name is not empty';
        }

        if(empty($_POST['last_name'])){
            $errors['last_name'] = 'Last name is not empty';
        }

        if(empty($_POST['password_create'])){
            $errors['password_create'] = 'Password is not empty';
        }

        if(empty($_POST['email'])){
            $errors['email'] = 'Email is not empty';
        }

        if(empty($_POST['phone'])){
            $errors['phone'] = 'Phone is not empty';
        }

        if(empty($_POST['password_confirm'])){
            $errors['password_confirm'] = 'Password Confirm is not empty';
        }

        if($_POST['password_confirm'] !=  $_POST['password_create']){
            $errors['password_math'] = 'Password is not same';
        }



        if (count($errors)> 0){
            $string = http_build_query($errors);
            $url_redirect = home_url('login?'.$string);
            header("Refresh:0;".$url_redirect);
        } else{
            if ( username_exists( $_POST['username'] )){
                $errors['username_exists'] = 'Username is already';
                $string = http_build_query($errors);
                $url_redirect = home_url('login?'.$string);
                header("Refresh:0;".$url_redirect);
            }elseif (email_exists($_POST['email'])){
                $errors['email_exists'] = 'Email is already';
                $string = http_build_query($errors);
                $url_redirect = home_url('login?'.$string);
                header("Refresh:0;".$url_redirect);
            }

            else{
                print_r($_POST['password_create']);
                $userdata = array(
                    'user_pass'             => $_POST['password_create'],   //(string) The plain-text user password.
                    'user_login'            => $_POST['user_name_create'],   //(string) The user's login username.
                    'user_nicename'         => $_POST['user_name_create'],   //(string) The URL-friendly user name.
                    'user_email'            => $_POST['email'],   //(string) The user email address.
                    'display_name'          => $_POST['user_name_create'],   //(string) The user's display name. Default is the user's username.
                    'nickname'              => $_POST['user_name_create'],   //(string) The user's nickname. Default is the user's username.
                    'first_name'            => $_POST['first_name'],   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
                    'last_name'             => $_POST['last_name'],   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
                    'user_registered'       => date("F j, Y, g:i a"),   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
                    'role'                  => 'administrator',   //(string) User's role.
                    'user_phone'            => $_POST['phone'],   //(string) User's role.
                );
                $user_id = wp_insert_user($userdata);

                if ( is_wp_error( $user_id ) ) {
                    $errors['insert_user'] = $user_id->get_error_message();
                    $string = http_build_query($errors);
                    $url_redirect = home_url('login?'.$string);
                    header("Refresh:0;".$url_redirect);
                } else{
                    $url_redirect = home_url('login');
                    header("Refresh:0;".$url_redirect);
                }
            }

        }

    }

}

add_action( 'after_setup_theme', 'wpdocs_custom_register' );

//apply_filters( 'wc_add_to_cart_message_html',  $message,  $products );
//
//add_filter('wc_add_to_cart_message', 'filter_add_to_cart_error');
//function filter_add_to_cart_error($message,  $products){
//    print_r($message);
//    die();
//}

/**
 * Adds Foo_Widget widget.
 */
class Select_Product_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'select_product_widget', // Base ID
            esc_html__( 'Choose a product', 'e-shopper' ), // Name
            array( 'description' => esc_html__( 'Select Special Product', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo esc_html__( 'Hello, World!', 'text_domain' );
        print_r(get_post($instance['product']));
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $product = ! empty( $instance['product'] ) ? $instance['product'] : esc_html__( 'New Product', 'text_domain' );
        $products = get_posts([
            'post_type' => 'product',
            'posts_per_page' => -1,
        ])
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'product' ) ); ?>"><?php esc_attr_e( 'Product:', 'text_domain' ); ?></label><br>
            <select name="<?php echo esc_attr( $this->get_field_name( 'product' ) ); ?>" id="<?php echo esc_attr( $this->get_field_name( 'product' ) ); ?>">

                <?php
                    if (is_array($products)){
                        if (count($products) > 0){
                            foreach ($products as $product){
                                ?>
                                <option <?php selected( $instance['product'], $product->ID) ?> value="<?php echo $product->ID ?>"><?php echo $product->post_title ?></option>
                                <?php
                            }
                        }
                    }
                ?>
            </select>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['product'] = ( ! empty( $new_instance['product'] ) ) ? sanitize_text_field( $new_instance['product'] ) : '';

        return $instance;
    }

} // class Foo_Widget

function register_special_product_widget() {
    register_widget( 'Select_Product_Widget' );
}
add_action( 'widgets_init', 'register_special_product_widget' );

function wpd_foo_rewrite_rule() {
    flush_rewrite_rules();
    add_rewrite_rule(
        '/^aaaaaaaaaaaaaaa/',
        'index.php?p=$matches[1]',
        'top'
    );
}
