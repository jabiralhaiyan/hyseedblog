<?php


$academia_course_mapper = array(
    "name" => __("Course", 'academia'),
    "description" => __("Display Course in different style.", 'academia'),
    "base" => "academia-course",
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
            "description" => __("Display Course in Ascending or descending order.", 'academia'),

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
            "description" => __("Display Course in order by.", 'academia'),

        ),

        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Style", 'academia'),
            "param_name" => "style",
            "value" => array(
                __("Carousel", 'academia') => 'carousel',
                __("List", 'academia')  => 'list',
                __("Grid", 'academia')  => 'grid',
            ),
            "description" => __("Display Course matching style.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Course Item", 'academia'),
            "param_name" => "item",
            "value" => 8,
            "description" => __("Total Course Item to display. For displaying all input -1. Default is 8.", 'academia'),

        ),


    )
);