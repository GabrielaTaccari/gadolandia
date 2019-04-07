<?php
    require __DIR__ . '/vendor/autoload.php';

    if(!defined('ABS_PATH'))
        exit;
        
    session_start();

    ActiveRecord\Config::initialize(
        function ($cfg) {
            $cfg->set_model_directory(DIR . '/../models');
            $cfg->set_connections(array(
                'development' => 'mysql://' . DB_USER . ':' . DB_PASSWORD . '@' . DB_HOST . '/' . DB_NAME . '?charset=' . DB_CHARSET
            ));

            ActiveRecord\DateTime::$DEFAULT_FORMAT = 'd/m/Y H:i:s';
            date_default_timezone_set('America/Sao_Paulo');
        }
    );
    ActiveRecord\Config::initialize(function ($cfg) {
        $cfg->set_default_connection('development');
    });
    if(!defined('DEBUG')||DEBUG === false) {
        error_reporting(0);
        ini_set('display_error', 0);
    } else {
        error_reporting(E_ALL);
        ini_set('display_error', 1);
    }

    $gadolandia = new Core\Gadolandia();