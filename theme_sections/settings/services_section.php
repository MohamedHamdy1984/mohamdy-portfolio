<?php
$services_settings = [
    'option_group' => 'services_section_content',
    'option_name'  => 'services_options',
    'callback'     => 'services_sanitize_cb'
];

$services_section = [
    [
        'id'       => 'services_section',
        'title'    => __('Clearly communicate the value you offer to clients.', 'mohamdy-portfolio'),
        'callback' => '',
        'page'     => 'services_section_content'
    ],
    [
        'id'       => 'services_dynamic_section',
        'title'    => '',
        'callback' => '',
        'page'     => 'services_section_content'
    ],
];

$services_fields = [
    [
        'id'       => 'services_section_guide',
        'title'    => __('Services Section Example', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_section_guide_callback',
        'page'     => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'services_section_guide',
            'class'       => 'mohamdy-portfolio-section-guide',
            'option_name' => 'services_options',
        ]
    ],
    [
        'id'       => 'show_services_section',
        'title'    => __('Show Services Section', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_checkbox_element_callback',
        'page'     => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'show_services_section',
            'option_name' => 'services_options',
        ]
    ],
    [
        'id' => 'services_section_title',
        'title'  => __('Add Section Title', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'services_section_title',
            'option_name' => 'services_options',
        ]
    ],
    [
        'id' => 'services_section_image',
        'title'  => __('Add Section Image', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_image_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'services_section_image',
            'option_name' => 'services_options',
        ]
    ],
    [
        'id' => 'services_section_intro',
        'title'  => __('Add Section Intro', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_textarea_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'services_section_intro',
            'option_name' => 'services_options',
        ]
    ],
    [
        'id' => 'services_section_icon',
        'title'  => __('Add Section Icon', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_section',
        'args'     => [
            'label_for'   => 'services_section_icon',
            'option_name' => 'services_options',
            'placeholder' => 'exapmle: fa-solid fa-house',
            'label'       => 'Enter fontawsome class from (https://fontawesome.com/)'
        ]
    ],
];
$services_dynamic_fields = [
    [
        'id' => 'service_name',
        'title'  => __('Add Service Name *', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_dynamic_section',
        'args'     => [
            'label_for'   => 'service_name',
            'option_name' => 'services_options',
            'section_name'=> 'services_dynamic_section',
            'required'    => 'required',
        ]
    ],
    [
        'id' => 'service_detail',
        'title'  => __('Add Service detail', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_dynamic_section',
        'args'     => [
            'label_for'   => 'service_detail',
            'option_name' => 'services_options',
            'section_name'=> 'services_dynamic_section'
        ]
    ],
    [
        'id' => 'service_description',
        'title'  => __('Add Service Description', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_textarea_element_callback',
        'page'  => 'services_section_content',
        'section'  => 'services_dynamic_section',
        'args'     => [
            'label_for'   => 'service_description',
            'option_name' => 'services_options',
            'section_name'=> 'services_dynamic_section'
        ]
    ],
];
