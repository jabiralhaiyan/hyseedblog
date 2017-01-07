<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package academia
 */

get_header();


$sidebar_position = 'right';
$sidebar_position = cs_get_option('tx_sidebar_position');
?>

	<div id="primary" class="container content-area">
	<div class="row">

<?php if( $sidebar_position == 'left' ):
	get_sidebar();
endif;
?>

		<main id="main" class="site-main col-lg-9 col-md-8 col-sm-12 col-xs-12">
			<div class="row">



		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'academia' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			</div>

		</main><!-- #main -->
	<!-- #primary -->

<?php
 if( $sidebar_position == 'right' ):
	 get_sidebar();
 endif;

get_footer();
