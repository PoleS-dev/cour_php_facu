<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';

use App\Vehicules\Moto;
use App\Vehicules\Voiture;
use App\Vehicules\Camion;

echo "<h2>Gestionnaire de Véhicules </h2>";

// Moto
$moto = new Moto("Yamaha", "MT-07", 2020);
echo "<h3>Moto :</h3>";
echo $moto->afficherDetails();
echo "Nombre de roues : " . Moto::nombreDeRoues() . "<br>";
echo "Est récente ? " . ($moto->estRecent() ? "Oui" : "Non") . "<br><br>";

// Voiture
$voiture = new Voiture("Tesla", "Model 3", 2022);
echo "<h3>Voiture :</h3>";
echo $voiture->afficherDetails();
echo "Nombre de roues : " . Voiture::nombreDeRoues() . "<br>";
echo "Est récente ? " . ($voiture->estRecent() ? "Oui" : "Non") . "<br><br>";

// Camion
$camion = new Camion("Volvo", "FH16", 2018);
echo "<h3>Camion :</h3>";
echo $camion->afficherDetails();
echo "Nombre de roues : " . Camion::nombreDeRoues() . "<br>";
echo "Est récent ? " . ($camion->estRecent() ? "Oui" : "Non") . "<br><br>";
