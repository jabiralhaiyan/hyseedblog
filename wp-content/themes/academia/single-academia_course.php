<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package academia
 */

get_header();

$post_id = tx_academia_get_post_id();


$course_single_meta = get_post_meta( $post_id, '_tx_course_meta', true);
$course_single_bg = array_get( $course_single_meta, '_tx_course_header_image' );
$course_custom_title = array_get( $course_single_meta, '_tx_custom_course_title' );
$course_header_title = array_get( $course_single_meta, '_tx_course_header_title' );
$course_single_sub = array_get( $course_single_meta, '_tx_course_header_subtitle' );

$course_category = get_the_terms( $post_id, 'academia_course_category' );
$course_bg_url = wp_get_attachment_image_src( $course_single_bg, 'full' );
?>

    <header class="course-header" style="background-image:url(<?php echo  esc_url($course_bg_url[0]); ?>); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php if(!empty($course_category)): ?>
                    <?php foreach( $course_category as $category ): ?>
                        <a href="<?php echo get_term_link($category->term_id, $category->taxonomy); ?>">
                            <button class="btn text-uppercase">
                            <?php echo $category->name; ?>
                            </button>
                        </a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <h1><?php
                        if($course_custom_title) {
                            echo $course_header_title;
                        } else {
                            the_title();
                        } ?> </h1>
                    <p class="lead"><?php echo $course_single_sub; ?></p>
                </div>
            </div>
        </div>
    </header>


	<div id="primary" class="container content-area">

		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'course' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->


<?php
//get_sidebar();
get_footer();
