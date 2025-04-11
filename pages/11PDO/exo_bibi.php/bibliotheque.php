<?php
// Liste des 20 exercices PDO sur la base "bibliotheque"
$exercices = [
    "Afficher tous les livres de la base (titre, année, genre).",
    "Afficher le nom de tous les auteurs triés par ordre alphabétique.",
    "Récupérer les informations du livre avec l'id = 2.",
    "Afficher tous les membres inscrits avant une date donnée (ex : 2025-04-05).",
    "Afficher uniquement les titres des livres publiés après l'année 1950.",
    "Afficher les livres d’un auteur donné (nom passé en variable).",
    "Afficher tous les emprunts d’un membre (par email).",
    "Afficher les livres correspondant à un genre donné.",
    "Afficher les membres ayant emprunté un livre spécifique (par titre).",
    "Afficher les emprunts effectués entre deux dates données.",
    "Ajouter un nouveau membre avec son nom et email.",
    "Ajouter un nouveau livre avec son titre, année, genre et auteur.",
    "Ajouter un nouvel emprunt pour un membre et un livre donnés.",
    "Modifier l’email d’un membre existant (UPDATE).",
    "Supprimer un livre par son ID (DELETE).",
    "Afficher tous les emprunts avec : nom du membre, titre du livre, nom de l’auteur, date.",
    "Afficher tous les livres avec le nom de leur auteur (jointure).",
    "Afficher les livres qui n’ont jamais été empruntés.",
    "Afficher les membres qui n’ont jamais emprunté de livre.",
    "Afficher le nombre de livres empruntés par chaque membre."
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
