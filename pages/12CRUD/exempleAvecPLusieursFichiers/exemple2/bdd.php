<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion PDO à la base de données
$host = 'localhost';
$db = 'boul';
$user = 'root';
$pass = 'votre_mot_de_passe';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active l'affichage des erreurs PDO en tant qu'exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourne les résultats sous forme de tableau associatif
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Connexion à la base de données avec PDO
    echo "ok connected";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode()); // En cas d'erreur, on affiche le message
}
