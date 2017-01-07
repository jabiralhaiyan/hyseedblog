<?php

$academia_mail_chimp_mapper = array(
    "name" => __("MailChimp", 'academia'),
    "description" => __("Display MailChimp Subscribe form.", 'academia'),
    "base" => "academia-chimp",
    "class" => "",
    "controls" => "full",
    "icon" => $icon,
    "category" => $category,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => $heading_title,
            "param_name" => "title",
            "value" => '',
            "description" => __("Title for subscribe form.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Action Link", 'academia'),
            "param_name" => "action",
            "value" => '',
            "description" => __("Action link of your mailchimp account.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( 'Email Label', 'academia' ),
            "param_name" => "label_email",
            "value" => '',
            "description" => __("Label for Email field of form.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( 'Button Label', 'academia' ),
            "param_name" => "label_btn",
            "value" => '',
            "description" => __("Label for Submit Button of form.", 'academia'),

        ),

    )
);

