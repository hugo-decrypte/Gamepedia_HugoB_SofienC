<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;


DB::init();
Base::init();


echo '<h1>Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc », dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé « CERO » ;</h1>';