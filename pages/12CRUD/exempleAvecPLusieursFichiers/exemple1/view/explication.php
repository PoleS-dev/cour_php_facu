<?php
/**
 * COURS : Requêtes PDO avec jointures (INNER JOIN / LEFT JOIN) et requêtes imbriquées
 *
 * Objectif : apprendre à faire des jointures entre plusieurs tables
 * avec PDO pour afficher des données combinées de manière dynamique,
 * et comprendre le principe des requêtes imbriquées (ou sous-requêtes).
 *
 * Une jointure permet de croiser des données provenant de plusieurs tables reliées entre elles
 * par des clés étrangères. Cela permet d'afficher par exemple un employé avec le nom de son poste.
 *
 * Une requête imbriquée (ou sous-requête) est une requête SQL incluse dans une autre. Elle permet,
 * par exemple, de filtrer les résultats selon une condition calculée dynamiquement (ex : obtenir le dernier id).
 */

// Connexion à la base de données avec PDO
$host = 'localhost';
$db   = 'ma_base';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs SQL sous forme d'exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Les résultats seront retournés sous forme de tableau associatif
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Connexion à la base de données
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

/**
 * EXEMPLE DE SCÉNARIO
 *
 * Table "employes":
 *  - id
 *  - nom
 *  - poste_id (clé étrangère faisant référence à postes.id)
 *
 * Table "postes":
 *  - id
 *  - titre
 *
 * Un employé peut avoir un poste, mais ce n'est pas obligatoire.
 */

/**
 * INNER JOIN : affiche seulement les employés qui ont un poste attribué
 */
$sql = "SELECT employes.nom, postes.titre AS poste
        FROM employes
        INNER JOIN postes ON employes.poste_id = postes.id";

$stmt = $pdo->query($sql);
$employes = $stmt->fetchAll();

echo "<h2>Liste des employés avec INNER JOIN</h2><ul>";
foreach ($employes as $emp) {
    echo "<li>" . htmlspecialchars($emp['nom']) . " - Poste : " . htmlspecialchars($emp['poste']) . "</li>";
}
echo "</ul>";

/**
 * LEFT JOIN : affiche tous les employés, même ceux qui n'ont pas de poste
 */
$sql2 = "SELECT employes.nom, postes.titre AS poste
         FROM employes
         LEFT JOIN postes ON employes.poste_id = postes.id";

$stmt2 = $pdo->query($sql2);
$employes_complet = $stmt2->fetchAll();

echo "<h2>Liste des employés avec LEFT JOIN</h2><ul>";
foreach ($employes_complet as $emp) {
    $poste = $emp['poste'] ? $emp['poste'] : 'Aucun poste';
    echo "<li>" . htmlspecialchars($emp['nom']) . " - Poste : " . htmlspecialchars($poste) . "</li>";
}
echo "</ul>";

/**
 * WHERE avec LEFT JOIN : afficher uniquement les employés sans poste
 */
$sql3 = "SELECT employes.nom
         FROM employes
         LEFT JOIN postes ON employes.poste_id = postes.id
         WHERE postes.id IS NULL";

$stmt3 = $pdo->query($sql3);
$employes_sans_poste = $stmt3->fetchAll();

echo "<h2>Employés sans poste</h2><ul>";
foreach ($employes_sans_poste as $emp) {
    echo "<li>" . htmlspecialchars($emp['nom']) . "</li>";
}
echo "</ul>";

/**
 * REQUÊTE IMBRIQUÉE (sous-requête)
 *
 * Exemple : afficher les employés qui ont le même poste que l'employé ayant l'ID le plus élevé
 */
$sql4 = "SELECT nom FROM employes
          WHERE poste_id = (
              SELECT poste_id FROM employes ORDER BY id DESC LIMIT 1
          )";

$stmt4 = $pdo->query($sql4);
$employes_meme_poste = $stmt4->fetchAll();

echo "<h2>Employés avec le même poste que le dernier employé</h2><ul>";
foreach ($employes_meme_poste as $emp) {
    echo "<li>" . htmlspecialchars($emp['nom']) . "</li>";
}
echo "</ul>";

/**
 * EXPLICATIONS GÉNÉRALES :
 * - INNER JOIN : affiche uniquement les lignes ayant une correspondance dans les deux tables.
 * - LEFT JOIN : affiche toutes les lignes de la première table, complétées par les données de la seconde si elles existent.
 * - WHERE avec LEFT JOIN : permet de cibler les données manquantes (NULL).
 * - Requête imbriquée : permet d'utiliser le résultat d'une sous-requête comme filtre dans une requête principale.
 *
 * Bonnes pratiques :
 * - Toujours protéger l'affichage HTML avec htmlspecialchars()
 * - Utiliser des alias (AS) pour clarifier les noms de colonnes
 * - Préférer les jointures aux requêtes imbriquées pour les listes simples
 */
