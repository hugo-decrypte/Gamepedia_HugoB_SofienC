<?php

namespace gamepedia\configuration;

use gamepedia\configuration\config;
use Illuminate\Database\Capsule\Manager as Capsule;

class DB {

    //création de la base à partir du fichier .ini
    public static function init(): void {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => Config::get('host', 'database'),
            'database'  => Config::get('database', 'database'),
            'username'  => Config::get('user', 'database'),
            'password'  => Config::get('password', 'database'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        echo "Connexion réussi";
    }
}
