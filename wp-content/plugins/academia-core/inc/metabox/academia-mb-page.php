<?php

/**
 *
 * General Page Metabox
 *
 */


function academia_page_metabox( $options ){


    $options[]    = array(
        'id'        => '_tx_page_meta',
        'title'     => __('Page Header', 'academia'),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(

            array(
                'name'   => '_tx_page_header',
                'title' => __('Page Header Options', 'academia'),
                'icon'  => 'fa fa-icon-bookmark-empty',
                'fields' => array(

                    array(
                        'id'           => '_tx_custom_page_title',
                        'type'         => 'switcher',
                        'title'        => __('Custom Title', 'academia'),
                        'desc'         => __('Enable custom title.', 'academia'),
                    ),

                    array(
                        'id'            => '_tx_page_header_title',
                        'type'          => 'text',
                        'title'         => __('Header Title', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Custom Title', 'academia'),
                            'style'    => 'width: 100%;',
                        ),
                        'dependency'   => array( '_tx_custom_page_title', '==', 'true' )

                    ),


                    array(
                        'id'            => '_tx_page_header_subtitle',
                        'type'          => 'text',
                        'title'         => __('Header Subtitle', 'academia'),
                        'attributes'    => array(
                            'placeholder' => __('Subtitle Text Above Main Title', 'academia'),
                            'style'    => 'width: 100%;',
                        ),

                    ),



                    array(
                        'id'            => '_tx_page_header_image',
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


add_filter( 'cs_metabox_options',  'academia_page_metabox');



