<?php

namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Game;

DB::init();
Base::init();

echo "<h1>Lister les jeux, afficher leur nom et deck, en paginant (taille des pages à 300)</h1>";

// Taille de la page
$taille = 300;

// Page courante
$page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;

// Calcul de l'offset
$elementIgnore = ($page - 1) * $taille;

// Récupérer les jeux pour la page actuelle
$games = Game::select('id', 'name', 'deck')
->skip($elementIgnore)
->take($taille)
->get();

// Calcul des pages totales
$totalGames = Game::count();
$totalPages = ceil($totalGames / $taille);

echo "<div style='text-align: center; margin: 20px;'>";

    // Boutons premiere et precedent
    if ($page > 1) {
    echo "<a href='?page=1' style='margin-right: 10px;'>Première</a>";
    echo "<a href='?page=" . ($page - 1) . "' style='margin-right: 10px;'>Précédent</a>";
    }

    // Boutons suivant et derniere
    if ($page < $totalPages) {
    echo "<a href='?page=" . ($page + 1) . "' style='margin-right: 10px;'>Suivant</a>";
    echo "<a href='?page=$totalPages'>Dernière</a>";
    }
    echo "</div>";



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

    echo "</tbody></table>";
