<?php

function cstyle_framework_options( $options ) {

    $options[]    = array(
        'name'      => 'tx_cstyle',
        'title'     => esc_html__('Custom Style', 'academia'),
        'icon'      => 'fa fa-eyedropper',
        'fields'    => array(

            /**
             * Custom Style
             */

            array(
                'id'           => 'tx_custom_style',
                'type'         => 'switcher',
                'title'        => __('Custom Style', 'academia'),
                'desc'         => __('Enable custom style.', 'academia'),
            ),

            /**
             * Header Primary Color
             */

            array(
                'id'      => 'tx_header_p_color',
                'type'    => 'color_picker',
                'title'   => __('Header Primary Color', 'academia'),
                'default' => '#fff',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Header Link Color
             */

            array(
                'id'        => 'tx_header_top_link_color',
                'type'      => 'fieldset',
                'title'     => __('Header Top Link Color', 'academia'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_header_link_reg',
                        'type'  => 'color_picker',
                        'title' => __('Regular', 'academia'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_header_link_hover',
                        'type'  => 'color_picker',
                        'title' => __('Hover', 'academia'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_header_link_active',
                        'type'  => 'color_picker',
                        'title' => __('Active', 'academia'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Main Menu Regular, Hover and Active Color
             */

            array(
                'id'        => 'tx_main_menu_color',
                'type'      => 'fieldset',
                'title'     => __('Menu Color', 'academia'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_main_menu_reg',
                        'type'  => 'color_picker',
                        'title' => __('Regular', 'academia'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_main_menu_hover',
                        'type'  => 'color_picker',
                        'title' => __('Hover', 'academia'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_main_menu_active',
                        'type'  => 'color_picker',
                        'title' => __('Active', 'academia'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Body Primary Color
             */

            array(
                'id'      => 'tx_body_p_color',
                'type'    => 'color_picker',
                'title'   => __('Body Primary Color', 'tx_arsim'),
                'default' => '#dd3333',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),


            /**
             * Body Link Color
             */

            array(
                'id'        => 'tx_body_link_color',
                'type'      => 'fieldset',
                'title'     => __('Body Link Color', 'tx_arsim'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_body_link_reg',
                        'type'  => 'color_picker',
                        'title' => __('Regular', 'tx_arsim'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_body_link_hover',
                        'type'  => 'color_picker',
                        'title' => __('Hover', 'tx_arsim'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_body_link_active',
                        'type'  => 'color_picker',
                        'title' => __('Active', 'tx_arsim'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Footer Primary Color
             */

            array(
                'id'      => 'tx_footer_p_color',
                'type'    => 'color_picker',
                'title'   => __('Footer Primary Color', 'tx_arsim'),
                'default' => '#dd3333',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),


            /**
             * Footer Link Color
             */

            array(
                'id'        => 'tx_footer_link_color',
                'type'      => 'fieldset',
                'title'     => __('Footer Link Color', 'tx_arsim'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_footer_link_reg',
                        'type'  => 'color_picker',
                        'title' => __('Regular', 'tx_arsim'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_footer_link_hover',
                        'type'  => 'color_picker',
                        'title' => __('Hover', 'tx_arsim'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_footer_link_active',
                        'type'  => 'color_picker',
                        'title' => __('Active', 'tx_arsim'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * CSS Editor
             */

            array(
                'id'           => 'tx_css_editor',
                'type'         => 'css_editor',
                'title'        => esc_html__('Custom CSS', 'academia')
            ),

            /**
             * JS Editor
             */

            array(
                'id'           => 'tx_js_editor',
                'type'         => 'js_editor',
                'title'        => esc_html__('Custom JS', 'academia')
            ),

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'cstyle_framework_options' );