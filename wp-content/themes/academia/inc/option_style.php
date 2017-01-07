<?php


function tx_academia_custom_typo(){
    $css_editor = cs_get_option('tx_css_editor');


    if(cs_get_option('tx_header_custom_color')) {
        $header_top_bg = cs_get_option('tx_header_top_color');
        $header_nav_bg = cs_get_option('tx_header_nav_color'); ?>

        <style>
            .home-v1 .ac-header, .home-v3 .ac-header, .home-v2 .section-roof {
                background-color: <?php echo $header_top_bg; ?>;
            }

            .home-v1 .navbar-default, .home-v3 .navbar-default, .home-v2 .ac-header {
                background-color: <?php echo $header_nav_bg; ?>;
            }
        </style>

    <?php  }

    if(cs_get_option('tx_footer_custom_color')) {
        $footer_primary_bg = cs_get_option('tx_footer_primary_color');
        $footer_bottom_bg = cs_get_option('tx_footer_bottom_color'); ?>

        <style>
            .site-footer {
                background-color: <?php echo $footer_primary_bg; ?>;
            }

            .site-footer .site-info {
                background-color: <?php echo $footer_bottom_bg; ?>;
            }
        </style>

    <?php }


    if(cs_get_option('tx_custom_style')) {
        $header_primar_color = cs_get_option('tx_header_p_color');
        $header_top_link_color = cs_get_option('tx_header_top_link_color');
        $header_top_link_color_reg = $header_top_link_color['tx_header_link_reg'];
        $header_top_link_color_hover = $header_top_link_color['tx_header_link_hover'];
        $header_top_link_color_active = $header_top_link_color['tx_header_link_active'];

        $main_menu_color = cs_get_option('tx_main_menu_color');
        $main_menu_color_reg = $main_menu_color['tx_main_menu_reg'];
        $main_menu_color_hover = $main_menu_color['tx_main_menu_hover'];
        $main_menu_color_active = $main_menu_color['tx_main_menu_active'];

        $body_primary_color = cs_get_option('tx_body_p_color');
        $body_link_color = cs_get_option('tx_body_link_color');
        $body_link_color_reg = $body_link_color['tx_body_link_reg'];
        $body_link_color_hover = $body_link_color['tx_body_link_hover'];
        $body_link_color_active = $body_link_color['tx_body_link_active'];

        $footer_primary_color = cs_get_option('tx_footer_p_color');
        $footer_link_color = cs_get_option('tx_footer_link_color');
        $footer_link_color_reg = $footer_link_color['tx_footer_link_reg'];
        $footer_link_color_hover = $footer_link_color['tx_footer_link_hover'];
        $footer_link_color_active = $footer_link_color['tx_footer_link_active'];  ?>

        <style>

            .home-v1 .ac-header, .home-v3 .ac-header, .home-v2 .section-roof {
                color: <?php echo $header_primar_color; ?> !important;
            }

            .home-v1 .ac-header a, .home-v3 .ac-header a, .home-v2 .section-roof a {
                color: <?php echo $header_top_link_color_reg; ?> !important;
            }

            .home-v1 .ac-header a:hover, .home-v3 .ac-header a:hover, .home-v2 .section-roof a:hover {
                color: <?php echo $header_top_link_color_hover; ?> !important;
            }

            .home-v1 .ac-header a:active, .home-v3 .ac-header a:active, .home-v2 .section-roof a:active {
                color: <?php echo $header_top_link_color_active; ?> !important;
            }

            .ac-navbar li a {
                color: <?php echo $main_menu_color_reg; ?> !important;
            }
            .ac-navbar li a:hover {
                color: <?php echo $main_menu_color_hover; ?> !important;
            }
            .ac-navbar li a:active {
                color: <?php echo $main_menu_color_active; ?> !important;
            }

            .site-content {
                color: <?php echo $body_primary_color ?> !important;
            }
            .site-content a {
                color: <?php echo $body_link_color_reg ?> !important;
            }
            .site-content a:hover {
                color: <?php echo $body_link_color_hover ?> !important;
            }
            .site-content a:active {
                color: <?php echo $body_link_color_active ?> !important;
            }



            .site-footer * {
                color: <?php echo $footer_primary_color; ?> !important;
            }
            .site-footer a {
                color: <?php echo $footer_link_color_reg; ?> !important;
            }
            .site-footer a:hover {
                color: <?php echo $footer_link_color_hover; ?> !important;
            }

            .site-footer a:active {
                color: <?php echo $footer_link_color_active; ?> !important;
            }

        </style>

    <?php }


    if(cs_get_option( 'tx_custom_typo_switch' )){

        $header_typo = cs_get_option('tx_header_font');
        $body_typo = cs_get_option('tx_body_font');
        $footer_typo = cs_get_option('tx_footer_font');

        echo "<link href='https://fonts.googleapis.com/css?family=". $header_typo['family'] .":". $header_typo['variant'] ."' rel='stylesheet' type='text/css'>";
        echo "<link href='https://fonts.googleapis.com/css?family=". $body_typo['family'] .":". $body_typo['variant'] ."' rel='stylesheet' type='text/css'>";
        echo "<link href='https://fonts.googleapis.com/css?family=". $footer_typo['family'] .":". $footer_typo['variant'] ."' rel='stylesheet' type='text/css'>";

        ?>

        <style>

            #ac-header *:not(i), #ac-mainnav *:not(i), .ac-off-canvas *:not(i) {
                font-family: '<?php echo $header_typo['family'];?>' !important;
                font-weight: <?php echo $header_typo['variant'];?> !important;
            }

            #primary *:not(i), #secondary *:not(i){
                font-family: '<?php echo $body_typo['family'];?>' !important;
                font-weight: <?php echo $body_typo['variant'];?> !important;
            }

            footer.site-footer *:not(i), footer.site-footer .widget-title{
                font-family: '<?php echo $footer_typo['family'];?>' !important;
                font-weight: <?php echo $footer_typo['variant'];?> !important;
            }

        </style>

   <?php } ?>

    <style>
        <?php echo $css_editor; ?>
    </style>

<?php
}


function tx_academia_custom_js() {
    $js_editor = cs_get_option('tx_js_editor'); ?>
    <script>
        <?php echo $js_editor; ?>
    </script>
<?php }

add_action( 'wp_head', 'tx_academia_custom_typo' );
add_action( 'wp_footer', 'tx_academia_custom_js' );
