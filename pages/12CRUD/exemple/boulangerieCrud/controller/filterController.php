<?php

// Construction dynamique de la requête SELECT avec filtres
$where = []; // Tableau contenant les conditions WHERE
$params = []; // Tableau des valeurs associées aux conditions

// Si un prix max est fourni, on ajoute une condition
if (!empty($_GET['prix'])) {
    $where[] = "prix <= ?"; // Ajouter condition prix max
    $params[] = $_GET['prix'];
}

// Si une catégorie est sélectionnée, on ajoute une autre condition
if (!empty($_GET['categorie_id'])) {
    $where[] = "categorie_id = ?"; // Ajouter condition sur la catégorie
    $params[] = $_GET['categorie_id'];
}

// Requête principale avec jointure pour obtenir le nom de la catégorie
$sql = "SELECT produits.*, categories.nom AS categorie_nom FROM produits 
        JOIN categories ON produits.categorie_id = categories.id";
// Requête SQL pour récupérer tous les produits avec leur catégorie
// Cette requête utilise une jointure entre deux tables : produits et categories
// - SELECT produits.* : sélectionne toutes les colonnes de la table 'produits'
// - categories.nom AS categorie_nom : récupère le nom de la catégorie et le renomme pour éviter les doublons
// - FROM produits : on part de la table principale 'produits'
// - JOIN categories ON produits.categorie_id = categories.id :
//   on relie chaque produit à sa catégorie grâce à la clé étrangère 'categorie_id' qui correspond à l'identifiant 'id' dans la table 'categories'
// Résultat : chaque produit sera affiché avec toutes ses infos + le nom de sa catégorie

// Si des conditions existent, on les ajoute à la requête avec "AND"
if ($where) {
    // implode() combine les éléments du tableau avec un séparateur
    // Ici, cela crée une chaîne comme : "prix <= ? AND categorie_id = ?"
    $sql .= " WHERE " . implode(" AND ", $where);
}

// Préparation et exécution de la requête avec les paramètres de filtre
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$produits = $stmt->fetchAll(); // Résultat final : liste des produits filtrés

// Récupération de toutes les catégories disponibles (pour les <select>)
$stmtCat = $pdo->prepare("SELECT * FROM categories");
$stmtCat->execute();
$categories = $stmtCat->fetchAll();