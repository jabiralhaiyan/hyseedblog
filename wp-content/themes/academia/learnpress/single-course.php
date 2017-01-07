<?php
/**
 * The template for displaying single course content
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="learnpress-course-single col-lg-9 col-md-8 col-sm-12">

            <?php do_action('learn_press_before_main_content'); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php learn_press_get_template_part('content', 'single-course'); ?>

            <?php endwhile; ?>

            <?php do_action('learn_press_after_main_content'); ?>
        </div>
        <?php get_sidebar('course'); ?>
    </div>
</div>

<?php get_footer(); ?>
