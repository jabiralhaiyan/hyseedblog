<?php
/**
 *
 * Mailchimp Form Shortcode
 *
 */


class Academia_Shortcode_Custom_Login {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name_login = 'ac_login_form';
    private $name_reg = 'ac_custom_registration';


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

        add_shortcode( $this->name_login, array( $this, 'login_shortcode' ) );
        add_shortcode( $this->name_reg, array( $this, 'custom_registration_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string
     */





    public function registration_form( $username, $password, $email ) {


        echo '
    <form class="custom-register-form" action="' . $_SERVER['REQUEST_URI'] . '" method="post">



	<div class="form-group">
        <label for="username" class="control-label">'. esc_html__( 'Username:', 'academia' ) .'</label>
        <input class="form-control" type="text" name="username" value="' . (isset($_POST['username']) ? $username : null) . '">
    </div>

    <div class="form-group">
        <label for="password" class="control-label">'. esc_html__( 'Password:', 'academia' ) .'</label>
        <input class="form-control" type="password" name="password" value="' . (isset($_POST['password']) ? $password : null) . '">
    </div>


	<div class="form-group">
        <label for="email" class="control-label">'. esc_html__( 'Email:', 'academia' ) .'</label>
        <input class="form-control" type="email" name="email" value="' . (isset($_POST['email']) ? $email : null) . '">
    </div>



	<div class="form-group">
       <input class="btn btn-primary btn-special" type="submit" name="submit" value="'. esc_attr__( 'Register', 'academia' ) .'"/>
  </div>

	</form>

	';
    }

    public function registration_validation( $username, $password, $email)  {
        global $reg_errors;
        $reg_errors = new WP_Error;

        if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
            $reg_errors->add('field', 'Required form field is missing');
        }

        if ( strlen( $username ) < 4 ) {
            $reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
        }

        if ( username_exists( $username ) )
            $reg_errors->add('user_name', 'Sorry, that username already exists!');

        if ( !validate_username( $username ) ) {
            $reg_errors->add('username_invalid', 'Sorry, the username you entered is not valid');
        }

        if ( strlen( $password ) < 5 ) {
            $reg_errors->add('password', 'Password length must be greater than 5');
        }

        if ( !is_email( $email ) ) {
            $reg_errors->add('email_invalid', 'Email is not valid');
        }

        if ( email_exists( $email ) ) {
            $reg_errors->add('email', 'Email Already in use');
        }



        if ( is_wp_error( $reg_errors ) ) {

            foreach ( $reg_errors->get_error_messages() as $error ) {
                echo '<div>';
                echo '<strong>ERROR</strong>:';
                echo $error . '<br/>';

                echo '</div>';
            }
        }
    }

    public function complete_registration() {
        global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        if ( count($reg_errors->get_error_messages()) < 1 ) {
            $userdata = array(
                'user_login'	=> 	$username,
                'user_email' 	=> 	$email,
                'user_pass' 	=> 	$password,

            );
            $user = wp_insert_user( $userdata );
            echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';
        }
    }

    public function custom_registration_function() {
        global $username, $password, $email;


        if (isset($_POST['submit'])) {
            $this->registration_validation(
                $_POST['username'],
                $_POST['password'],
                $_POST['email']

            );

            // sanitize user form input

            $username	= 	sanitize_user($_POST['username']);
            $password 	= 	esc_attr($_POST['password']);
            $email 		= 	sanitize_email($_POST['email']);

            // call @function complete_registration to create the user
            // only when no WP_error is found
            $this->complete_registration(
                $username,
                $password,
                $email

            );
        }

        $this->registration_form(
            $username,
            $password,
            $email

        );
    }


    public function custom_registration_shortcode() {
        ob_start();
        $this->custom_registration_function();
        return ob_get_clean();
    }


    public function login_shortcode() {
        ob_start();

        if ( ! is_user_logged_in() ) { // Display WordPress login form:
            $args = array(
                'redirect' => admin_url(),
                // 'form_id' => 'loginform-custom',
                'form_class'  => 'loginform-custom',
                'label_username' => esc_html__( 'Username', 'academia' ),
                'label_password' => esc_html__( 'Password', 'academia' ),
                'label_remember' => esc_html__( 'Remember Me', 'academia' ),
                'label_log_in' => esc_html__( 'Login', 'academia' ),
                'remember' => true
            );
            wp_login_form( $args );
        } else { // If logged in:
            wp_loginout( home_url() ); // Display "Log Out" link.
            echo " | ";
            wp_register('', ''); // Display "Site Admin" link.
        }

        return ob_get_clean();
    }




}