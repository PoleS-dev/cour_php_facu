<?php
$routes = [
    "home" => "./pages/home.php",
    "profil" => "./pages/profil.php",
    "apropos" => "./pages/a_propos.php",
    "404" => "./pages/404.php",
    "connexion" => "./pages/connexion.php",
    "deconnexion" => "./pages/deconnexion.php",
    "inscription" => "./pages/inscription.php",
    "language" => "./pages/language.php"
];

// Vérifie si le paramètre GET 'page' existe$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
var_dump($_GET);

// Vérifie si la page demandée existe dans le tableau de routes
if (array_key_exists($page, $routes)) {
    include $routes[$page];
} else {
    // Page 404 si la route n'existe pas
include $routes["404"];
}





?>



