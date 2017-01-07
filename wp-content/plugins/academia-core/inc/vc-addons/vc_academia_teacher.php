<?php


$academia_teacher_mapper = array(
    "name" => __("Teacher", 'academia'),
    "description" => __("Display Teacher list.", 'academia'),
    "base" => "teacher-list",
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
            "description" => __("Display Teacher in Ascending or descending order.", 'academia'),

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
            "description" => __("Display Teacher in order by.", 'academia'),

        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Total Number", 'academia'),
            "param_name" => "posts_per_page",
            "value" => 8,
            "description" => __("Total number to display. For displaying all input -1.", 'academia'),

        ),


    )
);