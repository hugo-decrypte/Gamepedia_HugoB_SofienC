<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;


DB::init();
Base::init();


echo "<h1>Afficher les jeux développés par une compagnie dont le nom contient « Sony » ;</h1>";

$games = Game::whereHas("game_developers", function ($query) {
    $query->whereHas("company", function ($query) {
        $query->where("name", "LIKE", "%Sony%");
    });
})
->select("name", "alias", "id")
->get();

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