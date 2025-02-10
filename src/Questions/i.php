<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Afficher le rating initial (indiquer le rating board) des jeux dont le nom contient « Mario » ;</h1>";