<?php

function mohamdy_portfolio_sanitize($control_field)
{
    return wp_kses($control_field, [
        'a' => [
            'href' => []
        ]
    ]);
}


