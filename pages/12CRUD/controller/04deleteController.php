<?php





// DELETE - Suppression d'un élève
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["sup"], $_POST['id'])) {
    $isUserSup = (int) $_POST['id']; // On caste l'ID en entier par sécurité

    $stmt = $pdo->prepare("DELETE FROM eleves WHERE id = :id");
    $stmt->execute([':id' => $isUserSup]);

    // On vérifie si une ligne a bien été supprimée
    if ($stmt->rowCount() > 0) {
        echo "<p style='color:green;'>✅ Élève ID {$isUserSup} supprimé avec succès.</p>";
    } else {
        echo "<p style='color:red;'>❌ Aucun élève supprimé. ID inexistant ?</p>";
    }
    header("Refresh: 2; url=" . $_SERVER['PHP_SELF']);
    exit;
}

include_once "view/04delete.php";
