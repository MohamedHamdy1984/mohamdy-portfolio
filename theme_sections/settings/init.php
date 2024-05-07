<?php
require 'enqueue.php';
require 'add_pages.php';
require 'callbacks/callbacks_index.php';
require 'services_section.php';
require 'testimonials_section.php';
require 'statistics_section.php';



function shortNumber($num) 
{
    $units = ['', 'K', 'M', 'B', 'T'];
    for ($i = 0; $num >= 1000; $i++) {
        $num /= 1000;
    }
    return round($num, 1) . $units[$i];
}



$settings = [];
$sections = [];
$fields = [];




$settings []=  $services_settings;
$settings []=  $testimonials_settings;
$settings []=  $statistics_settings;
$sections = array_merge($sections, $services_section, $testimonials_section, $statistics_section) ;
$fields = array_merge($fields, $services_fields, $services_dynamic_fields, $testimonials_fields, $testimonials_dynamic_fields, $statistics_fields, $statistics_dynamic_fields) ;


require 'settings_api.php';









