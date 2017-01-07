<?php
/**
 *
 * Social Box Shortcode
 *
 */


class Academia_Shortcode_SocialBox {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'social-box';


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

        add_shortcode( $this->name, array( $this, 'create_social_box_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_social_box_shortcode( $atts ) {

        ob_start();

        $default = array(
            'fb-link' => 'https://fb.com/themexpert',
            'fb-follower' => '893K',
            'tw-link' => 'https://twitter.com/themexpert',
            'tw-follower' => '893K',
            'gplus-link' => 'https://plus.google.com/+themexpert',
            'gplus-follower' => '893K',
            'ln-link' => 'https://linkedin.com/',
            'ln-follower' => '893K',

        );

        $social = shortcode_atts( $default, $atts );


        ?>

        <div class="social-box-container row">
            <div class="social-box col-sm-6 col-md-3 col-xs-12">
                <a class="btn btn-default btn-facebook btn-block" href="<?php echo esc_url($social['fb-link']); ?>" title="Facebook" target="_blank">
                    <i class="fa fa-facebook  fa-5x"></i>
                    <p class="msg"><?php echo $social['fb-follower']; ?> <?php esc_html_e('Followers', 'academia') ?></p>
                    <h5><?php esc_html_e('Follow Us', 'academia') ?></h5>
                </a>
            </div>
            <div class="social-box col-sm-6 col-md-3 col-xs-12">
                <a class="btn btn-default btn-twitter btn-block" href="<?php echo esc_url($social['tw-link']); ?>" title="Twitter" target="_blank">
                    <i class="fa fa-twitter  fa-5x"></i>
                    <p class="msg"><?php echo $social['tw-follower']; ?> <?php esc_html_e('Followers', 'academia') ?></p>
                    <h5><?php esc_html_e('Follow Us', 'academia') ?></h5>
                </a>
            </div>
            <div class="social-box col-sm-6 col-md-3 col-xs-12">
                <a class="btn btn-default btn-gplus btn-block" href="<?php echo esc_url($social['gplus-link']); ?>" title="Google Plus" target="_blank">
                    <i class="fa fa-google-plus  fa-5x"></i>
                    <p class="msg"><?php echo $social['gplus-follower']; ?> <?php esc_html_e('Followers', 'academia') ?></p>
                    <h5><?php esc_html_e('Follow Us', 'academia') ?></h5>
                </a>
            </div>
            <div class="social-box col-sm-6 col-md-3 col-xs-12">
                <a class="btn btn-default btn-linkedin btn-block" href="<?php echo esc_url($social['ln-link']); ?>" title="Linked In" target="_blank">
                    <i class="fa fa-linkedin  fa-5x"></i>
                    <p class="msg"><?php echo $social['ln-follower']; ?> <?php esc_html_e('Followers', 'academia') ?></p>
                    <h5><?php esc_html_e('Follow Us', 'academia') ?></h5>
                </a>
            </div>
        </div>


    <?php
        $output = ob_get_clean();

        return $output;

    }






}