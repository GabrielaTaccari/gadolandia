<?php

    class Gado extends ActiveRecord\Model{
        public static $table_name='gado';
        public static $belongs_to = [
            ['relacionamento', 'class_name'=>'Relacionamento', 'foreign_key'=>'gado_id']
        ];
    }