<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

if (class_exists('App\\Startup')) {
    echo "Autoload OK ✅<br>";
} else {
    echo "Autoload KO ❌<br>";
}



use App\Salarie;
use App\Restaurant;
use App\Startup;



$startup = new Startup("NextTech", "123456", "12 rue du code", "Paris", "75001", "France");
$resto = new Restaurant("Chez Mario", "789456", "1 rue Pizza", "Rome", "00100", "Italie");

$startup->ajouterSalarie(new Salarie("Nassuf", "Dev"));
$startup->ajouterSalarie(new Salarie("Idriss", "Product Owner"));

$resto->ajouterSalarie(new Salarie("Sergio", "Serveur"));
$resto->ajouterSalarie(new Salarie("Facundo", "Cheffe"));

$startup->afficherSalaries();
echo "<hr>";
$resto->afficherSalaries();
