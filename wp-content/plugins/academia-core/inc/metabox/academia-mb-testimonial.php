<?php

/**
 *
 * Slider CPT Metabox
 *
 */


function academia_testimonial_metabox( $options ){


    $options[]    = array(
        'id'        => '_tx_testimonial_meta',
        'title'     => __('Testimonial Details', 'academia'),
        'post_type' => 'academia_testimonial',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(

            array(
                'name'   => '_tx_testimonial_details',
                'title' => __('Testimonial Options', 'academia'),
                'icon'  => 'fa fa-icon-bookmark-empty',
                'fields' => array(


                    array(
                        'id'            => '_tx_testimonial_details_name',
                        'type'          => 'text',
                        'title'         => __('Name', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Client\'s Name', 'academia'),
                            'style'    => 'width: 100%;',
                        ),

                    ),

                    array(
                        'id'            => '_tx_testimonial_details_position',
                        'type'          => 'text',
                        'title'         => __('Position', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Client\'s Position', 'academia'),

                        ),
                    ),

                    array(
                        'id'            => '_tx_testimonial_details_testimonial',
                        'type'          => 'textarea',
                        'title'         => __('Testimonial', 'academia'),

                    ),

                ),
            ),

        ),
    );

    return $options;

}


add_filter( 'cs_metabox_options',  'academia_testimonial_metabox');



