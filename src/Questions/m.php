<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;


DB::init();
Base::init();

echo '<h1>Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc », dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé « CERO » ;</h1>';

$start = microtime(true);
$games = Game::whereHas("game2rating", function ($q) {
    $q->whereHas("gameRating", function ($q) {
        $q->where("name", "like", "%3+%");
    });
})
    ->whereHas("gamePublisher", function ($q) {
        $q->whereHas("company", function ($q) {
            $q->where("name", "like", "%Inc%");
        });
    })
    ->where("name", "like", "%Mario%")
    ->select("name")
    ->get();

$end = microtime(true);
$duration = $end - $start;
echo "<center>La requête a pris " . round($duration * 1000, 2) . " ms.</center>";


echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>Nom du jeu</th>
        </tr>
    </thead>
    <tbody>";

foreach ($games as $game) {
    echo "<tr>
                <td>" . htmlspecialchars($game->name) . "</td>
              </tr>";
}
echo "</tbody></table>";