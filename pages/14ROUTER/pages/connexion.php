<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
 if(isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
      // 🔹 Mettre à jour l'activité de l'utilisateur
      $_SESSION['LAST_ACTIVITY'] = time();
      $_SESSION['logged_in'] = true;
 } 
 
 if (isset($_SESSION['LAST_ACTIVITY'])) {
    // 🔹 Temps écoulé depuis la dernière activité
    $tempsInactif = time() - $_SESSION['LAST_ACTIVITY'];

    if ($tempsInactif > $session_timeout) {
        // 🔥 L'utilisateur est inactif trop longtemps ➜ Déconnexion
        session_unset();
        session_destroy();

        // Redirection vers la page de connexion
        header("Location: home");
        exit();
    }
}

 createCookie("name", $_POST['name']);


 header("Location: language");
 exit();
}



?>



<form action="" method="post" >

<label for="">name</label>
<input type="text" value="<?= $user['prenom'] ?>" name="name">
<input type="submit" value="se connecter">
</form>