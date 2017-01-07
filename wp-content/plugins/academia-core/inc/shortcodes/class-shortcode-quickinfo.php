<?php
/**
 *
 * Quick Info Shortcode
 *
 */


class Academia_Shortcode_QuickInfo {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'quick-info';


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

        add_shortcode( $this->name, array( $this, 'create_quick_info_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */

    public function create_quick_info_shortcode( $atts ) {

        ob_start();

        $default = array(
            'icon-1' => '',
            'info-1' => '',
            'icon-2' => '',
            'info-2' => '',
            'icon-3' => '',
            'info-3' => '',
            'icon-4' => '',
            'info-4' => '',
            'icon-5' => '',
            'info-5' => '',
            'icon-6' => '',
            'info-6' => '',
            'icon-7' => '',
            'info-7' => '',
            'icon-8' => '',
            'info-8' => '',
            'icon-9' => '',
            'info-9' => '',
            'icon-10' => '',
            'info-10' => '',


        );

        $info = shortcode_atts( $default, $atts );


        ?>

        <ul class="fa-ul academia-quickinfo">
            <?php if( !empty($info['info-1']) ): ?>
            <li><i class="fa-li <?php echo $info['icon-1']; ?>"></i><?php echo $info['info-1']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-2']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-2']; ?>"></i><?php echo $info['info-2']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-3']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-3']; ?>"></i><?php echo $info['info-3']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-4']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-4']; ?>"></i><?php echo $info['info-4']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-5']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-5']; ?>"></i><?php echo $info['info-5']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-6']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-6']; ?>"></i><?php echo $info['info-6']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-7']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-7']; ?>"></i><?php echo $info['info-7']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-8']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-8']; ?>"></i><?php echo $info['info-8']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-9']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-9']; ?>"></i><?php echo $info['info-9']; ?></li>
            <?php endif; ?>
            <?php if( !empty($info['info-10']) ): ?>
                <li><i class="fa-li <?php echo $info['icon-10']; ?>"></i><?php echo $info['info-10']; ?></li>
            <?php endif; ?>

        </ul>


        <?php
        $output = ob_get_clean();

        return $output;

    }

}