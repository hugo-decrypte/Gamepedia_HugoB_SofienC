<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();

echo "<h1>Lister les plateformes dont la base installée est >= 10 000 000 ;</h1>";