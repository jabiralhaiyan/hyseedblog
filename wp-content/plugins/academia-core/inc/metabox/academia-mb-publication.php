<?php

/**
 *
 * Publication Author Metabox
 *
 */


function academia_publication_author_metabox( $options ){

    $options = array();

    $options[]    = array(
        'id'        => '_tx_pubication_author',
        'title'     => __('Publication Author', 'academia'),
        'post_type' => 'product',
        'context'   => 'side',
        'priority'  => 'default',
        'sections'  => array(

            array(
                'name'   => '_tx_author_name',
                'fields' => array(


                    array(
                        'id'            => '_tx_author_name_text',
                        'type'          => 'text',
                        'attributes'    => array(
                            'placeholder' => __('Publication Author Name', 'academia'),
                        )
                    ),



                ),
            ),

        ),
    );

    return $options;

}


add_filter( 'cs_metabox_options',  'academia_publication_author_metabox');



