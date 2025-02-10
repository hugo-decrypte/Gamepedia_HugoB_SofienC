<?php
namespace gamepedia\Quest;

require_once __DIR__ . '/../../vendor/autoload.php';

use gamepedia\configuration\Base;
use gamepedia\configuration\DB;
use gamepedia\models\Company;
use gamepedia\models\Game;


DB::init();
Base::init();


echo "<h1>Lister les compagnies installées en France ;</h1>";

$companies = Company::where('location_country','like' ,'%France%')->select("name", "alias", "id", "location_country")->get();

echo "<table border='1' style='border-collapse: collapse;'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Alias</th>
            <th>country</th>
        </tr>
    </thead>
    <tbody>";

foreach ($companies as $company) {
    echo "<tr>" .
        "<td>" . $company->id . "</td>" .
        "<td>" . $company->name . "</td>" .
        "<td>" . $company->alias . "</td>" .
        "<td>" . $company->location_country . "</td>" .
        "</tr>";
}

echo "</tbody></table>";