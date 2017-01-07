<?php

/**
 * Codestar Framework Settings
 */

function tx_academia_option_settings( $settings ){
    $settings = array();

    $settings           = array(
        'menu_title'      => 'Academia',
        'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'ac-options',
        'ajax_save'       => false,
        'show_reset_all'  => false,
        'framework_title' => 'Academia Options <small>by ThemeXpert</small>',
    );

    return $settings;
}


add_filter('cs_framework_settings', 'tx_academia_option_settings');

