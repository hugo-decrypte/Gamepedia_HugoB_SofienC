<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;


DB::init();
Base::init();

echo "<h1>Lister les jeux dont le nom contient « Marine »</h1>";

$start = microtime(true);

$games = Game::where('name', 'LIKE', '%Marine%')->select("name", "alias", "id")->get();


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

foreach ($games as $game) {
    echo "<tr>" .
        "<td>" . $game->id . "</td>" .
        "<td>" . $game->name . "</td>" .
        "<td>" . $game->alias . "</td>" .
        "</tr>";
}

echo "</tbody></table>";
