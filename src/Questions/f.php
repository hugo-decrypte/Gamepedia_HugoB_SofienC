<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;
use gamepedia\models\Personnage;


DB::init();
Base::init();


echo "<h1>Afficher (name , deck) les personnages du jeu 12342 ;</h1>";

$persos = Personnage::select("name", "deck")->whereHas("game2character", function ($query) {
    $query->where("game_id", "=", 12342);
})->get();

echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Deck</th>
        </tr>
    </thead>
    <tbody>";

foreach ($persos as $perso) {
    echo "<tr>" .
        "<td>" . $perso->name . "</td>" .
        "<td>" . $perso->deck . "</td>" .
        "</tr>";
}

echo "</tbody></table>";