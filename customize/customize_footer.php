<?php
// require 'sanitize_field.php';


function customize_footer($wp_customize){
    $wp_customize->add_section('footer_settings', [
        'title'    => 'Footer Settings',
        'priority' => 115,
    ]);
    
    // Copyrights
    $wp_customize->add_setting('footer_copy_rights', [
        'default' => '',
        'sanitize_callback' => 'mohamdy_sanitize',
        'validate_callback' => 'mohamdy_footer_copy_rights_validate',
        'transport' => 'postMessage',
    ]);
    $wp_customize->selective_refresh->add_partial('footer_copy_rights', [
        'selector' => 'footer .copy',
        'container_inclusive' => false,
        'render_callback' => function() {
            echo esc_html(get_theme_mod('footer_copy_rights', ''));
        }
    ]);
    $wp_customize->add_control('footer_copy_rights', [
        'type' => 'text',
        'section' => 'footer_settings',
        'label'   => 'Copyrights Text',
    ]);
}




function mohamdy_footer_copy_rights_validate($validity, $footer_copy_rights)
{
    if (mb_strlen($footer_copy_rights) > 100) {
        $validity->add('invalid_footer_copy_rights', 'Footer Copy Rights can\'t be more than 100 character');
    }
    return $validity;
}

