<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package academia
 */

if ( ! is_active_sidebar( 'course-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-lg-3 col-md-4 col-sm-12 col-xs-12">
	<?php dynamic_sidebar( 'course-sidebar' ); ?>
</aside><!-- #secondary -->
