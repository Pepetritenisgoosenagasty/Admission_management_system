<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once "config/config.php";
require_once 'helpers/format_helper.php';

function __autoload($class_name)
{
    require_once 'libraries/'.$class_name.'.php';
}

$db = new Database;

$user = new User;
