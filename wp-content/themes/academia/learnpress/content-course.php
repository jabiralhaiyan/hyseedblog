<?php
/**
 * Template for displaying course content within the loop
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
	<div class="col-sm-6">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="learnpress-course-item shadow-box">
				<?php do_action( 'learn_press_before_course_header' ); ?>
				<div class="learnpress-course-thumbnail">
					<a href="<?php echo esc_url( get_permalink() ); ?>"> <?php the_post_thumbnail('large'); ?> </a>
					<?php learn_press_course_price(); ?>
				</div>
				<div class="learnpress-course-content">
					<?php
					do_action( 'learn_press_before_the_title' );
					the_title( sprintf( '<h2 class="course-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					//do_action( 'learn_press_after_the_title' );
					?>
					<!-- .entry-header -->
					<?php do_action( 'learn_press_before_course_content' ); ?>
					<div class="learnpress-course-meta">
						<?php learn_press_course_instructor(); ?>
						<i class="fa fa-group"></i>
						<?php learn_press_course_students(); ?>
					</div>
					<div class="learnpress-course-description">
						<?php
						do_action( 'learn_press_before_the_content' );
						the_excerpt();
						do_action( 'learn_press_after_the_content' );
						?>
					</div>
					<div class="learnpress-course-readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-special"><?php esc_html_e( 'Read More', 'academia' ); ?></a>
					</div>

				</div>

			</div>

		</article>
	</div>

