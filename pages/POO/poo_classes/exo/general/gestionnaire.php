<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "Vehicules.php";
require_once "Voiture.php";
require_once "Moto.php";
require_once "Camion.php";

?>
<h1>Gestionnaire de véhicules</h1>


    

<?php





// echo Vehicules::CATEGORIE;// 
// echo "<br>";
// echo Voiture::CATEGORIE;
// echo "<br>";
// echo Vehicules::CATEGORIE;// 
// echo "<br>";
// echo Moto::CATEGORIE;
// echo "<br>";
// echo Moto::nombreDeRoues();
// echo "<br>";
// echo Vehicules::nombreDeRoues();
// echo "<br>";
// echo Voiture::nombreDeRoues();
// echo "<br>";
$voiture1=new Voiture("citroen","800",2020);
echo $voiture1->afficherDetails();
echo "<br>";
echo "<hr>";
$moto1=new Moto("Yamaha", "yamana2000", 2020);
echo $moto1->afficherDetails();
echo "<br>";
echo "<hr>";
$camion1=new Camion("Renault", "renault888", 2019);
echo $camion1->afficherDetails();
echo "<hr>";








?>





