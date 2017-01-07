<?php
/**
 *
 * Recent Post Shortcode
 *
 */


class Academia_Shortcode_Course {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'academia-course';

    private $post_type = 'academia_course';

    /**
     * Instance of class
     */
    private static $instance;

    /**
     * Initialization
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    private function __construct() {

        add_shortcode( $this->name, array( $this, 'create_course_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_course_shortcode( $atts ) {

        ob_start();

        $option = array(
            'item' => 8,
            'order' => 'DESC',
            'orderby' => 'date',
            'style' => 'carousel'

        );

        $s = shortcode_atts( $option, $atts );

        $args = array(
            'post_type' => $this->post_type,
            'order' => $s['order'],
            'orderby' => $s['orderby'],
            'posts_per_page' => $s['item'],
        );

        $q = new WP_Query( $args );

        if ( $q->have_posts() ): ?>

            <?php    if ($s['style'] == 'carousel'):?>

                <div id="course-carousel" class="owl-carousel">

            <?php  while ( $q->have_posts() ): $q->the_post(); ?>

                <?php $perma = get_permalink(); ?>


                    <div class="owl-item course-item-carousel wow zoomIn">

                        <div class="shadow-box">
                            <div class="row">
                                <div class="col-xs-12">
                            <figure>
                                <a href="<?php echo esc_url($perma); ?>">
                                    <div class="display-block">
                                        <?php
                                        if( has_post_thumbnail() ):
                                            $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                            <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">

                                        <?php endif; ?>



                                    </div>

                                </a>
                            </figure>
                                </div>
                                <div class="col-xs-12">
                            <div class="media-body">
                                <h3 class="media-heading"><a class="course-title " href="<?php echo esc_url($perma); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></a></h3>
                                <p class="course-introtext"> <?php the_excerpt(); ?> </p>
                                <p>
                                    <a class="course-readmore  text-uppercase" href="<?php echo esc_url($perma); ?>">
                                        <strong><?php esc_html_e('Read More', 'academia') ?></strong>
                                    </a>
                                </p>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>




            <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>


            <?php    if ($s['style'] == 'list'):?>

                <?php $course_counter = 0; ?>
                <div class="row">

                    <?php  while ( $q->have_posts() ): $q->the_post(); ?>

                        <?php $perma = get_permalink();
                        ++$course_counter;
                        ?>


                        <div class="col-xs-12 col-md-6 course-item-list">
                            <div class="shadow-box wow fadeIn animated" data-wow-delay="0.3s" style="animation-delay: 0.3s;">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xs-12">
                                        <figure>
                                            <a href="<?php echo esc_url($perma); ?>">
                                                <div class="display-block">
                                                    <?php
                                                    if( has_post_thumbnail() ):
                                                        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                                        <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">

                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xs-12">
                                        <div class="media-body">
                                            <h3 class="media-heading">
                                                <a class="course-title " href="<?php echo esc_url($perma); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></a></h3>
                                            <p class="course-introtext"> <?php the_excerpt(); ?> </p>
                                            <p>
                                                <a class="course-readmore  text-uppercase" href="<?php echo esc_url($perma); ?>">
                                                    <strong><?php esc_html_e('Read More', 'academia') ?></strong>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        if($course_counter % 2 == 0) {
                            echo '</div><div class="row">';
                        }
                    endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>



            <?php    if ($s['style'] == 'grid'):?>

                <?php $course_counter = 0; ?>

                <div class="row">

                    <?php  while ( $q->have_posts() ): $q->the_post(); ?>

                        <?php $perma = get_permalink();
                        ++$course_counter; ?>


                        <div class="col-md-3 col-sm-6 col-xs-12 course-item-grid">
                            <div class="shadow-box wow fadeIn animated" data-wow-delay="0.3s" style="animation-delay: 0.3s;">
                                <figure>
                                    <a href="<?php echo esc_url($perma); ?>">
                                        <div class="display-block">
                                            <?php
                                            if( has_post_thumbnail() ):
                                                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">

                                            <?php endif; ?>
                                        </div>

                                    </a>
                                </figure>
                                <div class="media-body">
                                    <h3 class="media-heading"><a class="course-title " href="<?php echo esc_url($perma); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></a></h3>
                                    <p class="course-introtext"> <?php the_excerpt(); ?> </p>
                                    <p>
                                        <a class="course-readmore  text-uppercase" href="<?php echo esc_url($perma); ?>">
                                            <strong><?php esc_html_e('Read More', 'academia') ?></strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>




                    <?php
                        if($course_counter % 4 == 0) {
                            echo '</div><div class="row">';
                        }
                    endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>



        <?php else: ?>

            <p> <?php _e( 'Sorry no post found.' ); ?> </p>

        <?php    endif;

        $output = ob_get_clean();

        return $output;

    }



}