<?php 
echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';
echo "<hr>";

echo "<pre>";
var_dump($user);
echo "</pre>";
echo "<hr>";
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
echo "<hr>";

$salutation= translate($language,"Welcome")." ". $user['prenom'];
$votreLangue= translate($language,"text")." ". $user['lang'];
?>



<h1>home</h1>

<h2> <?= $salutation ?></h2>
<h3> <?= $votreLangue ?></h3>