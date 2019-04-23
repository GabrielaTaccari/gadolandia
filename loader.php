<?php
    use core\Gadolandia;

    if(!defined('ABS_PATH'))
        exit;
        
    session_start();

    if(!defined('DEBUG')||DEBUG === false) {
        error_reporting(0);
        ini_set('display_error', 0);
    } else {
        error_reporting(E_ALL);
        ini_set('display_error', 1);
    }

    
    require_once __DIR__ . '/core/functions/date-functions.php';
    require_once __DIR__ . '/core/functions/other-functions.php';
    require_once __DIR__ . '/core/functions/array-functions.php';
    require_once __DIR__ . '/core/functions/global-functions.php';
    require_once __DIR__ . '/core/functions/string-functions.php';
    require_once __DIR__ . '/vendor/autoload.php';

    $gadolandia = new Gadolandia();


