<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package academia
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<div class="page-content">
					<div class="text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/404.png" alt="<?php echo esc_html__('404', 'academia');?>">
						<h1 class="page-title">
							<small><?php _e('Sorry! The page you are looking for', 'academia') ?></small><br>
							<?php _e( 'Not Found', 'academia' ); ?>
						</h1>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
