<?php



/**
 *
 * Changing 'Add to Cart' button text to 'Buy Now'
 *
 */


//add_filter( 'woocommerce_product_single_add_to_cart_text', 'academia_buynow_button_text' );

function academia_buynow_button_text(){
    return __( 'Buy Now', 'academia' );

}


add_filter( 'woocommerce_product_add_to_cart_text' , 'academia_publication_add_to_cart_text' );



function academia_publication_add_to_cart_text() {
    global $product;

    $product_type = $product->product_type;

    switch ( $product_type ) {
        case 'external':
            return __( 'Buy Publication', 'academia' );
            break;
        case 'grouped':
            return __( 'View Publications', 'academia' );
            break;
        case 'simple':
            return __( 'Buy Now', 'academia' );
            break;
        case 'variable':
            return __( 'Select options', 'academia' );
            break;
        default:
            return __( 'Read more', 'academia' );
    }

}


/**
 *
 * Remove Rating and Tabs and SKU
 *
 */

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

function publication_description(){

    the_content();
}

add_action( 'woocommerce_single_product_summary', 'publication_description', 20 );

function after_publication_title(){

    global $post;
    global $product;

    $author_name = get_post_meta( $post->ID, '_tx_pubication_author', true );
    $category = $product->get_categories();


    if( !empty($author_name) ){
        echo '<p><span class="publicaton-author-name">' . esc_html__('by', 'academia') . ' ' . esc_html($author_name['_tx_author_name_text']) .'</span></p>';
    }

}

function after_publication_title_single(){

    global $post;
    global $product;

    $author_name = get_post_meta( $post->ID, '_tx_pubication_author', true );
    $category = $product->get_categories();


    if( !empty($author_name) ){
        echo '<p><span class="publicaton-author-name">'. esc_html__('by', 'academia') . ' ' . esc_html($author_name['_tx_author_name_text']) .'</span>, ' . $category . '</p>';
    }

}



add_action( 'woocommerce_after_shop_loop_item_title', 'after_publication_title', 5 );

add_action( 'woocommerce_single_product_summary', 'after_publication_title_single', 10 );


add_filter( 'wc_product_sku_enabled', '__return_false' );

function academia_remove_extra_woocommerce(){
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
//  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

}

add_action( 'init', 'academia_remove_extra_woocommerce' );

/**
 *
 * Thumbnail Image
 *
 */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    }
}
/**
 * WooCommerce Product Thumbnail
 **/
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;


        $output = '<div class="atvImg">';
        if ( has_post_thumbnail() ) {


            $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );

            //$output = '<img src="'. $feat_image_url .'" />';

            $output .= '<div class="atvImg-layer" data-img="' . esc_url($feat_image_url) . '"></div>';

        } else {

            $output .= '<img src="'. esc_url(woocommerce_placeholder_img_src()) .'" alt="Placeholder" width="' . esc_attr($placeholder_width) . '" height="' . esc_attr($placeholder_height) . '" />';

        }

        $output .= '</div>';

        return $output;
    }
}


