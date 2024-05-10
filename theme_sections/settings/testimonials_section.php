<?php
$testimonials_settings = [
    'option_group' => 'testimonials_section_content',
    'option_name'  => 'testimonials_options',
    'callback'     => 'testimonials_sanitize_cb'
];

$testimonials_section = [
    [
        'id'       => 'testimonials_section',
        'title'    => __('Clearly communicate the value you offer to clients.', 'mohamdy-portfolio'),
        'callback' => '',
        'page'     => 'testimonials_section_content'
    ],
    [
        'id'       => 'testimonials_dynamic_section',
        'title'    => '',
        'callback' => '',
        'page'     => 'testimonials_section_content',
    ],
];

$testimonials_fields = [
    [
        'id'       => 'testimonials_section_guide',
        'title'    => __('testimonials Section Example', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_section_guide_callback',
        'page'     => 'testimonials_section_content',
        'section'  => 'testimonials_section',
        'args'     => [
            'label_for'   => 'testimonials_section_guide',
            'class'       => 'mohamdy-portfolio-section-guide',
            'option_name' => 'testimonials_options',
        ]
    ],
    [
        'id'       => 'show_testimonials_section',
        'title'    => __('Show testimonials Section', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_checkbox_element_callback',
        'page'     => 'testimonials_section_content',
        'section'  => 'testimonials_section',
        'args'     => [
            'label_for'   => 'show_testimonials_section',
            'option_name' => 'testimonials_options',
        ]
    ],
    [
        'id' => 'testimonials_section_title',
        'title'  => __('Add Section Title', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_section',
        'args'     => [
            'label_for'   => 'testimonials_section_title',
            'option_name' => 'testimonials_options',
            'required'    => 'required'
        ]
    ],
    [
        'id' => 'testimonials_section_icon',
        'title'  => __('Add Section Icon', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_section',
        'args'     => [
            'label_for'   => 'testimonials_section_icon',
            'option_name' => 'testimonials_options',
            'placeholder' => 'exapmle: fa-solid fa-house',
            'label'       => 'Enter fontawsome class from (https://fontawesome.com/)'
        ]
    ],
];
$testimonials_dynamic_fields = [
    [
        'id' => 'client_name',
        'title'  => __('Add Client Name *', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_dynamic_section',
        'args'     => [
            'label_for'   => 'client_name',
            'option_name' => 'testimonials_options',
            'section_name'=> 'testimonials_dynamic_section',
            'required'    => 'required',
            'label'       => 'required'
        ]
    ],
    [
        'id' => 'client_photo',
        'title'  => __('Add Client Image', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_image_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_dynamic_section',
        'args'     => [
            'label_for'   => 'client_photo',
            'option_name' => 'testimonials_options',
            'section_name'=> 'testimonials_dynamic_section'
        ]
    ],
    [
        'id' => 'job_title',
        'title'  => __('Add Job Title', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_text_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_dynamic_section',
        'args'     => [
            'label_for'   => 'job_title',
            'option_name' => 'testimonials_options',
            'section_name'=> 'testimonials_dynamic_section'
        ]
    ],
    [
        'id' => 'client_rate',
        'title'  => __('Add Rate(between 1 and 5)', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_num_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_dynamic_section',
        'args'     => [
            'label_for'   => 'client_rate',
            'option_name' => 'testimonials_options',
            'section_name'=> 'testimonials_dynamic_section',
            'min'         => 1,
            'max'         => 5,
            'label'       => 'Optional'
        ]
    ],
    [
        'id' => 'client_review',
        'title'  => __('Add Client review', 'mohamdy-portfolio'),
        'callback' => 'mohamdy_portfolio_textarea_element_callback',
        'page'  => 'testimonials_section_content',
        'section'  => 'testimonials_dynamic_section',
        'args'     => [
            'label_for'   => 'client_review',
            'option_name' => 'testimonials_options',
            'section_name'=> 'testimonials_dynamic_section',
        ]
    ],
];
