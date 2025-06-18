<?php


// Ajout d'un produit à la base de données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $categorie_id = $_POST['categorie_id'];

    // Vérifier si le produit existe déjà (même nom et même catégorie)
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM produits WHERE nom = ? AND categorie_id = ?");
    $checkStmt->execute([$nom, $categorie_id]);

    // fetchColumn() récupère directement la première colonne de la première ligne du résultat
    // Ici, cela retourne le nombre de produits correspondants (ex : 0 ou 1)
    $existe = $checkStmt->fetchColumn();

    if ($existe) {
        echo "<p style='color: red;'>Le produit existe déjà dans cette catégorie.</p>";
    } else {
        // Requête préparée pour insérer un produit (nom, prix, id catégorie)
        $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, categorie_id) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $prix, $categorie_id]);
    }

    echo "<p style='color:green;'>✅ produit ajouté avec succès !</p>";
    header("Refresh: 2; url=" . $_SERVER['PHP_SELF']);
}