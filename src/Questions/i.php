<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;
use gamepedia\models\Game_rating;
use gamepedia\models\Rating_board;

DB::init();
Base::init();

echo "<h1>Afficher le rating initial (indiquer le rating board) des jeux dont le nom contient « Mario »</h1>";

$start = microtime(true);
// Fetch games with their rating and rating board
$games = Game::with("game2Rating")
    ->with("game2Rating.gameRating.ratingBoard")
    ->where("name", "LIKE", "%Mario%")
    ->get();

$end = microtime(true);
$duration = $end - $start;
echo "<center>La requête a pris " . round($duration * 1000, 2) . " ms.</center>";


echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>Nom du jeu</th>
            <th>Rating</th>
            <th>Rating Board Name</th>
            <th>Rating Board Deck</th>       
        </tr>
    </thead>
    <tbody>";

foreach ($games as $game) {
    foreach ($game->game2rating as $game2rating) {
        echo "<tr>
                <td>" . htmlspecialchars($game->name) . "</td>
                <td>" . htmlspecialchars($game2rating->gameRating->name) . "</td>
                <td>" . htmlspecialchars($game2rating->gameRating->ratingBoard->name) . "</td>
                <td>" . htmlspecialchars($game2rating->gameRating->ratingBoard->deck) . "</td>
              </tr>";
    }

}
echo "</tbody></table>";
