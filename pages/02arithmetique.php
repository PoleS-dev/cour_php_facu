<?php
include_once(__DIR__ . '../../utils.php');

?>

<h2>Opérateurs arithmétiques</h2>

<?php
function br(){

    echo "<br>";
}

$a=12;
$b=13;

echo $a + $b;
br();

echo $a - $b;
br();

echo $a * $b;
br();

echo $a / $b;
br();

echo $a % $b;
br();


?>

<h2>Operations et affectations combinées</h2>

<?php
 // c'est une façon d'écrire les calcules avec abreviations, pour simplifier l'écriture.
$a=10;
$b=2;

echo $a += $b; // équivaut à $a = $a + $b, $a vaut donc au final 12;
br();
echo $a -= $b; // équivaut à $a = $a - $b, $a vaut donc au final 10;
br();
echo $a /= $b; // équivaut à $a = $a / $b, $a vaut donc au final 5;
br();
echo $a *= $b; // équivaut à $a = $a * $b, $a vaut donc au final 10;
br();
echo $a %= $b; // équivaut à $a = $a % $b, $a vaut donc au final 0;
br();

?>

<h2>
    Incrémenter et décrémenter
</h2>

<?php
echo "<h3>incrémentation</h3>";
$i=0;
echo $i;
br();
echo $i++; // la variable $i est d'abord retournée puis elle est incrémenté de 1, affiche 0
br();
echo $i;// affiche 1

$s=0;
br();
echo $s;
br();
echo ++$s; // la variable $s est d'abord incrémentée puis retournée affiche 1

echo "<h3>décrémentation</h3>";

$six=6;
echo $six--;
br();
echo $six;
br();
$sept=7;
echo --$sept;

//Postfixe : $x++ ou $x--
// postfixe c'est quand on met un opérateur après
// $x++ renvoie la valeur actuelle puis incrémente de 1
// $x-- renvoie la valeur actuelle puis décrémente de 1


//Prefixe  : ++$x ou --$x 
//prefixe c'est quand on met un opérateur avant
// ++$x incrémente d'abort puis revoie la nouvelle valeur
// --$x décrémente d'abort puis revoie la nouvelle valeur


?>
<br>
<br>
<br>
<br>
//Postfixe : $x++ ou $x--
// postfixe c'est quand on met un opérateur après
<br>
// $x++ renvoie la valeur actuelle puis incrémente de 1
<br>
// $x-- renvoie la valeur actuelle puis décrémente de 1
<br>
<br>
<br>
<br>

//Prefixe  : ++$x ou --$x 
<br>
//prefixe c'est quand on met un opérateur avant
<br>
// ++$x incrémente d'abort puis revoie la nouvelle valeur
<br>
// --$x décrémente d'abort puis revoie la nouvelle valeur

