<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connexion à la base de données avec PDO
$dsn = 'mysql:host=localhost;dbname=ecole;charset=utf8';
$user = 'root';       // À adapter
$password = 'votre_mot_de_passe';       // À adapter

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion etablie <br>";
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());

}


// recuperer un seul élève

$sql="SELECT * FROM eleves ";

$stmt = $pdo->prepare($sql);

$stmt->execute();

echo "<pre>";
print_r(get_class_methods($stmt));
echo "</pre>";

$eleves = $stmt->fetch(PDO::FETCH_ASSOC);
$eleves2=$stmt->fetch(PDO::FETCH_ASSOC);


echo "<pre>";
print_r($eleves);
echo "</pre>";

echo "<pre>";
print_r($eleves2);
echo "</pre>";

// recuperer tous les élèves
$sql="SELECT * FROM eleves ";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($eleves);
echo "</pre>";

foreach ($eleves as $index) {


    echo "ID: {$index['id']} - Nom: {$index['nom']} - PC: {$index['ordinateur_numero']}<br>";
}

// recuperer un eleve par id

$sql="SELECT * FROM eleves WHERE id = 5";

$stmt=$pdo->prepare($sql);

$stmt->execute();

$eleve = $stmt->fetch(PDO::FETCH_ASSOC);
 echo "<pre>";
print_r($eleve);
echo "</pre>";

// trier par ordre alphabétique

// avec requete sql 
$sql="SELECT * FROM eleves ORDER BY nom";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo "<pre>";
print_r($eleves);
echo "</pre>";

// avec des fonctions php 
$sql="SELECT * FROM eleves";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo "<pre>";
print_r($eleves);
echo "</pre>";


$listeNoms = array_column($eleves, 'nom');

echo "<pre>";
print_r($listeNoms);
echo "</pre>";

sort($listeNoms);

echo "<pre>";
print_r($listeNoms);
echo "</pre>";


foreach ($listeNoms as $nom) {
    echo $nom . "<br>";
}
















