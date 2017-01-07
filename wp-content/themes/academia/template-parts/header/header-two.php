<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package academia
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    


    <?php wp_head(); ?>
</head>


<?php

/**
 * Getting Option values for Header
 */


$logo = cs_get_option('tx_logo_2'); //returns wp image attachment id

$show_social = cs_get_option('tx_social_icons'); //returns boolean value (true)
$social_links = cs_get_option('tx_top_social'); //returns 2D Array
$social_fb = $social_links['tx_top_social_fb']; //returns Social Link (facebook)
$social_tw = $social_links['tx_top_social_tw']; //returns Social Link (twitter)
$social_yt = $social_links['tx_top_social_yt']; //returns Social Link (youtube)
$social_ln = $social_links['tx_top_social_ln']; //returns Social Link (linkedin)




?>

<body <?php body_class(); ?>>

<div id="tx-site-container" class="tx-site-container">

    <nav class="tx-menu tx-effect-1" id="menu-1">
        <button class="close-button" id="close-button">Close Menu</button>
        <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary'
        ));
        ?>
    </nav>

    <div class="tx-site-pusher">
        <div class="tx-site-content"><!-- this is the wrapper for the content -->
            <div class="tx-site-content-inner">

<div id="page" class="site home-v2">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'academia'); ?></a>

    <!-- ROOF 1 -->
    <section class="section-roof">
        <div class="container">
            <!-- SPOTLIGHT -->
            <div class="ac-spotlight ac-roof  row">
                <div class=" col-lg-6 col-md-7 col-sm-8 col-xs-12">
                    <div class="ac-header-top-contact pull-left">
                        <?php if(is_active_sidebar('header-info')){
                            dynamic_sidebar('header-info');
                        } ?>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-5 col-sm-4  col-xs-6 hidden-xs ">
                    <div class="mod-languages pull-right">
                        <?php if(is_active_sidebar('header-lang-switcher')){
                            dynamic_sidebar('header-lang-switcher');
                        } ?>
                    </div>
                    <?php if ($show_social): ?>
                        <div class="ac-social-links pull-right">
                            <p>
                                <?php if (!empty($social_fb)): ?>
                                    <a class="icon-set" href="<?php echo esc_url($social_fb); ?>" target="_blank"><i
                                            class="fa fa-facebook"></i></a>
                                <?php endif; ?>

                                <?php if (!empty($social_tw)): ?>
                                    <a class="icon-set" href="<?php echo esc_url($social_tw); ?>" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                                <?php endif; ?>

                                <?php if (!empty($social_ln)): ?>
                                    <a class="icon-set" href="<?php echo esc_url($social_ln); ?>" target="_blank"><i
                                            class="fa fa-linkedin"></i></a>
                                <?php endif; ?>

                                <?php if (!empty($social_yt)): ?>
                                    <a class="icon-set" href="<?php echo esc_url($social_yt); ?>" target="_blank"><i
                                            class="fa fa-youtube"></i></a>
                                <?php endif; ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- SPOTLIGHT -->
        </div>
    </section>
    <!-- //ROOF 1 -->

    <!-- HEADER -->
    <header id="ac-header" class="ac-header">
        <!-- MAIN NAVIGATION -->
        <nav id="ac-mainnav" class="wrap navbar navbar-default navbar-v2 ac-mainnav">
            <div class="container" data-hover="dropdown" data-animations="fadeInUp none none none">
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-xs-8 col-sm-3 logo">
                        <div class="logo-image">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="Academia">
                            <?php

                            /**
                             * Output Site Logo
                             */

                            if (isset($logo)) {
                                echo wp_get_attachment_image($logo, 'full');
                            } else {
                                echo '<img src="'. apply_filters("academia_default_logo", get_template_directory_uri().'/dist/images/logo/logo-blue.png').'" alt="'.esc_attr__('Logo', 'academia').'">';
                            }
                            ?>
                            <span><?php bloginfo('name'); ?></span>
                            </a>
                            <?php $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <small class="site-slogan"><?php echo $description; /* WPCS: xss ok. */ ?></small>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                    <!-- //LOGO -->

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="col-xs-4 col-sm-9 header-info">
                        <div class="navbar-header pull-right">
                            <div id="tx-trigger-effects" class="pull-left">
                                <button data-effect="tx-effect-1"><i class="fa fa-bars"></i></button>
                            </div>

                            <div class="head-search hidden-xs">
                                <a id="head-search-trigger" href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                                <div class="search">
                                    <?php get_search_form( ); ?>
                                </div>
                            </div>
                            <?php  if ( class_exists( 'WooCommerce' ) ): ?>
                                <div class="academia-cart-container hidden-xs">
                                    <i class="fa fa-shopping-bag"></i>
                                    <?php get_template_part( 'template-parts/academia', 'cart' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>



                            <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 0,
                                'container'         => 'div',
                                'container_class'   => 'ac-navbar navbar-collapse collapse',
                                'container_id'      => 'academia-main-nav',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'tx_megamenu_navwalker::fallback',
                                'walker'            => new tx_megamenu_navwalker()
                            ));
                            ?>


                    </div>
                    <!--// end col-->
                </div>
                <!--// end row-->
            </div>
            <!--// end container-->
        </nav>
        <!-- //MAIN NAVIGATION -->



    </header>
    <!-- //HEADER -->


    <!-- //MAIN NAVIGATION -->



    <div id="content" class="site-content">