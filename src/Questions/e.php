<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Lister les jeux, afficher leur nom et deck, en paginant (taille des pages à 300) ;</h1>";