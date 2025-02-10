<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo "<h1>Lister les plateformes dont la base installée est >= 10 000 000 ;</h1>";