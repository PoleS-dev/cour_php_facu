<?php
session_start(); // Nécessaire pour utiliser $_SESSION

// Traitement des actions de suppression
if (isset($_GET['reset_session'])) {
    session_destroy(); // Supprime toutes les données de session
    header("Location: exo.php"); // Recharge la page sans le paramètre
    exit;
}
if (isset($_GET['delete_cookie'])) {
    setcookie("pseudo", "", time() - 3600); // Supprime le cookie en le rendant expiré
    header("Location: exo.php");
    exit;
}

// 17. Compteur de visites
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}
$_SESSION['visites']++;

// 18. Dernier produit consulté via GET
if (isset($_GET['produit'])) {
    setcookie("dernier_produit", $_GET['produit'], time() + 3600);
}

// 19. Ajout au panier via GET
if (isset($_GET['add'])) {
    $_SESSION['panier'][] = $_GET['add'];
}

// 20. Connexion simple
$users = ['admin' => '1234', 'user' => 'pass'];
$login_error = '';
if (isset($_POST['login'], $_POST['password'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    if (isset($users[$login]) && $users[$login] === $pass) {
        $_SESSION['connecte'] = $login;
    } else {
        $login_error = "Identifiants incorrects.";
    }
}
if (isset($_GET['logout'])) {
    unset($_SESSION['connecte']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
</head>
<body>
<h1>Exercices 1 à 20</h1>

<!-- 1. Formulaire GET (prénom) -->
<form method="get">
    <h3>1. Prénom (GET)</h3>
    <input type="text" name="prenom">
    <input type="submit" value="Envoyer">
</form>
<?php if (!empty($_GET['prenom'])): ?>
    <p>Bienvenue <?= htmlspecialchars($_GET['prenom']) ?> !</p>
<?php endif; ?>

<!-- 2. Formulaire POST (nom + prénom) -->
<form method="post">
    <h3>2. Nom et prénom (POST)</h3>
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom2" placeholder="Prénom">
    <input type="submit" value="Envoyer">
</form>
<?php
if (!empty($_POST['nom']) && !empty($_POST['prenom2'])) {
    echo "<p>Bonjour {$_POST['prenom2']} {$_POST['nom']} !</p>";
}
?>

<!-- 3. Email vide ? -->
<form method="post">
    <h3>3. Vérification email (POST)</h3>
    <input type="email" name="email" placeholder="Email">
    <input type="submit" value="Vérifier">
</form>
<?php
if (isset($_POST['email'])) {
    echo empty($_POST['email']) ? "<p>Email vide ❌</p>" : "<p>Email : {$_POST['email']}</p>";
}
?>

<!-- 4. Somme de 2 nombres -->
<form method="get">
    <h3>4. Somme (GET)</h3>
    <input type="number" name="n1">
    <input type="number" name="n2">
    <input type="submit" value="Additionner">
</form>
<?php
if (isset($_GET['n1'], $_GET['n2'])) {
    $somme = intval($_GET['n1']) + intval($_GET['n2']);
    echo "<p>Résultat : $somme</p>";
}
?>

<!-- 5. Couleur choisie -->
<form method="get">
    <h3>5. Choix d'une couleur (GET)</h3>
    <select name="couleur">
        <option value="red">Rouge</option>
        <option value="green">Vert</option>
        <option value="blue">Bleu</option>
    </select>
    <input type="submit" value="Afficher">
</form>
<?php
if (isset($_GET['couleur'])) {
    $couleur = htmlspecialchars($_GET['couleur']);
    echo "<p style='color:$couleur'>Ce texte est en $couleur</p>";
}
?>

<!-- 6. Pays sélectionné -->
<form method="post">
    <h3>6. Sélection d'un pays (POST)</h3>
    <select name="pays">
        <option>France</option>
        <option>Italie</option>
        <option>Japon</option>
    </select>
    <input type="submit" value="Envoyer">
</form>
<?php
if (isset($_POST['pays'])) {
    echo "<p>Vous avez choisi : " . htmlspecialchars($_POST['pays']) . "</p>";
}
?>

<!-- 7. Fruits cochés -->
<form method="post">
    <h3>7. Fruits (POST avec checkbox)</h3>
    <label><input type="checkbox" name="fruits[]" value="pomme"> Pomme</label>
    <label><input type="checkbox" name="fruits[]" value="banane"> Banane</label>
    <label><input type="checkbox" name="fruits[]" value="raisin"> Raisin</label>
    <input type="submit" value="Valider">
</form>
<?php
if (!empty($_POST['fruits'])) {
    echo "<p>Fruits sélectionnés : " . implode(', ', $_POST['fruits']) . "</p>";
}
?>

<!-- 8. Quelle méthode utilisée ? -->
<form method="post">
    <h3>8. Méthode utilisée ?</h3>
    <input type="text" name="donnee">
    <input type="submit" value="Tester">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "<p>Formulaire envoyé en méthode : {$_SERVER['REQUEST_METHOD']}</p>";
}
?>

<!-- 9. Choix radio -->
<form method="post">
    <h3>9. Sexe (POST radio)</h3>
    <label><input type="radio" name="genre" value="Homme"> Homme</label>
    <label><input type="radio" name="genre" value="Femme"> Femme</label>
    <label><input type="radio" name="genre" value="Autre"> Autre</label>
    <input type="submit" value="Envoyer">
</form>
<?php
if (isset($_POST['genre'])) {
    echo "<p>Vous êtes : {$_POST['genre']}</p>";
}
?>

<!-- 10. Formulaire GET multiple -->
<form method="get">
    <h3>10. Données multiples (GET)</h3>
    <input type="text" name="nom_multi" placeholder="Nom">
    <input type="email" name="email_multi" placeholder="Email">
    <input type="number" name="age_multi" placeholder="Âge">
    <input type="submit" value="Afficher">
</form>
<?php
if (isset($_GET['nom_multi'])) {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
}
?>

<hr>
<!-- 11–13. Session nom -->
<form method="post">
    <h3>11–13. Session nom</h3>
    <input type="text" name="session_nom" placeholder="Nom">
    <input type="submit" value="Enregistrer en session">
</form>
<?php
if (!empty($_POST['session_nom'])) {
    $_SESSION['nom'] = $_POST['session_nom'];
}
if (isset($_SESSION['nom'])) {
    echo "<p>Nom en session : {$_SESSION['nom']}</p>";
}
?>
<a href="?reset_session=1">❌ Supprimer session</a>

<hr>
<!-- 14–16. Cookie pseudo -->
<form method="post">
    <h3>14–16. Cookie pseudo</h3>
    <input type="text" name="pseudo_cookie" placeholder="Pseudo">
    <input type="submit" value="Enregistrer cookie">
</form>
<?php
if (!empty($_POST['pseudo_cookie'])) {
    setcookie("pseudo", $_POST['pseudo_cookie'], time() + 3600);
}
if (isset($_COOKIE['pseudo'])) {
    echo "<p>Pseudo en cookie : {$_COOKIE['pseudo']}</p>";
}
?>
<a href="?delete_cookie=1">❌ Supprimer cookie</a>

<hr>
<!-- 17. Visites -->
<h3>17. Nombre de visites (SESSION) : <?= $_SESSION['visites'] ?></h3>

<!-- 18. Dernier produit consulté -->
<h3>18. Dernier produit :</h3>
<a href="?produit=pantalon">Pantalon</a>
<a href="?produit=tee-shirt">Tee-shirt</a>
<?php
if (isset($_COOKIE['dernier_produit'])) {
    echo "<p>Dernier produit consulté : {$_COOKIE['dernier_produit']}</p>";
}
?>

<hr>
<!-- 19. Panier -->
<h3>19. Panier</h3>
<a href="?add=banane">Ajouter Banane</a>
<a href="?add=pomme">Ajouter Pomme</a>
<a href="?add=raisin">Ajouter Raisin</a>
<?php
if (!empty($_SESSION['panier'])) {
    echo "<p>Contenu du panier : " . implode(', ', $_SESSION['panier']) . "</p>";
}
?>
<a href="?reset_session=1">🧹 Vider le panier</a>

<hr>
<!-- 20. Mini Connexion -->
<h3>20. Connexion</h3>
<?php if (!isset($_SESSION['connecte'])): ?>
<form method="post">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion">
</form>
<p style="color:red"><?= $login_error ?></p>
<?php else: ?>
<p>Bienvenue, <?= $_SESSION['connecte'] ?> !</p>
<a href="?logout=1">Déconnexion</a>
<?php endif; ?>

</body>
</html>
