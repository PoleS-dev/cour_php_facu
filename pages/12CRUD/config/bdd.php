<?php

// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=ecole"; // Remplacer 'societe' par le nom réel de votre base
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