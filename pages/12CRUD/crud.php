<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exemple de CRUD en PHP</title>
</head>
<body>
<h1>CRUD en PHP avec PDO</h1>
<p>CRUD est un acronyme qui désigne les quatre opérations de base que l'on peut effectuer sur des données :</p>
<ul>
    <li><strong>C</strong>reate (Créer)</li>
    <li><strong>R</strong>ead (Lire)</li>
    <li><strong>U</strong>pdate (Mettre à jour)</li>
    <li><strong>D</strong>elete (Supprimer)</li>
</ul>
<p>Ce script montre comment effectuer ces opérations sur une table <code>eleves</code> à l'aide de PHP et PDO.</p>

<?php
// Affiche toutes les erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=societe02"; // Remplacer 'societe' par le nom réel de votre base
$user = "root"; // Nom d'utilisateur MySQL
$password = "votre_mot_de_passe"; // Mot de passe de l'utilisateur MySQL
 
try {
    
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    echo "Connexion réussie";
} catch (PDOException $exception) {
    // Affichage de l'erreur si la connexion échoue
    echo "Erreur de connexion à la base de données : " . $exception->getMessage();
    exit;
}


// CREATE - Ajouter un élève
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = trim($_POST['nom']); // On récupère et nettoie le nom
    $pc = trim($_POST['ordinateur_numero']); // On récupère et nettoie le numéro de PC

    // Requête SQL préparée pour éviter les injections SQL
    $stmt = $pdo->prepare("INSERT INTO eleves (nom, ordinateur_numero) VALUES (:nom, :pc)");
    $stmt->execute([
        ':nom' => $nom,
        ':pc' => $pc
    ]);

    echo "<p style='color:green;'>✅ Élève ajouté avec succès !</p>";
}

// READ - Récupération de tous les élèves
$sqlAll = "SELECT * FROM eleves";
$stmtAll = $pdo->prepare($sqlAll);
$stmtAll->execute();
$eleves = $stmtAll->fetchAll(PDO::FETCH_ASSOC); // On récupère les résultats sous forme de tableau associatif

echo "<h3>Liste complète des élèves</h3>";
foreach ($eleves as $e) {
    echo "ID: {$e['id']} - Nom: {$e['nom']} - PC: {$e['ordinateur_numero']}<br>";
}

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
}

// UPDATE - Mise à jour du nom d'un élève
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = (int) $_POST['id'];
    $nouveauNom = trim($_POST['nom']);

    // Requête SQL préparée pour modifier le nom
    $stmt = $pdo->prepare("UPDATE eleves SET nom = :nom WHERE id = :id");
    $stmt->execute([
        ':nom' => $nouveauNom,
        ':id' => $id
    ]);

    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✅ Élève ID $id mis à jour avec succès ! Nouveau nom : $nouveauNom</p>";
    } else {
        echo "<p style='color: red;'>❌ Aucun changement effectué.</p>";
    }
}
?>

<!-- Formulaire d'ajout -->
<h2>Ajouter un élève</h2>
<form method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>
    <br>
    <label for="ordinateur_numero">PC :</label>
    <input type="text" name="ordinateur_numero" required>
    <br>
    <input type="submit" name="ajouter" value="Ajouter">
</form>

<!-- Formulaire de mise à jour -->
<h2>Modifier le nom d’un élève</h2>
<form method="POST">
    <label for="id">ID :</label>
    <input type="number" name="id" required>
    <br>
    <label for="nom">Nouveau nom :</label>
    <input type="text" name="nom" required>
    <br>
    <input type="submit" name="modifier" value="Mettre à jour">
</form>

<!-- Formulaires de suppression pour chaque élève -->
<h2>Supprimer un élève</h2>
<?php foreach ($eleves as $e): ?>
    <form method="POST" style="display:inline">
        ID: <?= $e['id'] ?> - Nom: <?= $e['nom'] ?> - PC: <?= $e['ordinateur_numero'] ?>
        <input type="hidden" name="id" value="<?= $e['id'] ?>">
        <input type="submit" name="sup" value="Supprimer">
    </form><br>
<?php endforeach; ?>
</body>
</html>