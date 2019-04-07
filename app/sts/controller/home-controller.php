<?php
use Core\Template;

class HomeController {
        function index () {
            $tpl = new Template(ABS_PATH.'\app\sts\view\home\home.html');
            $tpl->csslink = ABS_PATH . '\app\sts\view\home\style\home.css';
            $tpl->show();
        }
    }