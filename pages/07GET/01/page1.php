<?php   

ini_set('display_errors', 1);
error_reporting(E_ALL);


var_dump($_GET);

?>
<h1>Superglobal $_GET</h1>
<h2>page 1</h2>

<p> En PHP, une variable superGlobel est une varaible intégrée qui est toujours disponible, même à l'interieur d'une fonction</p>
<p>Les superGlobales sont prédefinies par PHP</p>

<p>$_GET  est utilisé pour : </p>
<ul>
    <li>Passer des informations entre pages</li>
    <li>filtrer ou rechercher un contenu</li>
   
</ul>

<p>Avantage de $_GET : </p>

<ul>
    <li>Simple à utliser</li>
    <li> Données visibles dans l'URL</li>
</ul>

<a href="page2.php?article=jean&couleur=rouge&prix=123">jean rouge</a>

<a href="page2.php?article=chemise&couleur=vert&prix=50">chemise verte</a>

<p> "?"  : ce caractère indique le début des paramètres GET qui sont envoyé au fichier PHP </p>
<p>$_GET est utiliser pour envoyer des information via l'URL</p>

<p> Ici "article=chemise" est un parametre GET, article est la clé et chemise est la valeur </p>

<p>& : ce caratère est utiliser pour séparer les paramètres dans une URL </p>

<P> Limite de longueur d'URL : </P>
<p> les navigateurs et serveurs limitent la tailles des URL  </p>
<p> En général : 2083 caratères MAX </p>



