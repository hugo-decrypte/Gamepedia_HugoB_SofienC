<?php

namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;
use gamepedia\models\Game2character;


DB::init();
Base::init();


echo "<h1>Afficher les jeux dont le nom débute par « Mario » et ayant plus de 3 personnages ;</h1>";


$start = microtime(true);

$gamesMario3 = Game::where('name', 'like', 'Mario%')
    ->whereHas('game2Character', function ($query) {
        $query->groupBy('game_id')
            ->havingRaw('count(*)> 3');
    })
    ->withCount('game2Character')
    ->select("id","name","deck")
    ->get();

$end = microtime(true);
$duration = $end - $start;
echo "<center>La requête a pris " . round($duration * 1000, 2) . " ms.</center>";

echo "<table border='1' style='border-collapse: collapse; margin: 20px auto;'>

    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Deck</th>
    </tr>
    </thead>
    <tbody>";

foreach ($gamesMario3 as $game) {
    echo "<tr>
        <td>" . htmlspecialchars($game->id) . "</td>
        <td>" . htmlspecialchars($game->name) . "</td>
        <td>" . htmlspecialchars($game->deck) . "</td>
    </tr>";
}