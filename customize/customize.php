<?php
require 'customize_footer.php';
require 'customize_home_section.php';
require 'sanitize_field.php';



if(!function_exists('mohamdy_portfolio_customize_register')){
    function mohamdy_portfolio_customize_register($wp_customize){

        customize_footer($wp_customize);

        customize_home_section($wp_customize);


    }
    add_action('customize_register', 'mohamdy_portfolio_customize_register');
}

