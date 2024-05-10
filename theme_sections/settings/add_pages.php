<?php
add_action('admin_menu', function () {

    add_menu_page(
        __('SAQR options', 'mohamdy-portfolio'),
        __('SAQR options', 'mohamdy-portfolio'),
        'manage_options',
        'saqr_options',
        'mohamdy_portfolio_saqr_page_cb',
        'dashicons-admin-generic',
        62
    );
    add_submenu_page(
        'saqr_options',
        __('Services settings', 'mohamdy-portfolio'),
        __('Services settings', 'mohamdy-portfolio'),
        'manage_options',
        'services_settings',
        'mohamdy_portfolio_services_page_cb',
        1
    );
    add_submenu_page(
        'saqr_options',
        __('Testimonials settings', 'mohamdy-portfolio'),
        __('Testimonials settings', 'mohamdy-portfolio'),
        'manage_options',
        'testimonials_settings',
        'mohamdy_portfolio_testimonials_page_cb',
        2
    );
    add_submenu_page(
        'saqr_options',
        __('Statistics settings', 'mohamdy-portfolio'),
        __('Statistics settings', 'mohamdy-portfolio'),
        'manage_options',
        'statistics_settings',
        'mohamdy_portfolio_statistics_page_cb',
        3
    );
});

