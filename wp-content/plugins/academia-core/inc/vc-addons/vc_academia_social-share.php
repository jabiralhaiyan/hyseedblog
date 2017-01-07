<?php

$academia_social_share_mapper = array(
    "name" => __("Social Share", 'academia'),
    "description" => __("Display Social Share Icons.", 'academia'),
    "base" => "academia-share",
    "class" => "",
    "controls" => "full",
    "icon" => $icon,
    "category" => $category,
    "params" => array(

            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Show Facebook?", 'academia'),
                "param_name" => "s_facebook",
                "value" => $value_yes_no,
                "description" => __("Show Facebook Share Icon?", 'academia'),

            ),

            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Show Twitter?", 'academia'),
                "param_name" => "s_twitter",
                "value" => $value_yes_no,
                "description" => __("Show Twitter Share Icon?", 'academia'),

            ),

            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Show LinkedIn?", 'academia'),
                "param_name" => "s_linkedin",
                "value" => $value_yes_no,
                "description" => __("Show LinkedIn Share Icon?", 'academia'),

            ),

            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Show Google Plus?", 'academia'),
                "param_name" => "s_gplus",
                "value" => $value_yes_no,
                "description" => __("Show Google Plus Share Icon?", 'academia'),

            ),


    )
);

