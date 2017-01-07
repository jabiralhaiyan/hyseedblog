<?php

/*
Plugin Name: Academia Core
Plugin URI: http://themexpert.com
Description: An essential plugin for Academia Theme which includes core functionality of Academia.
Version: 3.1
Author: ThemeXpert
Author URI: http://themexpert.com
License: GPLv2 or later
Text Domain: academia
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 *
 * Plugin DocRoot absolute path without trailing slash
 *
 */

define( 'ACADEMIA_CORE_ROOT', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

require ACADEMIA_CORE_ROOT . '/inc/helper_functions.php';

require_once ACADEMIA_CORE_ROOT . '/inc/post-type/class-cpt-course.php';
require_once ACADEMIA_CORE_ROOT . '/inc/post-type/class-cpt-teacher.php';
require_once ACADEMIA_CORE_ROOT . '/inc/post-type/class-cpt-testimonial.php';
require_once ACADEMIA_CORE_ROOT . '/inc/post-type/class-cpt-notice.php';

require ACADEMIA_CORE_ROOT . '/inc/metabox/academia-mb-publication.php';
require ACADEMIA_CORE_ROOT . '/inc/metabox/academia-mb-teacher.php';
require ACADEMIA_CORE_ROOT . '/inc/metabox/academia-mb-course.php';
require ACADEMIA_CORE_ROOT . '/inc/metabox/academia-mb-page.php';
require ACADEMIA_CORE_ROOT . '/inc/metabox/academia-mb-testimonial.php';

require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-teacher.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-instructor.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-socialbox.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-mailchimp.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-quickinfo.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-socialshare.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-recent-post.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-testimonial.php';
require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-custom-login.php';

require_once ACADEMIA_CORE_ROOT . '/inc/shortcodes/class-shortcode-course.php';


require_once ACADEMIA_CORE_ROOT . '/inc/class-vc_map.php';

require ACADEMIA_CORE_ROOT . '/inc/woo_functions.php';


/**
 * Load plugin
 *
 * Load the text domain and hook up the CPTs
 *
 */

function academia_core_load() {

    // Load text domain
    load_plugin_textdomain( 'academia', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    // Let's add some CPTs
    Academia_CPT_Course::init();
    Academia_CPT_Teacher::init();
    Academia_CPT_Testimonial::init();
    Academia_CPT_NoticeBoard::init();

    // Shortcodes are awesome
    Academia_Shortcode_Teacher::init();
    Academia_Shortcode_Instructor::init();
    Academia_Shortcode_SocialBox::init();
    Academia_Shortcode_MailChimp::init();
    Academia_Shortcode_QuickInfo::init();
    Academia_Shortcode_SocialShare::init();
    Academia_Shortcode_Recent_Post::init();
    Academia_Shortcode_Testimonial::init();
    Academia_Shortcode_Course::init();
    Academia_Shortcode_Custom_Login::init();
}

add_action( 'plugins_loaded', 'academia_core_load' );

/**
 *
 * Flush rewrite rules on plugin activation/deactivation
 *
 */

function academia_core_flush() {
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'academia_core_flush' );
register_deactivation_hook( __FILE__, 'academia_core_flush' );