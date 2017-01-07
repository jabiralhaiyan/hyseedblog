<?php

function footer_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_footer',
        'title'     => esc_html__('Footer Options', 'academia'),
        'icon'      => 'fa fa-anchor',
        'fields'    => array(

            /**
             * Enable Footer Top Area
             */

            array(
                'id'           => 'tx_enable_footer',
                'type'         => 'switcher',
                'title'        => esc_html__('Enable Footer Top Area?', 'academia'),
                'default'      => true
            ),

            /**
             * Footer Column Select
             */

            array(
                'id'        => 'tx_footer_column',
                'type'      => 'image_select',
                'title'     => esc_html__('Footer Column', 'academia'),
                'desc'      => esc_html__('Select footer column number.', 'academia'),
                'options'   => array(
                    'col_1'   => get_template_directory_uri() . '/inc/options/images/1col.jpg',
                    'col_2_1' => get_template_directory_uri() . '/inc/options/images/2cols-3.jpg',
                    'col_2_2' => get_template_directory_uri() . '/inc/options/images/2cols.jpg',
                    'col_2_3' => get_template_directory_uri() . '/inc/options/images/2cols-2.jpg',
                    'col_3_1' => get_template_directory_uri() . '/inc/options/images/3cols.jpg',
                    'col_3_3' => get_template_directory_uri() . '/inc/options/images/3cols-3.jpg',
                    'col_3_2' => get_template_directory_uri() . '/inc/options/images/3cols-2.jpg',
                    'col_4'   => get_template_directory_uri() . '/inc/options/images/4cols.jpg',
                ),
                'default'   => 'col_3_2',

            ),

            /**
             * Custom Footer Background Color
             */

            array(
                'id'           => 'tx_footer_custom_color',
                'type'         => 'switcher',
                'title'        => esc_html__('Footer Background Color', 'academia'),
                'desc'         => esc_html__('Enable Custom Footer Background Color?', 'academia'),
                'default'      => false,
            ),

            array(
                'id'    => 'tx_footer_primary_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Footer Background Color', 'academia'),
                'desc'  => esc_html__('Background Color for Footer Area of Header.', 'academia'),
                'dependency'   => array( 'tx_footer_custom_color', '==', 'true' ),
            ),

            array(
                'id'    => 'tx_footer_bottom_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Footer Bottom Background Color', 'academia'),
                'desc'  => esc_html__('Background Color for Footer Bottom Area of Header.', 'academia'),
                'dependency'   => array( 'tx_footer_custom_color', '==', 'true' ),
            ),

            /**
             * Copyright Text
             */

            array(
                'id'    => 'tx_footer_copy',
                'type'  => 'textarea',
                'title' => esc_html__('Copyright Text', 'academia'),
                'desc'  => esc_html__('Write footer copyright text here.', 'academia'),
            ),

        ),

    );

    // ------------------------------
    // Backup                       -
    // ------------------------------
    $options[]   = array(
        'name'     => 'backup_section',
        'title'    => esc_html__('Backup', 'academia'),
        'icon'     => 'fa fa-shield',
        'fields'   => array(

            array(
                'type'    => 'notice',
                'class'   => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'academia'),
            ),

            array(
                'type'    => 'backup',
            ),

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'footer_framework_options' );