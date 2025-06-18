<?php
// Vérification des données reçues

$nom = isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : 'Nom inconnu';
$prenom = isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : 'Nom inconnu';

echo "<pre>";
var_dump($_GET);
echo "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Résultat du formulaire</title>
</head>
<body>
    <h2>Données reçues :</h2>
    <p><strong>Nom :</strong> <?= $nom ?></p>
    <p><strong>Prenom :</strong> <?= $prenom ?></p>

    <a href="page1.php">⏪ Revenir au formulaire</a>
</body>
</html>