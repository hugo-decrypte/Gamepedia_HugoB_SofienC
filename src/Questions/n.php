<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();


echo "<h1>Ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 12, 345.</h1>";