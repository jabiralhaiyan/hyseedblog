<?php


class Academia_VC_Addons {


    function __construct() {
        // We safely integrate with VC with this hook
        add_action('init', array($this, 'academia_vc_integration'));


        // Register CSS and JS
        //add_action('wp_enqueue_scripts', array($this, 'loadCssAndJs'));
    }

    public function academia_vc_integration() {
        // Check if Visual Composer is installed
        if (!defined('WPB_VC_VERSION')) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array($this, 'showVcVersionNotice'));
            return;
        }


        /**
        * Most used elements in shortcode
        */

        /**
         * @var string Appica icon for all shortcodes
         */
        $icon = plugins_url( 'assets/images/academia-logo.png', __DIR__ );

        /**
         * @var string Shortcodes global category
         */
        $category = __( 'Academia', 'academia' );

        /**
         * @var string Shortcodes title i18n single call
         */
        $heading_title = __( 'Title', 'academia' );

        /**
         * @var string Shortcodes subtitle i18n single call
         */
        $heading_subtitle = __( 'Subtitle', 'academia' );

        /**
         * @var string Icon heading name
         */
        $heading_icon = __( 'Icon', 'academia' );

        /**
         * @var array Yes/No dropdown value
         */
        $value_yes_no = array(
            __( 'Yes', 'academia' ) => 'yes',
            __( 'No', 'academia' )  => 'no'
        );

        /**
         * @var array Left/Right dropdown value
         */
        $value_left_right = array(
            __( 'Left', 'academia' )  => 'left',
            __( 'Right', 'academia' ) => 'right'
        );

        /**
         * @var array ASC/DESC dropdown value
         */
        $value_asc_desc = array(
            __( 'Ascending', 'academia' )  => 'ASC',
            __( 'Descending', 'academia' ) => 'DESC'
        );


        /**
         * @var array "Enable/Disable" dropdown value
         */
        $value_enable_disable = array(
            __( 'Enable', 'academia' ) => 'enable',
            __( 'Disable', 'academia' ) => 'disable'
        );

        /**
         * @return array
         *
         * Get taxonomies terms links
         */

        function get_course_taxonomy_names(){
            $taxonomy = get_categories('taxonomy=course_name&type=academia_teacher');

            $names = array();

            foreach ($taxonomy as $term) {
                $names[$term->name] = $term->term_taxonomy_id;
            }

            return $names;

        }



        $tax_name = get_course_taxonomy_names();

        /**
         *
         * VC Tab Group
         *
         */

        $general = __( 'General', 'academia' );
        $design = __( 'Design', 'academia' );


        /**
        Add your Visual Composer logic here.
        Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.
        */


        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_teacher.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_instructor.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_social-box.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_quick-info.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_mailchimp.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_social-share.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_recent-post.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_testimonial.php';
        include ACADEMIA_CORE_ROOT . '/inc/vc-addons/vc_academia_course.php';


        vc_map( $academia_teacher_mapper );
        vc_map( $academia_instructor_mapper );
        vc_map( $academia_social_box_mapper );
        vc_map( $academia_quick_info_mapper );
        vc_map( $academia_mail_chimp_mapper );
        vc_map( $academia_social_share_mapper );
        vc_map( $academia_recent_post_mapper );
        vc_map( $academia_testimonial_mapper );
        vc_map( $academia_course_mapper );

    }


    /**
    Load plugin css and javascript files which you may need on front end of your site
    */
//    public function loadCssAndJs() {
//        wp_register_style( 'vc_extend_style', plugins_url('assets/vc_extend.css', __FILE__) );
//        wp_enqueue_style( 'vc_extend_style' );
//
//        // If you need any javascript files on front end, here is how you can load them.
//        //wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
//    }

    /**
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated.', 'academia'), $plugin_data['Name']).'</p>
        </div>';
    }



}

// Finally initialize code
new Academia_VC_Addons();
