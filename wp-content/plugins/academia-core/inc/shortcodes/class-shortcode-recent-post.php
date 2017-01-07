<?php
/**
 *
 * Recent Post Shortcode
 *
 */


class Academia_Shortcode_Recent_Post {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'academia-recent-post';

    private $post_type = 'post';

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

        add_shortcode( $this->name, array( $this, 'create_recent_post_shortcode' ) );
    }




    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_recent_post_shortcode( $atts ) {

        ob_start();

        $option = array(
            'item' => 2,
            'order' => 'DESC',
            'orderby' => 'date',

        );

        $s = shortcode_atts( $option, $atts );

        $args = array(
            'post_type' => $this->post_type,
            'order' => $s['order'],
            'orderby' => $s['orderby'],
            'posts_per_page' => $s['item'],
            'post__not_in' => get_option( 'sticky_posts' ),
        );

        $q = new WP_Query( $args );

        if ( $q->have_posts() ): ?>




                <?php  while ( $q->have_posts() ): $q->the_post(); ?>

                <div class="ac-recent-with-thumb">
                    <div class="media">
                        <div class="media-left">
                            <div class="image-wrapper">
                                <?php
                                if( has_post_thumbnail() ) {
                                    the_post_thumbnail('medium');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php the_title(); ?></h4>
                            <div class="content-desc">
                                <p> <?php academia_excerpt_max(50); ?> </p>
                                <a class="btn btn-special" href="<?php the_permalink(); ?>" title="<?php esc_attr_e('LEARN MORE', 'academia'); ?>"><?php esc_html_e('LEARN MORE', 'academia'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>


                <?php endwhile; wp_reset_postdata(); ?>



        <?php else: ?>

            <p> <?php esc_html_e( 'Sorry no post found.', 'academia' ); ?> </p>

        <?php    endif;

        $output = ob_get_clean();

        return $output;

    }



}