<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();


echo "<h1>Afficher les jeux développés par une compagnie dont le nom contient « Sony » ;</h1>";