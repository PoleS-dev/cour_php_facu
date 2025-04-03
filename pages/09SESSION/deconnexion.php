<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();// nécessaire pour accéder à la session

var_dump($_POST);
var_dump($_SESSION);

if(isset($_POST['logout'])){

    session_unset();// supprimme toutes les variables de session
    session_destroy();// detruit la session

    //redirection 
    header("Location: accueil.php");
}








