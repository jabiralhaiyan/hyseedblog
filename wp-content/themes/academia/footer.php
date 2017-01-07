<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package academia
 */

/**
 * Getting Option values for Footer
 */

?>

</div>

</div><!-- #primary -->

<?php

$footer_option = cs_get_option( 'tx_footer_column' );

switch ( $footer_option ) {
    case 'col_1':
        get_template_part( 'template-parts/footer/footer', 'col_1' );
        break;

    case 'col_2_1':
        get_template_part( 'template-parts/footer/footer', 'cols_2_1' );
        break;

    case 'col_2_2':
        get_template_part( 'template-parts/footer/footer', 'cols_2_2' );
        break;

    case 'col_2_3':
        get_template_part( 'template-parts/footer/footer', 'cols_2_3' );
        break;

    case 'col_3_1':
        get_template_part( 'template-parts/footer/footer', 'cols_3_1' );
        break;

    case 'col_3_3':
        get_template_part( 'template-parts/footer/footer', 'cols_3_3' );
        break;

    case 'col_3_2':
        get_template_part( 'template-parts/footer/footer', 'cols_3_2' );
        break;

    case 'col_4':
        get_template_part( 'template-parts/footer/footer', 'cols_4' );
        break;

    default:
        get_template_part( 'template-parts/footer/footer', 'cols_3_2' );
}
