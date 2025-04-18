
<?php
// Suppression d'un produit via l'ID passé dans l'URL (?supprimer=ID)
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    // Requête préparée de suppression par ID
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$id]);
}

?>
