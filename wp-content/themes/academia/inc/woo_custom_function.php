<?php


/**
 *
 * Declare WooCommerce support....
 *
 */


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'tx_academia_publication_content_start', 10 );
add_action( 'woocommerce_after_main_content', 'tx_academia_publication_content_end', 10 );


function tx_academia_publication_content_start(){
    echo '<section id="academia-woocommerce">';
}


function tx_academia_publication_content_end(){
    echo '</section>';
}


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
