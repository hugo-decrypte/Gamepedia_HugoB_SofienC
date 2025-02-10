<?php
use gamepedia\configuration\DB;
use gamepedia\configuration\Base;
Base::init();
DB::init();

echo '<h1>Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc », dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé « CERO » ;</h1>';