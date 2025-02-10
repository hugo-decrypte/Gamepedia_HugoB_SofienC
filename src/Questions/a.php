<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Lister les jeux dont le nom contient « Marine »</h1>";