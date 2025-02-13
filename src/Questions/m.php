<?php

namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;

// Assurez-vous d'importer le modèle Game

DB::init();
Base::init();

echo '<h1>Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc », dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé « CERO » ;</h1>';

$start = microtime(true);


$games = Game::with([
    // besoin de la compagnie du développeur
    'game_developers.company',
    // et besoin des infos du rating board
    'game2rating.game_rating.rating_board'
])
    //jeux qui commence par Mario
    ->where('name', 'like', 'Mario%')
    //filtre pour compagnie Inc
    ->whereHas('game_publishers.company', function ($query) {
        $query->where('name', 'like', '%Inc%');
    })
    //filtre pour le rating 3+
    ->whereHas('game2rating.game_rating', function ($query) {
        $query->where('name', 'like', '%3+%');
    })
    //filtre pour le rating board CERO
    ->whereHas('game2rating.game_rating.rating_board', function ($query) {
        $query->where('name', 'CERO');
    })
    ->get();


$end = microtime(true);
$duration = $end - $start;
echo "<center>L'ensemble des opérations ont pris " . round($duration * 1000, 2) . " ms.</center>";

echo "<table border='1' style='border-collapse: collapse; margin: 20px auto;'>

    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Deck</th>
    </tr>
    </thead>
    <tbody>";

foreach ($games as $game) {
    echo "<tr>
        <td>" . htmlspecialchars($game->id) . "</td>
        <td>" . htmlspecialchars($game->name) . "</td>
        <td>" . htmlspecialchars($game->deck) . "</td>
    </tr>";
}

