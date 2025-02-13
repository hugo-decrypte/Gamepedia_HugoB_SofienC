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

$games = Game::where('name', 'LIKE', '%Marine%') // filtre des nom ayant Marine
    ->select("name", "alias", "id") // selectionne seulement les lignes "name", "alias" et "id"
    ->get();


$end = microtime(true);
$duration = $end - $start;
echo "<center>La requête a pris " . round($duration * 1000, 2) . " ms.</center>";

// première ligne du tableau
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
    // affiche tout les elements selectionner pour chaque ligne
    echo "<tr>" .
        "<td>" . $game->id . "</td>" .
        "<td>" . $game->name . "</td>" .
        "<td>" . $game->alias . "</td>" .
        "</tr>";
}

echo "</tbody></table>";
