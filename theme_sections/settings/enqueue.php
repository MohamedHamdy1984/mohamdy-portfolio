<?php 
if (!function_exists('mohamdy_portfolio_admin_load_assets')) {
    function mohamdy_portfolio_admin_load_assets()
    {
        global $parent_file;
        global $base;
        if ('saqr_options' != $parent_file) {
            return;
        }

        wp_enqueue_style('mohamdy-portfolio_w3_css', $base . 'theme_sections/settings/css/w3.css', [], null);
        wp_enqueue_style('mohamdy-portfolio_w3_css_colors', $base . 'theme_sections/settings/css/w3-colors-flat.css', [], null);
        wp_enqueue_style('mohamdy-portfolio_sections_style', $base . 'theme_sections/settings/css/settings-style.css', [], null);
        

        wp_enqueue_script('mohamdy-portfolio_images', $base . 'theme_sections/settings/js/sections_settings.js', [], null, true);
        wp_enqueue_media();

    }
    add_action('admin_enqueue_scripts', 'mohamdy_portfolio_admin_load_assets');
}