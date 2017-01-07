<?php
/**
 *
 * Testimonial Shortcode
 *
 */


class Academia_Shortcode_Testimonial {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'academia-testimonial';

    private $post_type = 'academia_testimonial';

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

        add_shortcode( $this->name, array( $this, 'create_testimonial_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_testimonial_shortcode( $atts ) {

        ob_start();
        global $post;

        $option = array(
            'item' => 3,
            'order' => 'DESC',
            'orderby' => 'date'
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

            <div id="academia-testimonial" class="ateam carousel slide at-accordion" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">


            <?php $counter=1; while( $q->have_posts() ): $q->the_post();
                $testimo = get_post_meta( $post->ID, '_tx_testimonial_meta', true ); ?>

                    <div class="item <?php echo $counter++ === 1 ? 'active': ''?>">
                        <div class="inner-wrapper">
                            <div class="inner-body">
                                <p class="at-desc"><?php echo $testimo[ '_tx_testimonial_details_testimonial' ];?></p>
                                <h4><?php echo $testimo[ '_tx_testimonial_details_name' ];?></h4>
                                <h5><?php echo $testimo[ '_tx_testimonial_details_position' ];?></h5>
                            </div>
                            <div class="inner-image">
                                <?php
                                if( has_post_thumbnail() ){
                                    $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                    <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="square img-responsive">

                                <?php } ?>
                            </div>
                        </div>
                    </div>

            <?php endwhile; wp_reset_postdata(); ?>

                </div>
                <ol class="carousel-indicators">

            <?php
            $data_num = 0;
            $counter=1;
            while( $q->have_posts() ): $q->the_post(); ?>

                    <li data-target="#academia-testimonial" data-slide-to="<?php echo $data_num; ?>" class="<?php echo $counter++ === 1 ? 'active': ''?>"></li>
                <?php $data_num++; endwhile; wp_reset_postdata(); ?>

                </ol>
            </div>



        <?php else: ?>

            <p> <?php esc_html_e( 'Sorry no testimonial found.', 'academia' ); ?> </p>

        <?php    endif;

        $output = ob_get_clean();

        return $output;

    }



}