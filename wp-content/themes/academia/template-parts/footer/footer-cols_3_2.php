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

$tx_credit = cs_get_option('tx_themexpert_credit'); //returns boolean value (true)
$footer_top = cs_get_option('tx_enable_footer'); //returns boolean value (true)
$copyright_text = cs_get_option('tx_footer_copy'); //returns text (string)
$breadcrumb = cs_get_option( 'tx_breadcrumb' );

?>

</div><!-- #content -->

<?php if( $breadcrumb && !is_front_page() ): ?>
    <div class="breadcrumb">
        <div class="container">
            <?php tx_academia_breadcrumbs(); ?>
        </div>
    </div>
<?php endif; ?>

<footer id="colophon" class="site-footer" role="contentinfo">

    <?php if( $footer_top ): ?>

        <div class="footer-top">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?php if(is_active_sidebar('footer-top-1')){
                            dynamic_sidebar('footer-top-1');
                        } ?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?php if(is_active_sidebar('footer-top-2')){
                            dynamic_sidebar('footer-top-2');
                        } ?>
                    </div>


                </div>
            </div>

        </div>

    <?php endif; ?>

    <div class="footer-main">
        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <?php if(is_active_sidebar('footer-1')){
                        dynamic_sidebar('footer-1');
                    } ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if(is_active_sidebar('footer-2')){
                        dynamic_sidebar('footer-2');
                    } ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if(is_active_sidebar('footer-3')){
                        dynamic_sidebar('footer-3');
                    } ?>
                </div>


            </div>

        </div>
    </div>

    <?php if($tx_credit): ?>

        <div class="site-info">


            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 copyright">
                        <?php

                        if(isset($copyright_text)){
                            echo wp_kses($copyright_text, array(
                            'a'	=> array(
                                'href' => array(),
                                'title' => array(),
                                'target' => array()
                            )
                        ));
                        } else {
                            printf( esc_html( '&copy; 2016' ));
                        }

                        ?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tx-credit">

                        <?php echo esc_html__( 'Designed & Developed by ', 'academia' ); ?><a href="<?php echo esc_url( __( 'http://facebook.com/jabiralhayyan/', 'academia' ) ); ?>"><?php printf( esc_html__( '%s', 'academia' ), 'Jabir Al Hayyan' ); ?></a>

                    </div>


                </div>
            </div>




        </div><!-- .site-info -->
    <?php else: ?>

        <div class="site-info">


            <div class="container copyright">

                <?php

                if(isset($copyright_text)){
                    echo wp_kses($copyright_text, array(
                            'a'	=> array(
                                'href' => array(),
                                'title' => array(),
                                'target' => array()
                            )
                        ));
                } else {
                    printf( esc_html( '&copy; 2016' ));
                }

                ?>

            </div>




        </div><!-- .site-info -->
    <?php endif; ?>

</footer><!-- #colophon -->
</div><!-- #page -->

</div>  <!-- tx-site-content-inner -->
</div>  <!-- tx-site-content -->
</div>  <!-- tx-site-pusher -->
</div>  <!-- tx-site-container -->

<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs affix">
    <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
</div>

<?php wp_footer(); ?>

</body>
</html>
