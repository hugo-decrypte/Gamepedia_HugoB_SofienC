<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Personnage;


DB::init();
Base::init();

echo "<h1>Afficher les personnages des jeux dont le nom (du jeu) débute par « Mario » </h1>";

$persos = Personnage::select("id","name", "deck")->whereHas("game2character", function ($query) {
    $query->whereHas("game", function ($query) {
        $query->where("name", "LIKE", "Mario%");
    });
})->orderBy("id")
    ->get();

echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Deck</th>
        </tr>
    </thead>
    <tbody>";

foreach ($persos as $perso) {
    echo "<tr>" .
        "<td>" . $perso->id . "</td>" .
        "<td>" . $perso->name . "</td>" .
        "<td>" . $perso->deck . "</td>" .
        "</tr>";
}

echo "</tbody></table>";