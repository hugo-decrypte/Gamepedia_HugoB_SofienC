<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Afficher les jeux développés par une compagnie dont le nom contient « Sony » ;</h1>";