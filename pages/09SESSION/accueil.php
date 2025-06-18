<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user'])){
echo "<pre>";
var_dump($_SESSION['user']);// verifier les données de session
echo "</pre>";
}
?>

<h1>ACCUEIL</h1>

<?php
if(isset($_SESSION['user'])){// si dans session il y a la clé " user" alors on affiche le message 
echo "<p>Vous etes connecté en tant que ".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']."</p>";
}else{
    echo "<p>Vous n'etes pas connecté</p>";
}

if(isset($_SESSION['user'])){// si dans session il y a la clé " user" alors on affiche le bouton deconnexion
    
?>
<!-- on sort du block php pour afficher le html -->


<!-- bouton deconnexion avec la methode post -->
<form action="deconnexion.php" method="post">

    <button type="submit" name="logout" >deconnexion</button>

</form>
<?php
}
?>
