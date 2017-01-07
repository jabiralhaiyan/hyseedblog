<?php

function typo_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_typo',
        'title'     => esc_html__('Typography', 'academia'),
        'icon'      => 'fa fa-text-height',
        'fields'    => array(

            /**
             * Custom Typography Switcher
             */

            array(
                'id'           => 'tx_custom_typo_switch',
                'type'         => 'switcher',
                'title'        => esc_html__('Custom Typography', 'academia'),
                'desc'         => esc_html__('Enable custom typography option?', 'academia'),
                'default' => false
            ),

            /**
             * Header Font Select
             */

            array(
                'id'        => 'tx_header_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Header font and style.', 'academia'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular',
                ),

                'dependency'   => array( 'tx_custom_typo_switch', '==', 'true' ),
            ),

            /**
             * Body Font Select
             */

            array(
                'id'        => 'tx_body_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Body font and style.', 'academia'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular',
                ),
                'dependency'   => array( 'tx_custom_typo_switch', '==', 'true' ),
            ),

            /**
             * Footer Font Select
             */

            array(
                'id'        => 'tx_footer_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Footer font and style.', 'academia'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular',
                ),
                'dependency'   => array( 'tx_custom_typo_switch', '==', 'true' ),
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'typo_framework_options' );