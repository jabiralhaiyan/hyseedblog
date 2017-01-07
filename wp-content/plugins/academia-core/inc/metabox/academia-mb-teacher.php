<?php

/**
 *
 * Teacher CPT Metabox
 *
 */


function academia_teacher_metabox( $options ){


    $options[]    = array(
        'id'        => '_tx_teacher_meta',
        'title'     => __('Social Links', 'academia'),
        'post_type' => 'academia_teacher',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(

            array(
                'name'   => '_tx_teacher_social',
                'title' => __('Add Teacher\'s Meta', 'academia'),
                'icon'  => 'fa fa-share-alt',
                'fields' => array(

                    array(
                        'id'            => '_tx_teacher_designation',
                        'type'          => 'text',
                        'title'         => 'Designation',
                        'attributes'    => array(
                            'placeholder' => 'Teacher\'s Designation',
                        )
                    ),

                    array(
                        'id'            => '_tx_teacher_social_fb',
                        'type'          => 'text',
                        'title'         => 'Facebook',
                        'attributes'    => array(
                            'placeholder' => 'Teacher\'s Facebook Link',
                        )
                    ),

                    array(
                        'id'            => '_tx_teacher_social_tw',
                        'type'          => 'text',
                        'title'         => 'Twitter',
                        'attributes'    => array(
                            'placeholder' => 'Teacher\'s Twitter Link',
                        )
                    ),

                    array(
                        'id'            => '_tx_teacher_social_ln',
                        'type'          => 'text',
                        'title'         => 'LinkedIn',
                        'attributes'    => array(
                            'placeholder' => 'Teacher\'s LinkedIn Link',
                        )
                    ),

                    array(
                        'id'            => '_tx_teacher_social_gplus',
                        'type'          => 'text',
                        'title'         => 'Google Plus',
                        'attributes'    => array(
                            'placeholder' => 'Teacher\'s Google Plus Link',
                        )
                    ),





                ),
            ),

        ),
    );

    return $options;

}


add_filter( 'cs_metabox_options',  'academia_teacher_metabox');



