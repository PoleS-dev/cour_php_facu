<?php



// Protection du prénom
$prenom = 'Invité';

if (!empty($_SESSION['prenom'])) {
    $prenom = htmlspecialchars($_SESSION['prenom'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($_COOKIE['prenom'])) {
    $prenom = htmlspecialchars($_COOKIE['prenom'], ENT_QUOTES, 'UTF-8');
}

$language="English";
if(!empty($_SESSION['language'])){
    $language = htmlspecialchars($_SESSION['language'], ENT_QUOTES, 'UTF-8');
} elseif(!empty($_COOKIE['language'])){
    $language = htmlspecialchars($_COOKIE['language'], ENT_QUOTES, 'UTF-8');
}

$user = [
    'prenom' => $prenom,
    'lang'   => $language,
   
];

define("ROOT", "/router");

?>