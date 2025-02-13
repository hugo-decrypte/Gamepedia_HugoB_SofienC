<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Company;
use gamepedia\models\Platform;


DB::init();
Base::init();

echo "<h1>Lister les plateformes dont la base installée est >= 10 000 000 ;</h1>";

$start = microtime(true);

$platforms = Platform::where('install_base','>=' ,'10000000')->select("name", "alias", "id")->get();

$end = microtime(true);
$duration = $end - $start;
echo "<center>La requête a pris " . round($duration * 1000, 2) . " ms.</center>";

echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Alias</th>
        </tr>
    </thead>
    <tbody>";

foreach ($platforms as $platform) {
    echo "<tr>" .
        "<td>" . $platform->id . "</td>" .
        "<td>" . $platform->name . "</td>" .
        "<td>" . $platform->alias . "</td>" .
        "</tr>";
}

echo "</tbody></table>";