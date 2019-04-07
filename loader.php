<?php
    require __DIR__ . '/vendor/autoload.php';

    if(!defined('ABS_PATH'))
        exit;
        
    session_start();

    ActiveRecord\Config::initialize(
        function ($cfg) {
            $cfg->set_model_directory(__DIR__ . '/app/sts/model');
            $cfg->set_connections(
                ['development' => 'mysql://' . USER . ':' . SENHA . '@' . HOST . '/' . DATABASE]
            );
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

    $gadolandia = new Gadolandia();