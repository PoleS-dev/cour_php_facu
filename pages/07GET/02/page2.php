<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);


var_dump($_GET);



?>

<p> <?php

if(isset($_GET["nom"]) ){// verifie si la clé "nom" existe
    echo $_GET["nom"]."<br>" ; 
    
}else{ // si clé non n'existe pas alors tu affiche article
    
    echo $_GET["article"]."<br>" ; 
}


if(array_key_exists("ville",$_GET)){// verifie si la clé "ville" existe
    
    echo $_GET["ville"]  ; 
    
}
else{
    
    echo $_GET["couleur"]."<br>"  ; 
    echo $_GET["prix"]  ; 
}



?> </p>