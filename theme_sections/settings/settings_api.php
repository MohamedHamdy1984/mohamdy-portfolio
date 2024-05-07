<?php


add_action('admin_init', function() use ($settings, $sections, $fields){
    foreach ( $settings as $setting ){
        register_setting(
            $setting['option_group'],
            $setting['option_name'],
            isset($setting['callback']) ? $setting['callback'] : '',
        );
    }

    foreach ( $sections as $section ){
        add_settings_section(
            $section['id'],
            $section['title'],
            $section['callback'],
            $section['page'],
            isset($section['args']) ? $section['args'] : [],
        );
    }

    foreach ( $fields as $field ){
        add_settings_field(
            $field['id'],
            $field['title'],
            $field['callback'],
            $field['page'],
            $field['section'],
            isset($field['args']) ? $field['args'] : [],

        );
    }
});


