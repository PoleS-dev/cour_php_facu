<?php
// Affiche toutes les erreurs (utile en développement)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Démarre la session
session_start();

// Debug : affichage des cookies reçus
echo "<h3>📦 Contenu des cookies</h3><pre>";
print_r($_COOKIE);
echo "</pre><hr>";

// Debug : affichage des données POST (formulaire)
echo "<h3>📨 Données POST</h3><pre>";
print_r($_POST);
echo "</pre><hr>";

// Debug : affichage des données de session
echo "<h3>🗂️ Contenu de la session</h3><pre>";
print_r($_SESSION);
echo "</pre>";

// Si le bouton "login" est cliqué
if (isset($_POST['login'])) {

    // Vérifie que les champs sont remplis
    if (!empty($_POST['prenom']) && !empty($_POST['nom'])) {
        // Enregistre les données dans la session
        $_SESSION["prenom"] = $_POST['prenom'];
        $_SESSION["nom"] = $_POST['nom'];
    }

    // Récupère les données depuis la session
    $session_name = $_SESSION["nom"] ?? '';
    $session_prenom = $_SESSION["prenom"] ?? '';

   // 🟢 Si l'utilisateur accepte les cookies (ou ne les refuse pas explicitement)
if (isset($_POST["cookie_accepted"]) || empty($_POST["cookie_refused"])) {
    // 🔐 On enregistre les données de session dans des cookies pour les réutiliser plus tard

    // ✅ Crée un cookie contenant le nom de l'utilisateur
    // - durée : 30 jours (86400 secondes × 30)
    // - chemin : restreint à /cour_php/pages/10COOKIE/
    setcookie('cookie_name', $session_name, time() + 86400 * 30, "/cour_php/pages/10COOKIE/");

    // ✅ Crée un cookie contenant le prénom de l'utilisateur
    setcookie('cookie_prenom', $session_prenom, time() + 86400 * 30, "/cour_php/pages/10COOKIE/");

    // ✅ Marque que l'utilisateur a accepté les cookies
    setcookie('cookie_accepted', 'true', time() + 86400 * 30, "/cour_php/pages/10COOKIE/");
}

// 🔴 Si l'utilisateur clique sur "refuser les cookies"
if (isset($_POST["cookie_refused"])) {
    // ❌ On supprime les cookies en les expirant immédiatement
    // - Pour cela, on leur donne une date d’expiration passée (ex : time() - 3600)

    setcookie('cookie_name', '', time() - 3600, "/cour_php/pages/10COOKIE/");
    setcookie('cookie_prenom', '', time() - 3600, "/cour_php/pages/10COOKIE/");
    setcookie('cookie_accepted', 'false', time() - 3600, "/cour_php/pages/10COOKIE/");
}

    // Redirection après traitement
    header('Location: welcom.php'); 
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Cookies</title>
    <style>
        .modal {
            width: 50%;
            padding: 5px;
            background-color: greenyellow;
        }
    </style>
</head>
<body>

    <!-- 🧾 Formulaire de connexion -->
    <form method="post">
        <label>Nom :</label>
        <input 
            type="text" 
            name="nom" 
            value="<?php echo isset($_COOKIE['cookie_name']) ? htmlspecialchars($_COOKIE['cookie_name']) : ""; ?>"
        >

        <label>Prénom :</label>
        <input 
            type="text" 
            name="prenom" 
            value="<?php echo isset($_COOKIE['cookie_prenom']) ? htmlspecialchars($_COOKIE['cookie_prenom']) : ""; ?>"
        >

        <input type="submit" name="login" value="Login">
    </form>

    <!-- ✅ Choix cookies RGPD -->
    <div class="modal">
        <form method="post">
            <p>Accepter les cookies ?</p>
            <input type="submit" name="cookie_refused" value="Refuser">
            <input type="submit" name="cookie_accepted" value="Accepter">
        </form>
    </div>

</body>
</html>
