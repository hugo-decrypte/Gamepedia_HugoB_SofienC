<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();

echo "<h1>Afficher les personnages des jeux dont le nom (du jeu) débute par « Mario » </h1>";