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
echo "longueur du texte : " . strlen($text) . "<br>"; // longueur de chaine = 79 il aussi calcule les espaces vides


//substr
$text_modif = substr($text, 0, 20); // pour couper la chaine de caractère au endroit souhaité 

echo $text_modif . " ... <br> ";


// trim
echo strlen(trim($text)); // efface les espaces au début et à la fin de la chaine de caractère // renvoie 72


//************ */


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

    greenUser("Mathieu");
}



?>



<h4> création d'une fonction</h4>

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


echo "<h3>de l'espace local à l'espace global</h3>";
// de l'espace local à l'espace global
$var6=6; //c'est une variable global en dehor d'une fonction

function jour(){
    $jour ="mardi";// la variable $jour est une variable locale de la fonction
    return $jour;
    
}

echo jour();
$jourMardi=jour();// j'ai stocké la valeur de  $jour (variable locale) dans une nouvelle variable

echo "<h3>de l'espace local à l'espace global</h3>";
// de l'espace global au local

$pays="Maroc"; // variable global

function afficherPays(){

    global $pays;// le mot clé global permet de récuperer une variable globale au sein d'une fonction
    echo $pays; // affiche Maroc
}

afficherPays();// on appelle la fonction 


// exo 


greenUser("Mathieu");
/*
 
1. Fonction sans paramètres et sans valeur de retour
Exercice : Créez une fonction appelée greet() qui affiche "Hello, world!" lorsqu'elle est appelée.
*/

function hello(){

    echo "bonjour";
}

echo hello();

/*
2. Fonction avec paramètres et sans valeur de retour
Exercice : Créez une fonction appelée greetUser() qui prend un paramètre $name et affiche "Hello, [name]!" où [name] est la valeur passée à la fonction.
*/

function greenUser($name){


    echo "hello $name";
}

greenUser("Mathieu");


/*
3. Fonction avec paramètres et avec valeur de retour
Exercice : Créez une fonction appelée sum() qui prend deux paramètres $a et $b, les additionne, et retourne le résultat.
*/

function sum($a,$b){

    $resultat=$a+$b;
    return $resultat;

}

sum(1,5);



/*
4. Fonction qui calcule la somme des nombres d'un tableau
Exercice : Créez une fonction appelée sumArray($numbers) qui prend un tableau de nombres $numbers en paramètre et retourne la somme de tous les éléments du tableau.
*/
 function sumArray($number){

    if(!is_array($number)){
    
   return "pas un tableau";

    }

    if(!is_numeric (array_sum($number))){
        return "pas des integer";
    }


    return array_sum($number);

 }
$liste=[1,2,3];
 echo sumArray($liste);

 


/*
5. Fonction avec paramètre par défaut
Exercice : Créez une fonction appelée greetWithTime() qui prend deux paramètres, un nom $name et un moment de la journée $timeOfDay (par défaut "day"), et qui affiche "Good [timeOfDay], [name]!
 
Rappel = vous pouvez ajouter une valeur au paramètre de fonction directement comme on a vu (exemple : function salut($name='Cynthia'){echo "Salut $name";})
".
*/


function greeWithTime($name,$timeOfDay="day"){

echo "good" ." ". $timeOfDay . " "  .  $name."<br>";


}

$julia="julia";
$morning="morning";
greeWithTime($julia,$morning);




$time=date("H");
echo $time;


function getTime($name,$timeNow="day"){
    
    if(is_numeric($timeNow)){
        
        if($timeNow >=6 && $timeNow <=12){
            $timeNow="morning";
            echo "good" ." ". $timeNow . " "  .  $name."<br>";

    }
        if($timeNow >=13 && $timeNow <=20){
            $timeNow="aftenoon";
            echo "good" ." ". $timeNow . " "  .  $name."<br>";

    }
        if($timeNow >=21 && $timeNow <=5){
            $timeNow="night";
            echo "good" ." ". $timeNow . " "  .  $name."<br>";

    }


}

echo "good" ." ". $timeNow . " "  .  $name."<br>";

 }

 getTime($julia,$time);



/*
6. Fonction qui retourne un tableau
Exercice : Créez une fonction appelée getFruits() qui ne prend aucun paramètre et retourne un tableau contenant trois noms de fruits.
*/

function getFruit(){
    $tab=["fraise","pomme","orange"];

    return $tab;

}

var_export($tab=getfruit());



/*
7. Fonction avec une chaîne de caractères comme paramètre
Exercice : Créez une fonction appelée reverseString($str) qui prend une chaîne de caractères $str en paramètre et retourne cette chaîne en ordre inversé.
*/

function reversTring($str){

if(is_string($str) && strlen($str)>1 ){

    return strrev($str);
}else{
    return "pas un string ou string trop court";
}

}


/*
8. Fonction avec paramètres et vérification de type
Exercice : Créez une fonction appelée divide($a, $b) qui prend deux paramètres $a et $b. La fonction doit vérifier que $b n'est pas égal à 0 avant de diviser $a par $b et retourner le résultat. Si $b est égal à 0, la fonction doit retourner un message d'erreur.
*/


function divide($a,$b){

    if($b==0){
        return "erreur 0";
    }else{
        $resultat=$a/$b;
        return $resultat;
    }

}

divide(2,6);



/*
10. Fonction avec une condition complexe
Exercice : Créez une fonction appelée checkEligibility($age, $hasLicense) qui prend en paramètre un âge $age et un booléen $hasLicense. La fonction doit retourner "Eligible" si l'utilisateur a 18 ans ou plus et possède un permis de conduire, sinon "Not Eligible".
 
*/

$user=[

    "age"=>14,
    "hasLicence"=>true,
];




function checkEligibility($user){

    if(is_array($user) && array_key_exists("age",$user) && array_key_exists("hasLicence",$user) ){
      

            if( ($user["age"] )   >=18 &&  ($user["hasLicence" ])==true){

                return "Éligible";
            }else{
                return "Not éligible";
            }

         

    }else{
        return "données invalides";
    }
 
}

echo checkEligibility($user);







?>