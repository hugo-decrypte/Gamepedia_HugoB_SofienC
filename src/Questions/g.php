<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Afficher les personnages des jeux dont le nom (du jeu) débute par « Mario » </h1>";