<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package academia
 */

get_header(); ?>


	<div id="primary" class="container content-area">
	<div class="row">
		<main id="main" class="site-main col-lg-9 col-md-8 col-sm-12 col-xs-12">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->


<?php
get_sidebar();
get_footer();
