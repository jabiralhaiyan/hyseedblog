<?php


function tx_academia_preloader_css(){

if( cs_get_option('tx_preloader_color') ){
$background_color = cs_get_option('tx_preloader_color');
}else{
$background_color = '#FFFFFF';
}

if( cs_get_option('tx_preloader_img') ){
$preloader_image = cs_get_option('tx_preloader_img');
}else{
$preloader_image = get_template_directory_uri() . '/dist/images/preloader.gif';
}

?>
<style type="text/css">
    .pace-active .pace-activity{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:url(<?php echo $preloader_image; ?>) no-repeat <?php echo $background_color; ?> 50%;
        -moz-background-size:64px 64px;
        -o-background-size:64px 64px;
        -webkit-background-size:64px 64px;
        background-size:64px 64px;
        z-index: 100;
        width:100%;
        height:100%;
    }


</style>
    
<?php


}
add_action('wp_head', 'tx_academia_preloader_css');