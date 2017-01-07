<?php


$academia_testimonial_mapper = array(
    "name" => __("Testimonial", 'academia'),
    "description" => __("Display Testimonial.", 'academia'),
    "base" => "academia-testimonial",
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
            "description" => __("Display Testimonial in Ascending or descending order.", 'academia'),

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
            "description" => __("Display Testimonial in order by.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Testimonial Number", 'academia'),
            "param_name" => "item",
            "value" => 3,
            "description" => __("Total Testimonial number to display. For displaying all input -1. Default is 3.", 'academia'),

        ),


    )
);