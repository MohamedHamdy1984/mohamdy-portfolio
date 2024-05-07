<?php
$statistics_settings = [
    'option_group' => 'statistics_section_content',
    'option_name'  => 'statistics_options',
    'callback'     => 'statistics_sanitize_cb'
];

$statistics_section = [
    [
        'id'       => 'statistics_section',
        'title'    => __('Clearly communicate the value you offer to clients.', 'mohamdy'),
        'callback' => '',
        'page'     => 'statistics_section_content'
    ],
    [
        'id'       => 'statistics_dynamic_section',
        'title'    => '',
        'callback' => '',
        'page'     => 'statistics_section_content',
    ],
];

$statistics_fields = [
    [
        'id'       => 'statistics_section_guide',
        'title'    => __('statistics Section Example', 'mohamdy'),
        'callback' => 'mohamdy_section_guide_callback',
        'page'     => 'statistics_section_content',
        'section'  => 'statistics_section',
        'args'     => [
            'label_for'   => 'statistics_section_guide',
            'class'       => 'mohamdy-section-guide',
            'option_name' => 'statistics_options',
        ]
    ],
    [
        'id'       => 'show_statistics_section',
        'title'    => __('Show statistics Section', 'mohamdy'),
        'callback' => 'mohamdy_checkbox_element_callback',
        'page'     => 'statistics_section_content',
        'section'  => 'statistics_section',
        'args'     => [
            'label_for'   => 'show_statistics_section',
            'option_name' => 'statistics_options',
        ]
    ],
    [
        'id' => 'statistics_section_title',
        'title'  => __('Add Section Title', 'mohamdy'),
        'callback' => 'mohamdy_text_element_callback',
        'page'  => 'statistics_section_content',
        'section'  => 'statistics_section',
        'args'     => [
            'label_for'   => 'statistics_section_title',
            'option_name' => 'statistics_options',
            'required'    => 'required'
        ]
    ],
    [
        'id' => 'statistics_section_icon',
        'title'  => __('Add Section Icon', 'mohamdy'),
        'callback' => 'mohamdy_text_element_callback',
        'page'  => 'statistics_section_content',
        'section'  => 'statistics_section',
        'args'     => [
            'label_for'   => 'statistics_section_icon',
            'option_name' => 'statistics_options',
            'placeholder' => 'exapmle: fa-solid fa-house',
            'label'       => 'Enter fontawsome class from (https://fontawesome.com/)'
        ]
    ],
];
$statistics_dynamic_fields = [
    [
        'id' => 'statistic_name',
        'title'  => __('Add Statistic Name *', 'mohamdy'),
        'callback' => 'mohamdy_text_element_callback',
        'page'  => 'statistics_section_content',
        'section'  => 'statistics_dynamic_section',
        'args'     => [
            'label_for'   => 'statistic_name',
            'option_name' => 'statistics_options',
            'section_name'=> 'statistics_dynamic_section',
            'required'    => 'required',
            'label'       => 'required'
        ]
    ],
    [
        'id' => 'statistic',
        'title'  => __('Add statistic', 'mohamdy'),
        'callback' => 'mohamdy_num_element_callback',
        'page'  => 'statistics_section_content',
        'section'  => 'statistics_dynamic_section',
        'args'     => [
            'label_for'   => 'statistic',
            'option_name' => 'statistics_options',
            'section_name'=> 'statistics_dynamic_section',
            'min'         => 1,
            'required'    => 'required',
            'label'       => 'required'
        ]
    ],
    [
        'id' => 'statistic_icon',
        'title'  => __('Add statistic Icon', 'mohamdy'),
        'callback' => 'mohamdy_text_element_callback',
        'page'  => 'statistics_section_content',
        'section'  => 'statistics_dynamic_section',
        'args'     => [
            'label_for'   => 'statistic_icon',
            'option_name' => 'statistics_options',
            'section_name'=> 'statistics_dynamic_section',
            'placeholder' => 'exapmle: fa-solid fa-house',
            'label'       => 'Enter fontawsome class from (https://fontawesome.com/)'
        ]
    ],
];
