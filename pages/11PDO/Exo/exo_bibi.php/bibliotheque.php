<?php
// Liste des 20 exercices PDO sur la base "bibliotheque"
$exercices = [
    "1 Afficher tous les livres de la base (titre, année, genre).",
    "2 Afficher le nom de tous les auteurs triés par ordre alphabétique.",
    "3 Récupérer les informations du livre avec l'id = 2.",
    "4 Afficher tous les membres inscrits avant une date donnée (ex : 2025-04-05).",
    "5 Afficher uniquement les titres des livres publiés après l'année 1950.",
    "6 Afficher les livres d’un auteur donné (nom passé en variable).",
    "7 Afficher tous les emprunts d’un membre (par email).",
    "8 Afficher les livres correspondant à un genre donné.",
    "9 Afficher les membres ayant emprunté un livre spécifique (par titre).",
    "10 Afficher les emprunts effectués entre deux dates données.",
    "11 Ajouter un nouveau membre avec son nom et email.",
    "12 Ajouter un nouveau livre avec son titre, année, genre et auteur.",
    "13 Ajouter un nouvel emprunt pour un membre et un livre donnés.",
    "14 Modifier l’email d’un membre existant (UPDATE).",
    "15 Supprimer un livre par son ID (DELETE).",
    "16 Afficher tous les emprunts avec : nom du membre, titre du livre, nom de l’auteur, date.",
    "17 Afficher tous les livres avec le nom de leur auteur (jointure).",
    "18 Afficher les livres qui n’ont jamais été empruntés.",
    "19 Afficher les membres qui n’ont jamais emprunté de livre.",
    "20 Afficher le nombre de livres empruntés par chaque membre."
];

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Énoncés des Exercices PDO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #336699; }
        ul { line-height: 1.6; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>

<h1>📘 Exercices PDO - Bibliothèque</h1>
<ol>
    <?php foreach ($exercices as $i => $exo): ?>
        <li><strong>Exercice <?= $i + 1 ?> :</strong> <?= $exo ?></li>
    <?php endforeach; ?>
</ol>

</body>
</html>
