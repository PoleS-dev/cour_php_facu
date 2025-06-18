<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();


// var_dump($_SERVER);
//exemple de données recoltées
// $_POST=[
//     "prenom"=>"Emanuel",
//     "nom"=>"Cacuci"
// ];
if(isset($_SESSION['user'])){
echo "<pre>";
var_dump($_SESSION['user']);
echo "</pre>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // nous remplissons le tableau $_SESSION par les données recoltées par la soumission du formulaire
   
    $_SESSION['user']['prenom'] = $_POST['prenom'];// syntaxe pour ajouter un element dans un tableau
    
    $_SESSION['user']['nom']=  $_POST['nom'];


    // ajout d'un element dans un tableau exemple 
    // $tab=[

    //     "id"=>123
    // ];

    // $tab["name"]="ordi";

    // var_dump($tan);


    // echo "prenom : ".$_SESSION['prenom']."<br>";
    // echo "nom : ".$_SESSION['nom'];


    // redirection vers la page d'accueil
    header("Location: accueil.php");
    exit();// toujours appeller exit après une redirection







 
}


?>



<!-- // Démarrage de la session au début du script -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="">
            <label for="prenom">Prénom:</label>
            <input type="text"  name="prenom" required><br>
            
            
            <label for="nom">nom</label>
            <input type="text"  name="nom" required><br>
            <input type="submit" value="valider">
        </form>


        <!-- <a href="./session1.php">test session</a> -->
    
</body>
</html>