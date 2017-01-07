<?php
/**
 *
 * Visual Composer actions & filters
 *
 */


add_action( 'vc_before_init', 'tx_academia_vcSetAsTheme' );

function tx_academia_vcSetAsTheme() {

    vc_set_as_theme();
    // Allow post by default
    $list = array(
        'page',
        'academia_course'
    );
    vc_set_default_editor_post_types( $list );

}


