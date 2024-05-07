<?php
// require 'sanitize_field.php';

function customize_home_section($wp_customize)
{
    //home section
    $wp_customize->add_section('home_section', [
        'title'    => 'Home Section Settings',
        'priority' => 115,
    ]);

    // main Image
    $wp_customize->add_setting('main_portfolio_image', [
        'default' => '',
        'transport' => 'postMessage',
    ]);
    $wp_customize->selective_refresh->add_partial('main_portfolio_image', [
        'selector' => '#home .photo',
        'container_inclusive' => false,
        'render_callback' => function () {
            echo get_theme_mod('main_portfolio_image', '(Your Image)');
        }
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'main_portfolio_image',
        [
            'label' => 'Main Portfolio Image',
            'section' => 'home_section',
            'mime_type' => 'image'
        ]
    ));

    // Portfolio name
    $wp_customize->add_setting('main_portfolio_name', [
        'default' => '',
        'sanitize_callback' => 'mohamdy_sanitize',
        'validate_callback' => 'mohamdy_main_portfolio_name_validate',
        'transport' => 'postMessage',
    ]);
    $wp_customize->selective_refresh->add_partial('main_portfolio_name', [
        'selector' => '#home .welcome .title span#name',
        'container_inclusive' => false,
        'render_callback' => function () {
            echo get_theme_mod('main_portfolio_name', '(Your name)');
        }
    ]);
    $wp_customize->add_control('main_portfolio_name', [
        'type' => 'text',
        'section' => 'home_section',
        'label'   => 'Add Your name',
    ]);


    // Job Title 
    $wp_customize->add_setting('job_title', [
        'default' => '',
        'sanitize_callback' => 'mohamdy_sanitize',
        'validate_callback' => 'mohamdy_main_portfolio_name_validate',
        'transport' => 'postMessage',
    ]);
    $wp_customize->selective_refresh->add_partial('job_title', [
        'selector' => '#home .welcome .job-title .content__container__text',
        'container_inclusive' => false,
        'render_callback' => function () {
            echo get_theme_mod('job_title', '(Your Title)');
        }
    ]);
    $wp_customize->add_control('job_title', [
        'type' => 'text',
        'section' => 'home_section',
        'label'   => 'Add Your Job Title here',
    ]);

    
    for ($x = 0; $x <= 5; $x++) {

        $wp_customize->add_setting('mohamdy_skills['.$x.']', [
            'default' => '',
            'transport' => 'postMessage',
        ]);
        $wp_customize->selective_refresh->add_partial('mohamdy_skills['.$x.']', [
            'selector' => '#skill-'.$x,
            'container_inclusive' => true,
            'render_callback' => function () {
                global $x;
                echo '<img src="' . wp_get_attachment_image_url('mohamdy_skills['.$x.']') . '" id="skill-' . $x . '"> class="new"';
            }
        ]);
        $wp_customize->add_control(new WP_Customize_Media_Control(
            $wp_customize,
            'mohamdy_skills['.$x.']',
            [
                'label' => 'Add Skill image - '.$x+1,
                'section' => 'home_section',
                'mime_type' => 'image'
            ]
        ));
    }
}






/** Helper functions */
// Add style for main image
add_action('wp_head', function () {
    echo '<style>#home .wrapper .photo{';
    $custom_home_image = get_theme_mod('main_portfolio_image', '');
    if (!empty($custom_home_image)) {
        echo 'background-image:url(' . wp_get_attachment_image_url($custom_home_image, 'full') . ');';
    }
    echo '}</style>';
}, 99);


// Validation
function mohamdy_main_portfolio_name_validate($validity, $main_portfolio_name)
{
    if (mb_strlen($main_portfolio_name) > 25) {
        $validity->add('invalid_main_portfolio_name', 'Main Portfolio Name can\'t be more than 25 characters');
    }
    return $validity;
}
