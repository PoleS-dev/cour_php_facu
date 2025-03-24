

<?php   

ini_set('display_errors', 1);
error_reporting(E_ALL);




$fruits=[];
// si fruit n'est pas vide et que num est égal à 1
if(!empty($fruits )){

    array_push($fruits,"mangue");
    
}


print_r($fruits);

echo "<br>";

$tab2=[
    "user"=>"mohamed",
    "connexion"=>false
];



if(!empty($tab2)){
    // je demande si $tab2["user"] et $tab2["user"] n'est pas vide
    if(isset($tab2["user"]) && !empty($tab2["user"])){
       
        echo "<h5>Bonjour ".$tab2["user"]."</h5>";
          // si $tab2["connexion"] existe dans le tableau et n'est pas vide 
        if( isset($tab2["connexion"]) && !empty($tab2["connexion"] )){
            echo "<button>DECONNEXION</button>";
        }else{
            echo "<button>SE CONNECTER</button>";
        }


    }else{
        echo "<h5>Bonjour invité</h5>";
       
    }
}







