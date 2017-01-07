<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

$blog_style = 'list';

$blog_style = cs_get_option('tx_blog_style');

$post_id = tx_academia_get_post_id();
$notice_category = get_the_terms( $post_id, 'academia_notice_category' );
$notice_category_list = '';
$counter = 0;

if(!empty($notice_category)) {
    foreach( $notice_category as $category ):
        $counter++;
        $notice_category_list .= $counter > 1 ? ', ': '';
        $notice_category_list .= '<a href="'. esc_attr(get_term_link($category->term_id, $category->taxonomy)) . '"><span>' . esc_html($category->name) .'</span></a>';

    endforeach;
}

?>



<article id="post-<?php the_ID(); ?>" class="blog-list notice-archive-list" >

    <?php if($blog_style == 'list'): ?>

    <div class="shadow-box">
        <div <?php post_class(); ?>>
            <div class="row">
                <?php if( has_post_thumbnail() ): ?>
                <div class="col-lg-6 col-md-12">
                    <figure>
                        <a href="<?php the_permalink(); ?>">
                            <div class="display-block">
                                <?php
                                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">


                            </div>
                        </a>
                    </figure>
                </div>

                <div class="col-lg-6 col-md-12">

                    <?php else: ?>

                    <div class="col-md-12">

                        <?php endif; ?>

                        <div class="media-body">
                            <h3 class="media-heading">
                                <a class="blog-title " href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <?php echo '<i class="fa fa-folder-open"></i> <span class="cat-links" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Category', 'academia' ).'">' . $notice_category_list . ' </span>'; ?>
                                </div><!-- .entry-meta -->
                            <div class="blog-introtext">
                                <?php the_excerpt(); ?>
                            </div>
                            <section class="readmore">
                                <a class="btn-bordered" href="<?php echo esc_url( get_permalink() ); ?>">
                                    <span><?php esc_html_e('Continue Reading', 'academia'); ?></span>
                                </a>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($blog_style == 'grid'): ?>


            <div class="col-md-6 col-sm-6 col-xs-12 course-item-grid">
                <div class="shadow-box">
                    <div <?php post_class(); ?>>
                        <figure>
                            <a href="<?php the_permalink(); ?>">
                                <div class="display-block">
                                    <?php
                                    if( has_post_thumbnail() ):
                                        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                        <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">

                                    <?php endif; ?>
                                </div>

                            </a>
                        </figure>
                        <div class="media-body">
                            <h3 class="media-heading"><a class="blog-title " href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <?php echo '<i class="fa fa-folder-open"></i> <span class="cat-links" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Category', 'academia' ).'">' . $notice_category_list . ' </span>'; ?>
                                </div><!-- .entry-meta -->
                            <div class="blog-introtext"> <?php the_excerpt(); ?> </div>
                            <section class="readmore">
                                <a class="btn-bordered" href="<?php echo esc_url( get_permalink() ); ?>">
                                    <span><?php esc_html_e('Continue Reading', 'academia'); ?></span>
                                </a>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

</article><!-- #post-## -->




<?php	wp_link_pages( array(
    'before' => '<div class="page-links clearfix">' . esc_html__( 'Pages:', 'academia' ),
    'after'  => '</div>',
) );
?>
