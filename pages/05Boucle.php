<h1>Les boucles</h1>



<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// boucle FOR 

$tab = ["123", "124", "125"];

var_dump($tab);

for ($i = 1; $i < count($tab); $i++) {

    echo $tab[$i] . "<br>";
}

// avec la boucle for vous avex plus de controlle sur l'index, par exemple vous pouvez commencer la boucle à l'index de votre choix.

// boucle for dans un tableau associatif

$tab2 = [
    "id" => 123,
    "email" => "gg_gmail.com",
    "age" => 25
];

// for($i=0 ; $i<count($tab2);$i++){

// echo $tab2[$i]."<br>";

// }

// cette boucle me créer une erreur car la boucle for ne peux pas boucler un tableau associatif n'ayant pas d'index.








// Boucler un tableau associatifs


// FOREACH 
// la boucle foreach() fonctionne UNIQUEMENT sur les tableaux ou objets, erreur si on boucle sur un variable non array( tableau) 

// le mot clé " as " est OBLIGATOIRE 


// Il ya deux façon d'ecrire la boucle Foreach : 



$users = [

    "id" => 123,
    "email" => "gg_gmail.com",
    "age" => 25

];

foreach ($users as $valeur) {

    echo "je suis la valeur : " . $valeur . "<br>";
}

echo "<br>";

foreach ($users as $clé => $valeur) {

    echo "je suis la clé : " . $clé . " et je suis  la valeur : " . $valeur . "<br>";
}

// foreach avec un tableau indexé 

$ville = [" toulon", "buenos-aires", "barcelone"];

echo "<br>";

foreach ($ville as $index) {

    echo " ma ville est : " . $index . "<br>";
}

foreach ($ville as $index => $valeur) {


    echo " ma ville est : " . $valeur . " et son index " . $index . " <br>";
}


// boucle while



$i = 0; // valeur de départ de la boucle

while ($i < 5) { // tant que $i est inferieur à 5 nous entrons dans la boucle
    echo "$i---"; //tu affiche la valeur de $i
    $i++; // on onblie pas d'incrémenter de 1 à chaque tour de boucle pour ne pas avoir une boucle infinie
} // pas besoin de ; 

echo "<br>";
// boucle do...while

$j = 11;

do {

    echo $j++ . " ";
    echo "je fais un tour de boucle <br>";
} while ($j > 10 && $j < 20);

//  pour exo 1 pour verifier si nombre est pair utiliser modulo % si $nombre % 2 ===0 donc $nombre est paire sinon non paire


date('Y');










//exo 1 
$nombre = 1;
while ($nombre <= 20) {
    if ($nombre % 2 === 0) {
        echo "dd $nombre" . "<br>";
    }
    $nombre++;
}

// exo 2 

$annee = 2000;
$anneeNow = date('Y');

echo "<ul>";

while ($annee <= $anneeNow) {
    echo "<li> 'gg'.$annee </li>";
    $annee++;
}

echo "<ul>";


//exo 3
$h = 33 % 3;
echo "$h";
echo "<br>";
$n = 7;

do {

    if ($n > 30) {
        echo $n;
    }
    if ($n % 3 === 0) {

        echo "multiple de 3 : " . $n . "<br>";
    }
    $n++;
} while ($n <= 30);


echo "<br>";

//exo4

$nombre = 5;

echo "<h3> la table de multiplication de $nombre</h3>";

for ($i = 0; $i <= 10; $i++) {

    $resultat = $i * $nombre;
    echo $nombre . "X" . $i . "=" . $resultat . "<br>";
}


  for ($nb1=1; $nb1 <=10 ; $nb1++) {
    for ($i=1; $i <=10 ; $i++) {
        echo "$nb1 x $i =" . $nb1*$i;
        echo "<br>";
    }
    echo "<br>";
}
 


//exo 5

?>

<table border="1">
    <?php

    for ($line = 1; $line <= 5; $line++) : ?>

        <tr>
            <?php
            for ($colonne = 1; $colonne <= 5; $colonne++) : ?>

                <td> <?php echo $colonne . " ," . $line ?> </td>



            <?php endfor;



            ?>
        </tr>

    <?php endfor;


    ?>

</table>


<?php


?>
<style>
    .green {
        background-color: greenyellow;
    }
</style>
<table border="1">
    <?php
    for ($ligne = 1; $ligne <= 10; $ligne++) : ?>

        <tr>
            <?php
            for ($col = 1; $col <= 10; $col++) : ?>

                <td class="<?php
                            $number = rand(0, 100);
                            if ($number % 2 == 0) : ?>
         green
        <?php endif;


        ?>"> <?php echo $number; ?> </td>


            <?php endfor;

            ?>
        </tr>

    <?php endfor;

    $test = 83 % 2;
    echo $test;


    ?>






</table>