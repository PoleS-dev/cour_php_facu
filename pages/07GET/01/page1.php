<?php   

ini_set('display_errors', 1);
error_reporting(E_ALL);


var_dump($_GET);


?>
**
* SUPERGLOBALES PHP : Définitions détaillées
*
* ➤ $_GET :
*   Permet de récupérer les données envoyées par l'URL (ex : page.php?nom=Jean).
*   Les données sont visibles dans l’URL, donc non confidentielles.
*   Utilisé pour les recherches, les liens rapides, ou les filtres.
*
* ➤ $_POST :
*   Permet de récupérer les données envoyées par un formulaire avec method="POST".
*   Les données ne sont pas visibles dans l’URL. Convient pour les données sensibles (ex : mot de passe).
*   Utilisé pour créer, modifier ou supprimer des données.
*
* ➤ $_SESSION :
*   Sert à stocker des données côté serveur pour un utilisateur donné.
*   Les données restent disponibles d’une page à l’autre tant que la session n’est pas détruite ou expirée.
*   Idéal pour conserver un panier, un état de connexion, ou un compteur de visites.
*   Nécessite un appel à session_start() au début du script.
*
* ➤ $_COOKIE :
*   Stocke des informations côté client (navigateur) sous forme de petits fichiers.
*   Utile pour garder des préférences (ex : pseudo, thème, dernier produit consulté).
*   Peut être défini avec setcookie(nom, valeur, expiration).
*   Attention : le cookie n’est disponible qu’à partir du prochain chargement de page.
*
* ➤ Toutes ces variables sont dites "superglobales" car elles sont disponibles dans tous les contextes PHP automatiquement.
*/
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



