<?php

function mohamdy_sanitize($control_field)
{
    return wp_kses($control_field, [
        'a' => [
            'href' => []
        ]
    ]);
}


