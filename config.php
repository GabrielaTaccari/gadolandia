<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gadolandia');
define('DB_USER', 'Gabriela');
define('DB_PASS', '897612');


define('ABS_PATH', dirname(__FILE__));
if(isset( $_SERVER['HTTPS']))
    define('HOME_URI', 'https://'.$_SERVER['HTTP_HOST'].'/gadolandia');
else
    define('HOME_URI', 'http://' . $_SERVER['HTTP_HOST'] . '/gadolandia');

define('DEBUG', true);

require_once(ABS_PATH.'loader.php');