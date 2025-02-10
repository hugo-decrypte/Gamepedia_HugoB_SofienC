<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();


echo '<h1>Afficher les jeux dont le nom débute par « Mario » et dont le rating initial contient "3+" ;!</h1>';