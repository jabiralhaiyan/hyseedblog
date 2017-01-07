<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package academia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tx_academia_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'tx_academia_body_classes' );


/**
 *
 * Custom Comment Form
 *
 */



add_filter( 'comment_form_default_fields', 'tx_academia_comment_form_fields' );

function tx_academia_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	$fields   =  array(
		'author' => '<div class="row"><div class="col-md-4 form-group comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'academia' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email'  => '<div class="col-md-4 form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'academia' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		'url'    => '<div class="col-md-4 form-group comment-form-url"><label for="url">' . esc_html__( 'Website', 'academia' ) . '</label> ' .
			'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>'
	);

	return $fields;
}


add_filter( 'comment_form_defaults', 'tx_academia_comment_form' );

function tx_academia_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . esc_html_x( 'Comment', 'noun', 'academia' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
	$args['class_submit'] = 'btn btn-special'; // since WP 4.1

	return $args;
}


function tx_academia_sticky_header() {
    if(cs_get_option('tx_header_sticky')){
        echo '<script>
    var navbar = jQuery("#ac-mainnav"),
        distance = navbar.offset().top,
        $window = jQuery(window);

    if(window.innerWidth > 1200) {
    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass("navbar-fixed-top").addClass("navbar-fixed-top");
            //jQuery("body").css("padding-top", "70px");
        } else {
            navbar.removeClass("navbar-fixed-top");
            //jQuery("body").css("padding-top", "0px");
        }
    });
    }
    </script>';
    }
}

add_action( 'wp_footer', 'tx_academia_sticky_header' );
