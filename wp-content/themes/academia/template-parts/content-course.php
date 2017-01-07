<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog-list" <?php post_class(); ?>>


    <div class="blog-content-wrapper">

        <section class="article-intro clearfix">
            <?php
            the_content( sprintf(
            /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'academia' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
            ?>

            <?php	wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'academia' ),
                'after'  => '</div>',
            ) );
            ?>
        </section><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
