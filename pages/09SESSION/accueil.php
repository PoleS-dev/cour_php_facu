<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
var_dump($_SESSION);// verifier les données de session






?>

<h1>ACCUEIL</h1>
<!-- bouton deconnexion avec la methode post -->
<form action="deconnexion.php" method="post">

    <button type="submit" name="logout" >deconnexion</button>

</form>