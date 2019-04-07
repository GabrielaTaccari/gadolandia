<?php
    require __DIR__.'/vendor/autoload.php';

    define('HOST', 'localhost');
    define('DATABASE', 'gadolandia');
    define('USER', 'Gabriela');
    define('SENHA', '897612');
    
    ActiveRecord\Config::initialize(
        
        function ($cfg) {
            $cfg->set_model_directory( __DIR__ . '/app/sts/model');
            $cfg->set_connections(
                ['development' => 'mysql://' . USER . ':' . SENHA . '@' . HOST . '/' . DATABASE]
            );
        }
    );
    ActiveRecord\Config::initialize(function ($cfg) {
        $cfg->set_default_connection('development');
    });

    // $conexao = new \ActiveRecord\Conn();
    // $gado = new Gado();
    // $gado->nome='Vitor';
    // $gado->email='vitor.biansil@gmail.com';
    // $gado->senha='souviado123';
    // $gado->save();
    $nome = 'Vitor';
    $gado = Gado::find('all', ['conditions'=>['nome=?', $nome]]);
    //echo dirname(__FILE__) . '/rola.html';
    $tpl = new Core\Template(dirname(__FILE__).'\\rola.html');
    $tpl->gadinho=$gado;
    $tpl->show();


    
    