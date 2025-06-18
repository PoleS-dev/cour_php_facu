<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


include "classCrud.php"; // recupération des classes issu d'un autre fichier
//--------------------------------------------------



session_start(); // ouverture de la session


//-------------------------------------------------------

// CREATION D'UN OBJET AVEC UN FORMULAIRE 



// logique pour CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['action']) && $_POST['action'] === "create") {

    // utilisation de switch 
    //  cas où $_POST['objet'] est egale à Voiture, Moto ou Camion alors on crée un objet issu de la class  puis on stock l'objet dans $_SESSION['objet']
    switch ($_POST["objet"]) {

       // EXEMPLE DE RECUPERATION DE $_POST=[
        //    "objet"=>"Voiture", 
        //     "marque"=>"Renault",
        //     "vitesse"=>"100",
        //     "nbRoues"=>"4"
        // ];

        // $SESSION est une superglobale qui permet de stocker des variables dans la session, c'est un tableau associatif
        // ici nous creons ajoutont 'objet ' a $_SESSION qui sera la future clé 

        case "Voiture":

            $_SESSION['objet'] = new Voiture($_POST["marque"], (int)$_POST["vitesse"], (int)$_POST["nbRoues"]);
            break;
        case "Moto":
            $_SESSION['objet'] = new Moto($_POST["marque"], (int)$_POST["vitesse"], (int)$_POST["nbRoues"]);
            break;
        case "Camion":
            $_SESSION['objet'] = new Camion($_POST["marque"], (int)$_POST["vitesse"], (int)$_POST["nbRoues"]);
            break;
    }
    // nous creons un tableau associatif avec session 
    // exemple : 
    // $b=[] tableau vide 
    // $b['ajout'] nous ajoutons une chaine de caractere "ajout" a $b
    // $b['ajout']=[new Maclass(proritét1,proritét2,proritét3)] // ajout d'un objet issu de la class Maclass
    // resultat : $b=[
    //    'ajout'=>[new Maclass(proritét1,proritét2,proritét3)]
    // ]
    // la clé "ajout" a une valeur qui est un objet issu de la class Maclass
}





//---------------------------------------------------------------------------------
// logique pour DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // nous verifions si dans la requete post il la cle action  avec comme valeur delete
    if (isset($_POST['action']) && $_POST['action'] === "delete") {
        // unset supprime la variable $_SESSION["objet"]
        unset($_SESSION["objet"]);
        // il n'y a plus la clé objet et sa valeur dans session
    }
}


//---------------------------------------------------------------------------------
// logique pour UPDATE
// nous utilisons le setter de la class de l'objet issu de la requete post ( Voiture,Moto ou Camion )
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "update") {
    // $objet est issu de la requete post $_POST "objet" avec la valeur soit Voiture, Moto ou Camion
    // $objet est l'objet crée lors de la soumission de creation de vehicule 


    // le setter attend un argument de type string ou int issu du form 
    $_SESSION['objet']->setMarque($_POST["marque"]);
    $_SESSION['objet']->setVitesse((int)$_POST["vitesse"]); // cast en int c'est a dire on force la valeur de $_POST["vitesse"] en int
    $_SESSION['objet']->setNbRoues((int)$_POST["nbRoues"]); // cast en int c'est a dire on force la valeur de $_POST["nbRoues"] en int
    // comme la valeur de la clé objet a comme valeur un objet dans $_SESSION nous pouvons acceder aux méthodes dont est issu l'objet 

    // exemple $b=[new Maclass(proritét1,proritét2,proritét3)]
    //$b->setMethode1(nouvelle valeur issu du post du form ayant une cle valeur personalisé grace aux input hidden ) 
    //$b->setMethode2(nouvelle valeur  ) 

}



//---------------------------------------------------------------------------------

$objet = $_SESSION['objet'] ?? null; // si $_SESSION['objet'] n'existe pas on lui affecte null
// $objet contient $SESSION['objet'] ou null
// echo "<br>";
// echo "<hr>";
// echo "<p> print_r de $\objet= $\SESSION['objet']  </p>  ";
// echo "<pre>";
// print_r($objet);
// echo "</pre>";
// echo "<br>";
// echo "<hr>";
// echo "<p> print_r de $\SESSION sans la clé objet</p>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// echo "<hr>";
// echo "<br>";
// echo "<p> print_r de $\POST</p>";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";  
// echo "<hr>";

// print_r($objet);
?>

<!-- FORM CREATE -->
<form method="post">
    <input type="hidden" name="action" value="create">
    <!-- hidden sert a cacher le champ mais a nommer la cle action avec une valeur personalisé utiliser pour la logique du form-->


    <!-- lorsque le form est soumis il envoie une requete post -->
    <!-- l'attribut name sert de clé pour communiquer avec la logique du form -->
    <!-- l'attribut value sert de valeur pour communiquer avec la logique du form -->
    <!-- exemple : $_POST = [
        "objet" => "Voiture",
        "marque" => "Renault",
        "vitesse" => "100",
        "nbRoues" => "4"
    ] -->

    <select name="objet">
        <option value="Voiture">Voiture</option>
        <option value="Moto">Moto</option>
        <option value="Camion">Camion</option>
    </select>


    <select name="marque">
        <option value="">--choisir--</option>
        <option value="Renault">Renault</option>
        <option value="Towota">Towota</option>
        <option value="Citroen">Citroen</option>
    </select>

    <select name="vitesse">
        <option value="">--choisir--</option>
        <option value="100">100</option>
        <option value="120">120</option>
        <option value="150">150</option>
    </select>


    <select name="nbRoues">
        <option value="">--choisir--</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>
    </select>
    <button type="submit">Envoyer</button>
</form>


<?php





//---------------------------------------------------------------------------------




// logique pour READ
if ($objet) {
    echo "marque : " . $objet->getMarque(); // echo, concatenation, puis affichage de la marque
    echo "<br>";
    echo "vitesse : " . $objet->getVitesse() . "Km/h";
    echo "<br>";
    echo "nombre de roues : " . $objet->getNbRoues();
    echo "<br>";
    echo "max vitesse : " . $objet::MAX_VITESSE;
    echo "<br>";

    // echo "<hr>";
    // echo " ceci est le print_r de $\objet";
    // echo "<br>";
    // // echo "<pre>";
    // // print_r($objet);
    // // echo "</pre>";
    // echo "<hr>";
}

//---------------------------------------------------------------------------------
// form pour DELETE
if ($objet) {
    // si $session['objet'] existe alors on affiche le form delete    
?>

    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <button type="submit">delete</button>
    </form>

<?php
}

// -------------------------------------------------------------------------------------------
if ($objet) {

?>
    <!-- update avec form -->

    <form method="post">
        <input type="hidden" name="action" value="update"> <!-- hidden sert a cacher le champ mais a nommer la cle action avec une valeur personalisé utiliser pour la logique du form-->


        <select name="objet">
            <!-- on recupère la methode getObjet() de la class Vehicule qui permet de recuperer le nom de la class de l'objet -->
             <!-- value permet de recuperer la valeur de la clé  -->
              <!-- si le user choisit un option Moto le resultat du post sera pour ce select : $_POST = objet->Moto -->
            <option value=<?=  $objet->getObjet() ?>> <?=  $objet->getObjet() ?></option>
            <option value="Voiture">Voiture</option>
            <option value="Moto">Moto</option>
            <option value="Camion">Camion</option>
        </select>
        <select name="marque">
            <option value=<?=  $objet->getMarque() ?>> <?=  $objet->getMarque() ?></option>
            <option value="Renault">Renault</option>
            <option value="Towota">Towota</option>
            <option value="Citroen">Citroen</option>
        </select>

        <select name="vitesse" id="vitesse">
            <option value=<?= $objet->getVitesse() ?>> <?= $objet->getVitesse() ?></option>
            <option value="100">100</option>
            <option value="120">120</option>
            <option value="150">150</option>
        </select>

        <select name="nbRoues" id="nbRoues">
            <option value=<?=  $objet->getNbRoues() ?>> <?= $objet->getNbRoues() ?></option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
        </select>
        <button type="submit">modifier</button>
    </form>


<?php

}


?>