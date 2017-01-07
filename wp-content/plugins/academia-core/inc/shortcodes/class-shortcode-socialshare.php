<?php
/**
 *
 * Social Share Shortcode
 *
 */


class Academia_Shortcode_SocialShare {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'academia-share';


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

        add_shortcode( $this->name, array( $this, 'create_socialshare_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_socialshare_shortcode( $atts ) {



        $default = array(
            's_facebook' => 'yes',
            's_twitter' => 'yes',
            's_linkedin' => 'yes',
            's_gplus' => 'yes',
        );

        $s = shortcode_atts( $default, $atts );

        remove_filter( 'the_title', 'wptexturize' );

        $academia_title = urlencode(html_entity_decode(get_the_title()));

        add_filter( 'the_title', 'wptexturize' );

        $academia_url = urlencode( get_permalink() );



        // Construct sharing URL without using any script

        $twitter_url = 'https://twitter.com/intent/tweet?text='.$academia_title.'&amp;url='.$academia_url;
        $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='.$academia_url;
        $google_url = 'https://plus.google.com/share?url='.$academia_url;
        $linked_url = 'https://www.linkedin.com/shareArticle?mini=true&url='.$academia_url.'&title='.$academia_title.'&summary='.get_the_excerpt();


        ob_start();

        ?>



                            <div class="ac-social-share">
                                <?php if( $s['s_facebook'] == 'yes' ): ?>
                                <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <?php endif; ?>
                                <?php if( $s['s_twitter'] == 'yes' ): ?>
                                <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if( $s['s_linkedin'] == 'yes' ): ?>
                                <a href="<?php echo $linked_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if( $s['s_gplus'] == 'yes' ): ?>
                                <a href="<?php echo $google_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <?php endif; ?>
                            </div>

    <?php    $output = ob_get_clean();

             return $output;

    }


}