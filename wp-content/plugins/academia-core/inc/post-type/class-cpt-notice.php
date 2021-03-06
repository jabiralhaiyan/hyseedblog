<?php

/**
 *
 * CPT "Notice"
 *
 */
class Academia_CPT_NoticeBoard {

    /**
     * Custom Post Type slug.
     * @var string
     */
    private $post_type = 'academia_notice';

    /**
     * Custom taxonomy - category - for post type
     * @var string
     */
    private $taxonomy = 'academia_notice_category';

    /**
     * Instance of class.
     * @var null|Academia_CPT_NoticeBoard
     */
    private static $instance;

    /**
     * Initialization
     *
     * @return Academia_CPT_NoticeBoard
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ), 0 );
        add_action( 'init', array( $this, 'register_taxonomy' ), 0 );

    }

    public function register_post_type() {
        $labels = array(
            'name'                  => _x( 'Notices', 'Post Type General Name', 'academia' ),
            'singular_name'         => _x( 'Notice', 'Post Type Singular Name', 'academia' ),
            'menu_name'             => __( 'Notice Board', 'academia' ),
            'name_admin_bar'        => __( 'Notice Board', 'academia' ),
            'archives'              => __( 'Notice Archives', 'academia' ),
            'parent_item_colon'     => __( 'Parent Notice:', 'academia' ),
            'all_items'             => __( 'All Notices', 'academia' ),
            'add_new_item'          => __( 'Add New Notice', 'academia' ),
            'add_new'               => __( 'Add New', 'academia' ),
            'new_item'              => __( 'New Notice', 'academia' ),
            'edit_item'             => __( 'Edit Notice', 'academia' ),
            'update_item'           => __( 'Update Notice', 'academia' ),
            'view_item'             => __( 'View Notice', 'academia' ),
            'search_items'          => __( 'Search Notice', 'academia' ),
            'not_found'             => __( 'Not found', 'academia' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'academia' ),
            'featured_image'        => __( 'Featured Image', 'academia' ),
            'set_featured_image'    => __( 'Set featured image', 'academia' ),
            'remove_featured_image' => __( 'Remove featured image', 'academia' ),
            'use_featured_image'    => __( 'Use as featured image', 'academia' ),
            'insert_into_item'      => __( 'Insert into course', 'academia' ),
            'uploaded_to_this_item' => __( 'Uploaded to this course', 'academia' ),
            'items_list'            => __( 'Notices list', 'academia' ),
            'items_list_navigation' => __( 'Notices list navigation', 'academia' ),
            'filter_items_list'     => __( 'Filter courses list', 'academia' ),
        );
        $args = array(
            'label'                 => __( 'Notice', 'academia' ),
            'description'           => __( 'Add and manage Notice information', 'academia' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-megaphoneß',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite'               => array( 'slug' => 'notice' ),
        );

        register_post_type( $this->post_type, $args );
    }

    /**
     *
     * Register Taxonomy
     *
     */

    public function register_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'academia' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'academia' ),
            'menu_name'                  => __( 'Categories', 'academia' ),
            'all_items'                  => __( 'All Items', 'academia' ),
            'parent_item'                => __( 'Parent Item', 'academia' ),
            'parent_item_colon'          => __( 'Parent Item:', 'academia' ),
            'new_item_name'              => __( 'New Item Name', 'academia' ),
            'add_new_item'               => __( 'Add New', 'academia' ),
            'edit_item'                  => __( 'Edit', 'academia' ),
            'update_item'                => __( 'Update', 'academia' ),
            'separate_items_with_commas' => __( 'Separate with commas', 'academia' ),
            'search_items'               => __( 'Search', 'academia' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'academia' ),
            'choose_from_most_used'      => __( 'Choose from the most used items', 'academia' ),
            'not_found'                  => __( 'Not Found', 'academia' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array( 'slug' => 'notice-category' ),
        );

        register_taxonomy( $this->taxonomy, $this->post_type, $args );
    }


}
