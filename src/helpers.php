<?php

function iawc_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function iawc($key = null, $default = null)
{
    return iconfig('iawc' . ($key ? ".$key" : ''), $default);
}
