<?php

/**
 *
 * Course CPT Metabox
 *
 */


function academia_course_metabox( $options ){


    $options[]    = array(
        'id'        => '_tx_course_meta',
        'title'     => __('Course Header', 'academia'),
        'post_type' => 'academia_course',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(

            array(
                'name'   => '_tx_course_header',
                'title' => __('Course Header Options', 'academia'),
                'icon'  => 'fa fa-icon-bookmark-empty',
                'fields' => array(

                    array(
                        'id'           => '_tx_custom_course_title',
                        'type'         => 'switcher',
                        'title'        => __('Custom Title', 'academia'),
                        'desc'         => __('Enable custom title.', 'academia'),
                    ),

                    array(
                        'id'            => '_tx_course_header_title',
                        'type'          => 'text',
                        'title'         => __('Header Title', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Custom Title', 'academia'),
                            'style'    => 'width: 100%;',
                        ),
                        'dependency'   => array( '_tx_custom_course_title', '==', 'true' )

                    ),


                    array(
                        'id'            => '_tx_course_header_subtitle',
                        'type'          => 'text',
                        'title'         => __('Header Subtitle', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Subtitle Text Under Main Title', 'academia'),
                            'style'    => 'width: 100%;',
                        ),

                    ),


                    array(
                        'id'            => '_tx_course_header_image',
                        'type'          => 'image',
                        'title'         => __('Header Image', 'academia'),
                        'desc'       => __( 'Add Header Image', 'academia' ),
                    ),

                ),
            ),

        ),
    );

    return $options;

}


add_filter( 'cs_metabox_options',  'academia_course_metabox');



