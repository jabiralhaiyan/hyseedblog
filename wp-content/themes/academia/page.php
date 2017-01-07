<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

get_header( );

$post_id = tx_academia_get_post_id();

$page_header_meta = get_post_meta( $post_id, '_tx_page_meta', true);
$page_header_bg = array_get( $page_header_meta, '_tx_page_header_image' );
$page_custom_title = array_get( $page_header_meta, '_tx_custom_page_title' );
$page_header_title = array_get( $page_header_meta, '_tx_page_header_title' );
$page_header_sub = array_get( $page_header_meta, '_tx_page_header_subtitle' );
$page_bg_url = wp_get_attachment_image_src( $page_header_bg, 'full' );
?>



    <?php if( !is_front_page() ): ?>

	<div class="custom-header" style="background-image:url(<?php echo esc_url($page_bg_url[0]); ?>);">
		<div class="container">
			<h1 class="page-title">
				<small><?php echo esc_html($page_header_sub); ?></small>
				<?php
				if($page_custom_title) {
					echo $page_header_title;
				} else {
                    the_title();
                } ?>
			</h1>
		</div>
	</div>

    <?php endif; ?>



	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
