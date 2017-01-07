<?php

function general_framework_options( $options ) {

    $options      = array(); // remove old options

    $options[]    = array(
        'name'      => 'tx_general',
        'title'     => esc_html__('General Settings', 'academia'),
        'icon'      => 'fa fa-cogs',
        'fields'    => array(
            

            /**
             * Default Color
             */

            array(
                'id'           => 'tx_theme_style',
                'type'         => 'select',
                'title'        => esc_html__('Default Theme Style', 'academia'),
                'options'   => array(
                    'blue'     => esc_html__('Blue', 'academia'),
                    'red'   => esc_html__('Red', 'academia'),
                    'green'   => esc_html__('Green', 'academia'),
                    'orange'   => esc_html__('Orange', 'academia'),
                    'lilac'   => esc_html__('Lilac', 'academia'),

                ),
                'default'      => 'blue'
            ),

            /**
             * Default Blog Style
             */

            array(
                'id'           => 'tx_blog_style',
                'type'         => 'select',
                'title'        => esc_html__('Default Blog Style', 'academia'),
                'options'   => array(
                    'list'     => esc_html__('List', 'academia'),
                    'grid'   => esc_html__('Grid', 'academia'),

                ),
                'default'      => 'list'
            ),

            /**
             * Preloader options
             */

            array(
                'id'           => 'tx_preloader_enable',
                'type'         => 'switcher',
                'title'        => esc_html__('Enable Preloader?', 'academia'),
                'default'      => true
            ),

            array(
                'id'      => 'tx_preloader_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Preloader Background Color', 'academia'),
                'default' => '#fff',
                'dependency'   => array( 'tx_preloader_enable', '==', 'true' )
            ),

            array(
                'id'            => 'tx_preloader_img',
                'type'          => 'upload',
                'title'         => esc_html__('Preloader Gif Image', 'academia'),
                'settings'      => array(
                    'upload_type'  => 'image',
                    'button_title' => 'Upload',
                    'frame_title'  => esc_html__('Select an image', 'academia'),
                    'insert_title' => esc_html__('Use this image', 'academia'),
                ),
                'dependency'   => array( 'tx_preloader_enable', '==', 'true' )
            ),

            /**
             * Enable Breadcrumb
             */

            array(
                'id'           => 'tx_breadcrumb',
                'type'         => 'switcher',
                'title'        => esc_html__('Enable Breadcrumb?', 'academia'),
                'default'      => true
            ),



            /**
             * ThemeXpert Credit
             */

            array(
                'id'           => 'tx_themexpert_credit',
                'type'         => 'switcher',
                'title'        => esc_html__('ThemeXpert Credit', 'academia'),
                'default'      => true
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'general_framework_options' );