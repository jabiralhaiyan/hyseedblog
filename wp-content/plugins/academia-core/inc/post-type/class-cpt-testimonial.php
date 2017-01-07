<?php

/**
 *
 * CPT "Testimonial"
 *
 */
class Academia_CPT_Testimonial {

    /**
     * Custom Post Type slug.
     * @var string
     */
    private $post_type = 'academia_testimonial';

    /**
     * Instance of class.
     * @var null|Academia_CPT_Testimonial
     */
    private static $instance;

    /**
     * Initialization
     *
     * @return Academia_CPT_Testimonial
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ), 0 );
    }

    public function register_post_type() {
        $labels = array(
            'name'                  => _x( 'Testimonials', 'Post Type General Name', 'academia' ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'academia' ),
            'menu_name'             => __( 'Testimonial', 'academia' ),
            'name_admin_bar'        => __( 'Testimonial', 'academia' ),
            'archives'              => __( 'Testimonial Archives', 'academia' ),
            'parent_item_colon'     => __( 'Parent Testimonial:', 'academia' ),
            'all_items'             => __( 'All Testimonials', 'academia' ),
            'add_new_item'          => __( 'Add New Testimonial', 'academia' ),
            'add_new'               => __( 'Add New', 'academia' ),
            'new_item'              => __( 'New Testimonial', 'academia' ),
            'edit_item'             => __( 'Edit Testimonial', 'academia' ),
            'update_item'           => __( 'Update Testimonial', 'academia' ),
            'view_item'             => __( 'View Testimonial', 'academia' ),
            'search_items'          => __( 'Search Testimonial', 'academia' ),
            'not_found'             => __( 'Not found', 'academia' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'academia' ),
            'featured_image'        => __( 'Client\'s Image', 'academia' ),
            'set_featured_image'    => __( 'Set client\'s image', 'academia' ),
            'remove_featured_image' => __( 'Remove client\'s image', 'academia' ),
            'use_featured_image'    => __( 'Use as client\'s image', 'academia' ),
            'insert_into_item'      => __( 'Insert into testimonial', 'academia' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'academia' ),
            'items_list'            => __( 'Testimonials list', 'academia' ),
            'items_list_navigation' => __( 'Testimonials list navigation', 'academia' ),
            'filter_items_list'     => __( 'Filter teachers list', 'academia' ),
        );
        $args = array(
            'label'                 => __( 'Testimonial', 'academia' ),
            'description'           => __( 'Add and manage client\'s testimonial.', 'academia' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'taxonomies'            => array( ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 30,
            'menu_icon'             => 'dashicons-format-quote',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite'               => array( 'slug' => 'testimonial' ),
        );

        register_post_type( $this->post_type, $args );
    }
}
