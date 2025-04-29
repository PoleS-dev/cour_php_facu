<?php

require_once "Vehicules.php";
require_once "Voitures.php";

// Voiture
$voiture = new Voiture("Tesla", "Model 3", 2022);
echo "<h3>Voiture :</h3>";
echo $voiture->afficherDetails();
echo "Nombre de roues : " . Voiture::nombreDeRoues() . "<br>";
echo "Est récente ? " . ($voiture->estRecent() ? "Oui" : "Non") . "<br><br>";
