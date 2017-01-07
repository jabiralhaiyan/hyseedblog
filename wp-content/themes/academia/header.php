<?php

/**
 * Getting Option values for Header
 */

$header_variation = cs_get_option('tx_header_select'); //returns text (string)



    switch ( $header_variation ) {

        case 'header-1':
            get_template_part( 'template-parts/header/header', 'one' );
            break;

        case 'header-2':
            get_template_part( 'template-parts/header/header', 'two' );
            break;

        case 'header-3':
            get_template_part( 'template-parts/header/header', 'three' );
            break;


        default:
            get_template_part( 'template-parts/header/header', 'one' );
    }




