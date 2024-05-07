<?php
add_action('admin_menu', function () {

    add_menu_page(
        __('SAQR options', 'mohamdy'),
        __('SAQR options', 'mohamdy'),
        'manage_options',
        'saqr_options',
        'mohamdy_saqr_page_cb',
        'dashicons-admin-generic',
        62
    );
    add_submenu_page(
        'saqr_options',
        __('Services settings', 'mohamdy'),
        __('Services settings', 'mohamdy'),
        'manage_options',
        'services_settings',
        'mohamdy_services_page_cb',
        1
    );
    add_submenu_page(
        'saqr_options',
        __('Testimonials settings', 'mohamdy'),
        __('Testimonials settings', 'mohamdy'),
        'manage_options',
        'testimonials_settings',
        'mohamdy_testimonials_page_cb',
        2
    );
    add_submenu_page(
        'saqr_options',
        __('Statistics settings', 'mohamdy'),
        __('Statistics settings', 'mohamdy'),
        'manage_options',
        'statistics_settings',
        'mohamdy_statistics_page_cb',
        3
    );
});

