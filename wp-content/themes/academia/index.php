<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package academia
 */

get_header();


$post_id = tx_academia_get_post_id();

$page_header_meta = get_post_meta( $post_id, '_tx_page_meta', true);
$page_header_bg = array_get( $page_header_meta, '_tx_page_header_image' );
$page_header_sub = array_get( $page_header_meta, '_tx_page_header_subtitle' );
$page_bg_url = wp_get_attachment_image_src( $page_header_bg, 'full' );

$sidebar_position = 'right';
$sidebar_position = cs_get_option('tx_sidebar_position');

?>

    <div class="custom-header" style="background-image:url(<?php echo $page_bg_url[0]; ?>);">
        <div class="container">
            <h1 class="page-title">
                <?php echo $page_header_sub; ?>
            </h1>
        </div>
    </div>

	<div id="primary" class="container content-area">
	<div class="row">
	<?php if( $sidebar_position == 'left' ):
	 get_sidebar();
	 endif;
	?>

		<main id="main" class="site-main col-lg-9 col-md-8 col-sm-12 col-xs-12">
			<div class="row">

		<?php
		if ( have_posts() ) :



			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			//the_posts_navigation();
			tx_academia_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			</div>
		</main><!-- #main -->
<!--	</div> #primary -->

<?php
 if( $sidebar_position == 'right' ):
	get_sidebar();
endif;

get_footer();
