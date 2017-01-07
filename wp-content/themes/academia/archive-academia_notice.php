<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

get_header(); ?>

    <div id="primary" class="container content-area">
    <div class="row">
        <main id="main" class="site-main col-lg-9 col-md-8 col-sm-12 col-xs-12">

            <?php
            if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"> <?php esc_html_e( 'Notice Board', 'academia' ); ?> </h1>

                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content','notice' );

                endwhile;

                tx_academia_pagination();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </main><!-- #main -->
<!--    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
