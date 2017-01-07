<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog-list" >
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
								<a class="search-title " href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if ( 'post' === get_post_type() ) : ?>
								<div class="entry-meta">
									<?php tx_academia_blog_meta(); ?>
								</div><!-- .entry-meta -->
								<?php
							endif; ?>
							<div class="search-introtext">
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
</article><!-- #post-## -->
