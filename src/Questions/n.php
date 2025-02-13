<?php

namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;
use gamepedia\models\Game2genre;
use gamepedia\models\Genre;

DB::init();
Base::init();

echo "<h1>Ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 345.</h1>";

try {

    $start = microtime(true);

    //création du nouveau genre
    $newGenre = Genre::create([
        'name' => 'Roguelike',
        'deck' => 'Un genre basé sur la génération procédurale de niveaux dans lequel le joueur évolue et explore',
        'description' => 'Les jeux Roguelike sont caractérisés par la génération aléatoire des niveaux et une mort permanente du personnage.'
    ]);

    if (!$newGenre) {
        throw new Exception("La création du genre a échoué.");
    }

    echo "<center><p>Le genre <strong>{$newGenre->name}</strong> vient d'être ajouté</p></center>";

    // Liste des jeux à associer
    $jeux = [12, 56, 345];

    foreach ($jeux as $id) {
        Game2genre::create([
            'game_id' => $id,
            'genre_id' => $newGenre->id
        ]);
        echo "<center><p>Le genre <strong>{$newGenre->name}</strong> est associé au jeu ID : $id</p></center>";
    }

    // Vérification de l'association
    echo "<center><h2>Vérification : Liste des jeux associés au genre '{$newGenre->name}'</h2></center>";

    $jeuxRoguelike = Game::whereHas('game2genre', function ($query) use ($newGenre) {
        $query->where('genre_id', '=', $newGenre->id);
    })->get();


    if ($jeuxRoguelike->isEmpty()) {
        echo "<p>Aucun jeu trouvé avec le genre Roguelike</p>";
    } else {
        echo "<table border='1' style='border-collapse: collapse; margin: 20px auto;'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Deck</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($jeuxRoguelike as $game) {
            echo "<tr>
                <td>" . htmlspecialchars($game->id) . "</td>
                <td>" . htmlspecialchars($game->name) . "</td>
                <td>" . htmlspecialchars($game->deck) . "</td>
            </tr>";
        }

        echo "</tbody></table>";
    }

} catch (Exception $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
}

$end = microtime(true);
$duration = $end - $start;
echo "<center>L'ensemble des opérations ont pris " . round($duration * 1000, 2) . " ms.</center>";

