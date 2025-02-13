<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;


DB::init();
Base::init();


echo "<h1>Afficher les jeux développés par une compagnie dont le nom contient « Sony » ;</h1>";

$start = microtime(true);

$games = Game::whereHas("gameDeveloper", function ($query) {
    $query->whereHas("company", function ($query) {
        $query->where("name", "LIKE", "%Sony%");
    });
})
->select("name", "alias", "id")
->get();

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