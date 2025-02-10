<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Afficher les jeux dont le nom débute par « Mario » et ayant plus de 3 personnages ;</h1>";