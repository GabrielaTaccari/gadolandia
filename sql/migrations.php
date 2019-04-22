<?php

    require "../bootstrap.php";

    use Illuminate\Database\Capsule\Manager as ORM;

    ORM::schema()->create('usuario', function ($table){
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('senha');
        $table->rememberToken();
        $table->timestamps();
    });
