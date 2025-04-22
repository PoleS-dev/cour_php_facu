
<h2> Difference entre php procedural et le POO</h2>

<ul>
    <li>
        Le php procédural est un language de programation qui n'a pas de classes, de méthodes, de propriétés, de constructeurs, etc.
    </li>
    <li>
        le PHP procédural est un code écris ligne par ligne avec des fonctions et des variable globales.
    </li>
    <li> C'est un enchaînement d'instructions, comme une recette de cuisine.</li>
</ul>

<p>
    Exemple
</p>
<?php

$nom = "Ousmane";
$age = 8;

function direBonjour($a, $b) {
    echo "Bonjour " . $a . " et tu as " . $b . " ans <br>";
}

 direBonjour($nom, $age);

// Avantages :
// Simple à comprendre

// Rapide pour les petits scripts

// Facile à démarrer

// Variables globales → collisions, erreurs




?>
