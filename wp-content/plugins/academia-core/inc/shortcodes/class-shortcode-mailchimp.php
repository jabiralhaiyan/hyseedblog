<?php
/**
 *
 * Mailchimp Form Shortcode
 *
 */


class Academia_Shortcode_MailChimp {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'academia-chimp';


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

        add_shortcode( $this->name, array( $this, 'create_mailchimp_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_mailchimp_shortcode( $atts ) {

        ob_start();

        $data = shortcode_atts( array(
            'title'       => '',
            'action'      => '',

            'label_email' => '',
            'label_btn'   => '',
        ), $atts );

        $title       = ( '' === $data['title'] ) ? '' : esc_html( $data['title'] );
        $action      = ( '' === $data['action'] ) ? '' : esc_url_raw( htmlspecialchars_decode( $data['action'] ) );


        $label_email = ( '' === $data['label_email'] ) ? __( 'Your Email', 'academia' ) : esc_html( $data['label_email'] );
        $label_btn   = ( '' === $data['label_btn'] ) ? __( 'Subscribe', 'academia' ) : esc_html( $data['label_btn'] );



        // If action not set, just exit
        if ( '' === $action ) {
            return;
        }


        // Title

        if ( '' !== $title ) {
            $title = sprintf( '<h3>%s</h3>', $title );
        } ?>

        <form method="post" class="academia-mailchimp" action="<?php echo $action; ?>" autocomplete="off" target="_blank" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
            <?php echo $title; ?>

            <div class="form-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="<?php esc_attr_e($label_email); ?>" required>
            </div>
            <div class="clearfix">
                <button type="submit" class="btn  btn-special" name="subscribe" id="mc-embedded-subscribe"><?php esc_html_e($label_btn); ?> <i class="fa fa-graduation-cap"></i></button>
            </div>

        </form>

        <?php
        $output = ob_get_clean();

        return $output;

    }






}