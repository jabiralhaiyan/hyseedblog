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
    <main id="main" class="teacher-archive site-main">

        <?php
        if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"> <?php esc_html_e( 'Teachers', 'academia' ); ?> </h1>

            </header><!-- .page-header -->

        <div class="ac-teachers-team">
            <div class="ateam">
                <ul>

            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'teacher' );

            endwhile; ?>

            </ul>
                </div>
            </div>

        <?php    tx_academia_pagination();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

    </main><!-- #main -->
    <!--    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
