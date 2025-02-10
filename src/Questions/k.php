<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo '<h1>Afficher les jeux dont le nom débute par « Mario » et dont le rating initial contient "3+" ;!</h1>';