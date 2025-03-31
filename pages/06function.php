<h2>Les fonctions PHP</h2>


<h4>Quelques fonctions prédéfinies de PHP </h4>
<p>permet de réaliser un traitement spécifique prédéterminé en PHP</p>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//strpos
$email = "prenom@site.fr";
echo strpos($email, "@") . "<br>"; // affiche la position de @ en comptant à partire de 0 dans la chaine de caractère // 6 


if (strpos($email, "@")) {
    echo "mail correct <br>";
} else {
    echo "mail NON  correct <br>";
}

//************** */


$text = "   je suis un long texte très très long  text et pas de place dans la div    ";

echo $text . "<br>";

// strlen
echo "longueur du texte : " . strlen($text) . "<br>"; // longueur de chaine = 79 il calcule les espaces vides


//substr
$text_modif = substr($text, 0, 20); // pour couper la chaine de caractère au endroit souhaité 

echo $text_modif . " ... <br> ";


// trim
echo strlen(trim($text)); // efface les espaces au début et à la fin de la chaine de caractère // renvoie 72


// fonction pour tableaux
//is_array()

$tab = [

    "id" => 123,
    "email" => "g@mail.com",
    "names" => [
        "name1" => "fab",
        "name2" => "seb"
    ],
    "role" => "user"
];

// is_array verrifie si une variable est un tableau 
foreach($tab as $cle=>$valeur){

    if(is_array($valeur)){// si $valeur est un tableau tu boubcle
        foreach($valeur as $value){
            echo "les valeurs : $value <br>";
        }
    }else{

        echo "<hr>  $cle est : $valeur <hr>";
    }

}



?>

<h4> creation d'une fonction</h4>

<p>les fonctions sont un morceaux de codes encapsulés dans les accolades et portant un nom, qu'on appelle au besoin pour executer un script</p>
<?php 
function hr(){// creation d'une fonction

echo "<hr>"; // cette fonction affiche un echo de hr

}

echo "<h6>titre </h6>";
hr(); // on appelle la fonction // on peut appeler plusieur fois la même fonction
hr();
hr();
hr();
hr();

// fonction avec return 

function bonjour(){
    return  "bonjour <br>";
}

echo bonjour();// affiche bonjour

// fonction avec return et parametre

function bonjour2($qui){// ceci est parametre 

    return "Bonjour ".$qui."<br>";
}

$var=bonjour2("Seckene"); // ceci est un argument

echo $var;

$a=2;
$b=3;

function calc($c,$d){
    $result=$c+$d;
    return $result;
}

echo calc($a,$b);

function calcul(){
    global $a;
    global $b;
    $result= $a+$b;
    return $result;

}

echo calcul();// donne 5


// Variables locales et varaibles globales


// de l'espace local à l'espace global
$var6=6; //c'est une variable global en dehor d'une fonction

function jour(){
    $jour ="mardi";// la variable $jour est une variable locale de la fonction
    return $jour;

}

echo jour();
$jourMardi=jour();// j'ai stoocker la veleur de de $jour (variable locale) dans une nouvelle variable

// de l'espace global au local

$pays="Maroc"; // varaible global
function afficherPays(){

    global $pays;// le mot clé global permet de récuperer une avaraible global au sein d'une fonction
    echo $pays; // affiche Maroc
}






























?>