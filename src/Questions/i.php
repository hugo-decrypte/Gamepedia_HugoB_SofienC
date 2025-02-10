<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();


echo "<h1>Afficher le rating initial (indiquer le rating board) des jeux dont le nom contient « Mario » ;</h1>";