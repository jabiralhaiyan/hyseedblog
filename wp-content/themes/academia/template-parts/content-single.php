<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog-list">

    <div <?php post_class(); ?>>



        <div class="blog-content-wrapper">

            <header class="blog-header">
                <?php

                the_title( '<h2 class="blog-title">', '</h2>' );

                if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php tx_academia_blog_meta(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                endif; ?>
            </header><!-- .entry-header -->

            <?php if( has_post_thumbnail() ): ?>

            <div class="feature-img-wrap">
                <?php

                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );

                ?>
                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
            </div>

            <?php endif; ?>

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
    </div>

</article><!-- #post-## -->
