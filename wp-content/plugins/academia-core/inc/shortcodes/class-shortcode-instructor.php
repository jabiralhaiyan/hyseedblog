<?php
/**
 *
 * Instructor Shortcode
 *
 */


class Academia_Shortcode_Instructor {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'course-instructor';

    private $post_type = 'academia_teacher';

    /**
     * Custom taxonomy - course name - for post type
     * @var string
     */
    private $taxonomy = 'course_name';

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

        add_shortcode( $this->name, array( $this, 'create_instructor_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_instructor_shortcode( $atts ) {

        ob_start();

        global $post;

        $default = array(
            'order' => 'DESC',
            'orderby' => 'title',
            'course_id' => 0,
        );
        $data = shortcode_atts( $default, $atts );

        $options = array(
            'post_type' => $this->post_type,
            'order' => $data['order'],
            'orderby' => $data['orderby'],
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $this->taxonomy,
                    'field'    => 'term_id',
                    'terms'    => array($data['course_id']),
                ),
            ),
        );

        $q = new WP_Query( $options );

        if ( $q->have_posts() ): ?>


                <div class="course-instructor-container">

                <?php  while ( $q->have_posts() ): $q->the_post();
                    $teachers = get_post_meta( $post->ID, '_tx_teacher_meta', true ); ?>

                    <div class="ateam at-list">

                    <div class="media">
                        <figure class="media-left">
                            <?php
                            if( has_post_thumbnail() ){
                                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-circle">


                            <?php } ?>
                        </figure>
                        <div class="media-body">
                            <h4><?php the_title(); ?></h4>
                            <?php if(!empty($teachers['_tx_teacher_designation'])) {
                                echo '<h5 class="text-muted">' . esc_html( $teachers['_tx_teacher_designation'] ) . '</h5>';
                            }?>
                            <div class="at-desc"><?php the_excerpt(); ?></div>
                            <?php if(!empty($teachers['_tx_teacher_social_fb']) || !empty($teachers['_tx_teacher_social_tw']) || !empty($teachers['_tx_teacher_social_ln']) || !empty($teachers['_tx_teacher_social_gplus'])): ?>
                                <div class="at-social">
                                    <?php if(!empty($teachers['_tx_teacher_social_fb'])): ?>
                                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_fb']); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teachers['_tx_teacher_social_tw'])): ?>
                                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_tw']); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teachers['_tx_teacher_social_ln'])): ?>
                                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_ln']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teachers['_tx_teacher_social_gplus'])): ?>
                                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_gplus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>


                <?php endwhile; wp_reset_postdata(); ?>

                </div>

        <?php else: ?>

            <p> <?php esc_html_e( 'Sorry no post found.', 'academia' ); ?> </p>

        <?php    endif;

        $output = ob_get_clean();

        return $output;

    }


}