<?php

function sidebar_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_sidebar',
        'title'     => esc_html__('Sidebar', 'academia'),
        'icon'      => 'fa fa-hand-scissors-o',
        'fields'    => array(

            /**
             * Sidebar Position
             */

            array(
                'id'        => 'tx_sidebar_position',
                'type'      => 'select',
                'title'     => esc_html__('Default Sidebar Position', 'academia'),
                'options'   => array(
                    'left'   => 'Left',
                    'right'   => 'Right',
                ),
                'default'   => 'right',
                'desc'      => esc_html__('Select default sidebar position.', 'academia'),
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'sidebar_framework_options' );