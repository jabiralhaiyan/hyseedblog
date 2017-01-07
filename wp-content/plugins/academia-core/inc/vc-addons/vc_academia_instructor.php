<?php




$academia_instructor_mapper = array(
    "name" => __("Course Instructor", 'academia'),
    "description" => __("Display individual course instructor list.", 'academia'),
    "base" => "course-instructor",
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
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Course Name", 'academia'),
            "param_name" => "course_id",
            "value" => $tax_name,
            "description" => __("Select Course Name.", 'academia'),

        ),


    )
);

