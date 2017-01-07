<?php




function header_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_header',
        'title'     => esc_html__('Header Settings', 'academia'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(

            /**
             * Header Variation Select
             */

            array(
                'id'           => 'tx_header_select',
                'type'         => 'image_select',
                'title'        => esc_html__('Select Header Variation', 'academia'),
                'options'      => array(
                    'header-1'    => get_template_directory_uri() . '/inc/options/images/header-var-1.jpg',
                    'header-2'    => get_template_directory_uri() . '/inc/options/images/header-var-2.jpg',
                    'header-3'    => get_template_directory_uri() . '/inc/options/images/header-var-3.jpg',

                ),
                'default'      => 'header-1',
            ),



            array(
                'id'    => 'tx_logo_1',
                'type'  => 'image',
                'title' => esc_html__('Header 1 Logo', 'academia'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'academia'),
                'dependency'   => array( 'tx_header_select_header-1', '==', 'true' ),
            ),

            array(
                'id'    => 'tx_sticky_logo_1',
                'type'  => 'image',
                'title' => esc_html__('Header 1 Sticky Logo', 'academia'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'academia'),
                'dependency'   => array( 'tx_header_select_header-1', '==', 'true' ),
            ),


            array(
                'id'    => 'tx_logo_2',
                'type'  => 'image',
                'title' => esc_html__('Header 2 Logo', 'academia'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'academia'),
                'dependency'   => array( 'tx_header_select_header-2', '==', 'true' ),
            ),



            array(
                'id'    => 'tx_logo_3',
                'type'  => 'image',
                'title' => esc_html__('Header 3 Logo', 'academia'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'academia'),
                'dependency'   => array( 'tx_header_select_header-3', '==', 'true' ),
            ),

            array(
                'id'    => 'tx_sticky_logo_3',
                'type'  => 'image',
                'title' => esc_html__('Header 3 Sticky Logo', 'academia'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'academia'),
                'dependency'   => array( 'tx_header_select_header-3', '==', 'true' ),
            ),

            /**
             * Custom Header Background Color
             */

            array(
                'id'           => 'tx_header_custom_color',
                'type'         => 'switcher',
                'title'        => esc_html__('Header Background Color', 'academia'),
                'desc'         => esc_html__('Enable Custom Header Background Color?', 'academia'),
                'default'      => false,
            ),

            array(
                'id'    => 'tx_header_top_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Header Top Background Color', 'academia'),
                'desc'  => esc_html__('Background Color for Header Top Area of Header.', 'academia'),
                'dependency'   => array( 'tx_header_custom_color', '==', 'true' ),
            ),

            array(
                'id'    => 'tx_header_nav_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Header Navigation Background Color', 'academia'),
                'desc'  => esc_html__('Background Color for Header Navigation Area of Header.', 'academia'),
                'dependency'   => array( 'tx_header_custom_color', '==', 'true' ),
            ),


            /**
             * Sticky Header
             */

            array(
                'id'           => 'tx_header_sticky',
                'type'         => 'switcher',
                'title'        => esc_html__('Sticky Header', 'academia'),
                'desc'         => esc_html__('Enable Sticky Header?', 'academia'),
                'default'      => true
            ),


            // ------------------------------------

            /**
             * Social Icon Link
             */

            array(
                'id'           => 'tx_social_icons',
                'type'         => 'switcher',
                'title'        => esc_html__('Social Icons', 'academia'),
                'desc'         => esc_html__('Enable social icons.', 'academia'),
            ),

            array(
                'id'        => 'tx_top_social',
                'type'      => 'fieldset',
                'title'     => esc_html__('Social Link', 'academia'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_top_social_fb',
                        'type'  => 'text',
                        'title' => esc_html__('Facebook', 'academia'),
                        'desc'  => esc_html__('Enter your facebook link.', 'academia'),
                    ),

                    array(
                        'id'    => 'tx_top_social_tw',
                        'type'  => 'text',
                        'title' => esc_html__('Twitter', 'academia'),
                        'desc'  => esc_html__('Enter your twitter link.', 'academia')
                    ),
                    array(
                        'id'    => 'tx_top_social_yt',
                        'type'  => 'text',
                        'title' => esc_html__('Youtube', 'academia'),
                        'desc'  => esc_html__('Enter your youtube link.', 'academia')
                    ),
                    array(
                        'id'    => 'tx_top_social_ln',
                        'type'  => 'text',
                        'title' => esc_html__('LinkedIn', 'academia'),
                        'desc'  => esc_html__('Enter your linkedin link.', 'academia')
                    ),


                ),
                'dependency'   => array( 'tx_social_icons', '==', 'true' ),
            ),
            // ------------------------------------

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'header_framework_options' );