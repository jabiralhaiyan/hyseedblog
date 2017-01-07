<?php


$academia_recent_post_mapper = array(
    "name" => __("Recent Posts", 'academia'),
    "description" => __("Display Recent Posts with thumbnail.", 'academia'),
    "base" => "academia-recent-post",
    "class" => "",
    "controls" => "full",
    "icon" => $icon,
    "category" => $category,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Order", 'academia'),
            "param_name" => "order",
            "value" => $value_asc_desc,
            "description" => __("Display Recent Posts in Ascending or descending order.", 'academia'),

        ),

        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Order By", 'academia'),
            "param_name" => "orderby",
            "value" => array(
                __("Title", 'academia') => 'title',
                __("Name", 'academia')  => 'name',
                __("Date", 'academia')  => 'date',
                __("Random", 'academia')   => 'rand',
            ),
            "description" => __("Display Recent Posts in order by.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Post Item", 'academia'),
            "param_name" => "item",
            "value" => 2,
            "description" => __("Total Post number to display. For displaying all input -1. Default is 2.", 'academia'),

        ),


    )
);