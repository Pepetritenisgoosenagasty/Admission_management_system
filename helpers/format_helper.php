<?php
/*
 * Date Format
 */
function formatDate($date)
{
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
}

/*
 * Redirect To Page
*/
function redirect($page = false, $message = null, $message_type = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER ['SCRIPT_NAME'];
    }
}

function serial_number($length)
{
    $key = '';
    $keys = array_merge(range(0, 9), range('A', 'Z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function pin_code($length)
{
    $key = '';
    $keys = range(0, 9);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function security_code($length)
{
    $key = '';
    $keys = array_merge(range(0, 9), range('A', 'Z'), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function pass()
{
    echo 'string';
}
