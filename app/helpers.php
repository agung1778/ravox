<?php

use App\Models\Setting;

function setting($field, $default = null)
{
    $settings = Setting::first();

    return $settings->{$field}
        ?? $default;
}