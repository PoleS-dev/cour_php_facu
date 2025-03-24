<h3> la concaténation</h3>

<?php
include_once(__DIR__ . '../../utils.php');

$hello="bonjour";
$everyone="tout le monde";

echo "$hello ".' '. "$everyone " ;

echo $hello ." ". $everyone  ;

// attention a savoir 

echo '$hello' // avec un single quote la variable est lu comme une chaine de caractère

?>

<h3>Concaténation lors des affectations</h3>

<?php
$prenom = "Shezad";
$prenom = "Seckene";
echo $prenom ."<br>";
// concaténation lors de l'affectation ici on affecte une valeur 'Nawel' à $prenom  puis on ajoute une autre valeur (sans supprimer l'ancienne valeur)  

// opérateur combiné " .="

$prenom="Nawel";
$prenom .= ' ';
$prenom .="Najiba";
echo $prenom;
br();


$bb=12;
$dd=13;
echo $bb . $dd;// resultat 1213 le svariable ne sont pas additionnées mais concatenées

?>

<h3>exercice</h3>

<h4>exo 1 :</h4>

<p> 1 . Créer deux variables nom et prenom et affecter les valeurs de son choix
</p>

<p>  2 . Concatener ces deux variables pour afficher une chaîne de caractère du nom et prénom complets avec echo</p>



<h4>exo 2 :</h4>

<p>1 . Créer une variable phrase1 qui contiendra la chaine de caractères : Le ciel est</p>
<p>2 . Créer une variable phrase2 qui contiendra la chaine de caractères : bleu aujourd'hui </p>
<p>3 . Concatener les deux variables en utilisant variable . variable et afficher le resultat avec echo</p>

<h4>exo 3 :</h4>
<p>Créer une variable texte avec la valeur : je vais</p>
<p>Utiliser l'opérateur combiné pour ajouter : à la plage</p>
<p>Afficher le resultat</p>
<h4>exo 4 :</h4>

<p>Créer une variable mot qui contiendra la chaine de caractères : PHP</p>
<p>Utiliser echo pour afficher cette variable à l'interieur d'une chaine entourée de quotes doubles (exemple : echo "le mot est : $mot")</p>
<p>Faire la même chose mais avec des quotes simple et observer la différence</p>
