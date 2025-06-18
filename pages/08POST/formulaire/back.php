<h1>données du formulaire </h1>
<a href="front.php"> aller formulaire </a>
<hr>

<?php


echo "<pre>";
var_dump($_GET);
echo "</pre>";

if(empty($_POST["pseudo"]) || empty($_POST["email"]))
{

    echo "erreur tous les champs doivent être remplis";
}else{

    echo "prenom posté :  $_POST[pseudo] <br> " ;
    echo "email posté :  $_POST[email] <br> " ;

}

 // ************* autre possibilité****************

//  if(empty( $_POST['pseudo'] )){ 
//     echo " ERREUR pseudo champs oligatoire";
// }

// else{

//         echo "Prénom posté :  $_POST[pseudo] <br>";
    
//     //    _________

//     }

// if(empty( $_POST['email']) ){ 
//         echo " ERREUR email champs oligatoire";
//     }
    
// else{
        
//         echo "email postée : $_POST[email] <hr>";
//     }   
