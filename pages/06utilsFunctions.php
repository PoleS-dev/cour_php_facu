<?php
echo "================ TABLEAUX =================";
 
// array_push() : Ajoute des éléments à la fin d'un tableau
$fruits = ["pomme", "banane"];
array_push($fruits, "orange");
echo "array_push : ajoute 'orange'\n";
print_r($fruits);
 
// array_pop() : Supprime le dernier élément
array_pop($fruits);
echo "array_pop : retire le dernier élément\n";
print_r($fruits);
 
// array_unshift() : Ajoute au début
array_unshift($fruits, "kiwi");
echo "array_unshift : ajoute 'kiwi' au début\n";
print_r($fruits);
 
// array_keys() : Renvoie les clés d’un tableau
$infos = ["nom" => "Alice", "email" => "alice@test.com"];
echo "array_keys : affiche les clés\n";
print_r(array_keys($infos));
 
// in_array() : Vérifie si une valeur est présente
echo "in_array : 'Alice' est-il dans les valeurs ? ";
echo in_array("Alice", $infos) ? "Oui\n" : "Non\n";
 
// count() : Compte le nombre d’éléments
echo "count : nombre de fruits = " . count($fruits) . "\n\n";
 
echo "================ CHAINES =================\n\n";
 
// strlen() : Longueur d’une chaîne
$txt = " Hello ";
echo "strlen : longueur de '$txt' = " . strlen($txt) . "\n";
 
// trim() : Supprime les espaces
echo "trim : sans espaces = '" . trim($txt) . "'\n";
 
// strtoupper() / strtolower()
echo "strtoupper : " . strtoupper("bonjour") . "\n";
echo "strtolower : " . strtolower("BObOUR") . "\n";
 
// ucfirst() : Majuscule à la 1re lettre
echo "ucfirst : " . ucfirst("salut") . "\n";
 
// explode() : Découpe une chaîne
echo "<br>";
$csv = "un,deux,trois";
echo "<pre>";
echo print_r($csv);
echo "</pre>";
 
echo "<br>";
 
 
echo "explode : découpe 'un,deux,trois'\n";
print_r(explode(",", $csv));
 
echo "<pre>";
echo print_r(explode(",",$csv));
echo "</pre>";
 
// implode() : Transforme un tableau en chaîne
$tab = ["PHP", "HTML", "CSS"];
echo "implode : ";
echo implode(" - ", $tab) . "\n\n";
 
echo "================ MATH =================\n\n";
 
// abs() : valeur absolue
echo "abs(-10) = " . abs(-10) . "\n";
 
// round() : arrondi standard
echo "round(4.6) = " . round(4.6) . "\n";
 
// floor() / ceil()
echo "floor(4.8) = " . floor(4.8) . "\n";
echo "ceil(4.1) = " . ceil(4.1) . "\n";
 
// rand() : nombre aléatoire
echo "rand(1, 10) = " . rand(1, 10) . "\n\n";
 
echo "================ DATES =================\n\n";
 
// date() : formatage de la date
echo "date : " . date("Y-m-d H:i:s") . "\n";
 
// time() : timestamp actuel
echo "time : " . time() . "\n";
 
// strtotime() : convertir une date en timestamp
$ts = strtotime("2025-01-01");
echo "strtotime('2025-01-01') = " . $ts . "\n";
echo "formaté = " . date("d/m/Y", $ts) . "\n\n";
 
echo "================ AUTRES =================\n\n";
 
// isset() : variable définie ?
$val = "test";
echo "isset(\$val) : " . (isset($val) ? "Oui\n" : "Non\n");
 
// empty() : variable vide ?
$vide = "";
echo "empty(\$vide) : " . (empty($vide) ? "Oui\n" : "Non\n");
 
// is_array()
echo "is_array(\$fruits) : " . (is_array($fruits) ? "Oui\n" : "Non\n");
 
// var_dump() : type + valeur
echo "var_dump de \$tab :\n";
var_dump($tab);
 
// print_r() : affiche un tableau
echo "print_r de \$infos :\n";
print_r($infos);
 
// die() : termine le script (commenté ici)
// die("Arrêt du script");
 
// include() : pour inclure un fichier PHP
echo "\ninclude() permet d'intégrer un fichier PHP externe.\n";
 
echo "\n🎉 Fin du script test des fonctions prédéfinies PHP 🎉\n";
?>