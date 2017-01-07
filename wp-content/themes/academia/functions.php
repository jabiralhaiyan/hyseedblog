<?php
/**
 * academia functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package academia
 */

define( 'ACADEMIA_VERSION', '2.3' );

if ( ! function_exists( 'tx_academia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function tx_academia_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on academia, use a find and replace
	 * to change 'academia' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'academia', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'academia' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'audio',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tx_academia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tx_academia_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tx_academia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tx_academia_content_width', 640 );
}
add_action( 'after_setup_theme', 'tx_academia_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tx_academia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'academia' ),
		'id'            => 'sidebar-1',
		'description'   =>  esc_html__('Sidebar widget area. You set set it right or left from Academia theme option menu.', 'academia'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Language Switcher Area', 'academia' ),
		'id'            => 'header-lang-switcher',
		'description'   => esc_html__('Widget Area for Header Language Switcher.', 'academia'),
		'before_widget' => '<div class="mod-languages pull-right">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


    register_sidebar( array(
        'name'          => esc_html__( 'Header Info Area', 'academia' ),
        'id'            => 'header-info',
        'description'   => esc_html__('Widget Area for Header Info.', 'academia'),
        'before_widget' => '<div class="no-margin">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Events Sidebar', 'academia' ),
        'id'            => 'events-sidebar',
        'description'   => esc_html__('Widget Area for Events Single Page.', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Course Sidebar', 'academia' ),
        'id'            => 'course-sidebar',
        'description'   => esc_html__('Widget Area for LearnPress Course Page.', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top 1', 'academia' ),
		'id'            => 'footer-top-1',
		'description'   => esc_html__('First Footer Top Widget Area', 'academia'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top 2', 'academia' ),
		'id'            => 'footer-top-2',
		'description'   => esc_html__('Second Footer Top Widget Area', 'academia'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'academia' ),
        'id'            => 'footer-1',
        'description'   => esc_html__('First Footer Widget Area', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'academia' ),
        'id'            => 'footer-2',
        'description'   => esc_html__('Second Footer Widget Area', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'academia' ),
        'id'            => 'footer-3',
        'description'   => esc_html__('Third Footer Widget Area', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'academia' ),
        'id'            => 'footer-4',
        'description'   => esc_html__('Fourth Footer Widget Area', 'academia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


}
add_action( 'widgets_init', 'tx_academia_widgets_init' );

add_filter( 'widget_text', 'do_shortcode' );



/**
 * Tag Cloud font size customization
 */

add_filter('widget_tag_cloud_args','tx_academia_set_cloud_tag_size');


function tx_academia_set_cloud_tag_size( $args ) {
	$args['number'] = 20;
	$args['largest'] = 26;
	$args['smallest'] = 14;
	$args['unit'] = 'px';
	return $args;
}

/**
 * Custom Excerpt length
 */

function tx_academia_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'tx_academia_excerpt_length', 999 );



/**
 * Search Form
 */

add_filter( 'get_search_form', 'tx_academia_search_form' );

function tx_academia_search_form( $form ) {
	$form = '<form action="'. home_url('/') .'" method="get" class="form-inline form-search">
            <label for="s" class="element-invisible">' . esc_html__('Search ...', 'academia') . '</label>
            <input name="s" id="s" class="form-control search-query" type="search" placeholder="' . esc_attr__('Search ...', 'academia') . '">
        </form>';

return $form;
}

/**
 * TX Megamenu
 */
require get_template_directory() . '/lib/tx-megamenu/tx_mega_menu.php';

/**
 * Load Codestar Framework
 */
require_once get_template_directory() . '/lib/cs-framework/cs-framework.php';

/**
 * Load Custom Framework Options
 */
require_once get_template_directory() . '/inc/tx-framework.php';

/**
 * Enqueue scripts and styles.
 */
function tx_academia_scripts() {


    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dist/css/bootstrap.css' );

    wp_enqueue_style('animate', get_template_directory_uri() . '/dist/css/animate.css' );

    wp_enqueue_style('font-awesome-academia', get_template_directory_uri() . '/dist/css/font-awesome.css' );

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/dist/css/magnific-popup.css' );

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/dist/css/owl.carousel.css' );

    wp_enqueue_style( 'academia-style', get_stylesheet_uri() );

    wp_enqueue_style('academia-font', get_template_directory_uri() . '/dist/fonts/academia/style.css' );

    wp_enqueue_style('montserrat-font', get_template_directory_uri() . '/dist/fonts/montserrat/montserrat.css' );

    wp_enqueue_style('academia-main-style', get_template_directory_uri() . '/dist/css/'. cs_get_option('tx_theme_style') .'.css' );

    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array('jquery'), ACADEMIA_VERSION, true );

    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/dist/js/owl.carousel.js', array('jquery'), ACADEMIA_VERSION, true );

	wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/dist/js/jquery.magnific-popup.js', array('jquery'), ACADEMIA_VERSION, true );

	wp_enqueue_script( 'atvimg-js', get_template_directory_uri() . '/dist/js/atvImg-min.js', array( ), ACADEMIA_VERSION, true );

	wp_enqueue_script( 'classie', get_template_directory_uri() . '/dist/js/classie.js', array( ), ACADEMIA_VERSION, true );

	if(cs_get_option('tx_preloader_enable')) {
		wp_enqueue_script( 'pace-js', get_template_directory_uri() . '/dist/js/pace.min.js', array( ), ACADEMIA_VERSION, false );
	}

	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/dist/js/wow.js', array( ), ACADEMIA_VERSION, true );

    wp_enqueue_script( 'academia-js', get_template_directory_uri() . '/dist/js/script.js', array('jquery'), ACADEMIA_VERSION, true );

    wp_enqueue_script( 'academia-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), ACADEMIA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tx_academia_scripts' );

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



/**
 * WooCommerce Support
 */
require_once get_template_directory() . '/inc/woo_custom_function.php';


/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * Academia Plugin Activation
 */
require_once get_template_directory() . '/inc/plugin_activation.php';

/**
 * Visual Composer Hooks
 */
require_once get_template_directory() . '/inc/vc.php';

/**
 * Academia Helper Function
 */

include get_template_directory() . '/inc/helper_functions.php';


/**
 * Preloader Option
 */

if(cs_get_option('tx_preloader_enable')) {
	include get_template_directory() . '/inc/preloader.php';
}

/**
 * Custom Style
 */

include get_template_directory() . '/inc/option_style.php';


