<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion PDO propre
$dsn = 'mysql:host=localhost;dbname=biblio;charset=utf8';
$user = 'root';
$password = 'votre_mot_de_passe';

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ]);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices Bibliothèque (sans fonctions)</title>
</head>
<body>
<h1>📚 Exercices Bibliothèque – PDO & Formulaires (Sans Fonctions)</h1>

<!-- EXO 1 : Tous les livres -->
<h2>1. Tous les livres</h2>
<form method="post">
    <input type="submit" name="exo1" value="Afficher les livres">
</form>
<?php
if (isset($_POST['exo1'])) {
    $stmt = $pdo->query("SELECT * FROM livres");
    foreach ($stmt as $livre) {
        echo "{$livre['titre']} ({$livre['annee_publication']}) - {$livre['genre']}<br>";
    }
}
?>

<!-- EXO 2 : Auteurs triés -->
<h2>2. Auteurs par ordre alphabétique</h2>
<form method="post">
    <input type="submit" name="exo2" value="Afficher les auteurs">
</form>
<?php
if (isset($_POST['exo2'])) {
    $stmt = $pdo->query("SELECT * FROM auteurs ORDER BY nom");
    foreach ($stmt as $auteur) {
        echo $auteur['nom'] . "<br>";
    }
}
?>

<!-- EXO 3 : Livre par ID -->
<h2>3. Livre par ID</h2>
<form method="post">
    <input type="number" name="id_livre" placeholder="ID du livre" required>
    <input type="submit" name="exo3" value="Rechercher">
</form>
<?php
if (isset($_POST['exo3']) && !empty($_POST['id_livre'])) {
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = :id");
    $stmt->execute(['id' => $_POST['id_livre']]);
    $livre = $stmt->fetch();
    if ($livre) {
        echo "{$livre['titre']} - {$livre['annee_publication']} - {$livre['genre']}<br>";
    } else {
        echo "Aucun livre trouvé avec cet ID.";
    }
}
?>

<!-- EXO 4 : Membres avant une date -->
<h2>4. Membres inscrits avant une date</h2>
<form method="post">
    <input type="date" name="date_limite" required>
    <input type="submit" name="exo4" value="Afficher les membres">
</form>
<?php
if (isset($_POST['exo4']) && !empty($_POST['date_limite'])) {
    $stmt = $pdo->prepare("SELECT * FROM membres WHERE date_inscription < :date");
    $stmt->execute(['date' => $_POST['date_limite']]);
    foreach ($stmt as $membre) {
        echo "{$membre['nom']} ({$membre['date_inscription']})<br>";
    }
}
?>

<!-- EXO 5 : Livres publiés après une année -->
<h2>5. Livres publiés après une année</h2>
<form method="post">
    <input type="number" name="annee_publi" required>
    <input type="submit" name="exo5" value="Afficher les livres">
</form>
<?php
if (isset($_POST['exo5']) && !empty($_POST['annee_publi'])) {
    $stmt = $pdo->prepare("SELECT titre FROM livres WHERE annee_publication > :annee");
    $stmt->execute(['annee' => $_POST['annee_publi']]);
    foreach ($stmt as $livre) {
        echo $livre['titre'] . "<br>";
    }
}
?>

<!-- EXO 6 : Livres d’un auteur -->
<h2>6. Livres d’un auteur</h2>
<form method="post">
    <input type="text" name="nom_auteur" required>
    <input type="submit" name="exo6" value="Chercher">
</form>
<?php
if (isset($_POST['exo6']) && !empty($_POST['nom_auteur'])) {
    $stmt = $pdo->prepare("
        SELECT livres.titre FROM livres
        JOIN auteurs ON livres.auteur_id = auteurs.id
        WHERE auteurs.nom = :nom
    ");
    $stmt->execute(['nom' => $_POST['nom_auteur']]);
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}
?>

<!-- EXO 7 : Emprunts par email -->
<h2>7. Emprunts par email</h2>
<form method="post">
    <input type="email" name="email_membre" required>
    <input type="submit" name="exo7" value="Rechercher">
</form>
<?php
if (isset($_POST['exo7']) && !empty($_POST['email_membre'])) {
    $stmt = $pdo->prepare("
        SELECT livres.titre, date_emprunt FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        WHERE membres.email = :email
    ");
    $stmt->execute(['email' => $_POST['email_membre']]);
    foreach ($stmt as $row) {
        echo "{$row['titre']} - Emprunté le {$row['date_emprunt']}<br>";
    }
}
?>

<!-- EXO 8 : Livres par genre -->
<h2>8. Livres d’un genre</h2>
<form method="post">
    <input type="text" name="genre" required>
    <input type="submit" name="exo8" value="Rechercher">
</form>
<?php
if (isset($_POST['exo8']) && !empty($_POST['genre'])) {
    $stmt = $pdo->prepare("SELECT titre FROM livres WHERE genre = :genre");
    $stmt->execute(['genre' => $_POST['genre']]);
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}
?>

<!-- EXO 9 : Membres ayant emprunté un livre donné -->
<h2>9. Membres ayant emprunté un livre (par titre)</h2>
<form method="post">
    <input type="text" name="titre_livre" required>
    <input type="submit" name="exo9" value="Chercher">
</form>
<?php
if (isset($_POST['exo9']) && !empty($_POST['titre_livre'])) {
    $stmt = $pdo->prepare("
        SELECT membres.nom FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        WHERE livres.titre = :titre
    ");
    $stmt->execute(['titre' => $_POST['titre_livre']]);
    foreach ($stmt as $row) {
        echo $row['nom'] . "<br>";
    }
}
?>

<!-- EXO 10 : Emprunts entre deux dates -->
<h2>10. Emprunts entre deux dates</h2>
<form method="post">
    <input type="date" name="date_debut" required>
    <input type="date" name="date_fin" required>
    <input type="submit" name="exo10" value="Afficher les emprunts">
</form>
<?php
if (isset($_POST['exo10']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])) {
    $stmt = $pdo->prepare("
        SELECT * FROM emprunts
        WHERE date_emprunt BETWEEN :debut AND :fin
    ");
    $stmt->execute([
        'debut' => $_POST['date_debut'],
        'fin'   => $_POST['date_fin']
    ]);
    foreach ($stmt as $e) {
        echo "ID emprunt : {$e['id']} - Date : {$e['date_emprunt']}<br>";
    }
}



?>

<!-- EXO 11 : Ajouter un membre -->
<h2>11. Ajouter un membre</h2>
<form method="post">
    <input type="text" name="nom_membre" placeholder="Nom" required>
    <input type="email" name="email_membre" placeholder="Email" required>
    <input type="submit" name="exo11" value="Ajouter">
</form>
<?php
if (isset($_POST['exo11'])) {
    $stmt = $pdo->prepare("INSERT INTO membres (nom, email) VALUES (:nom, :email)");
    $stmt->execute([
        'nom' => $_POST['nom_membre'],
        'email' => $_POST['email_membre']
    ]);
    echo "<p style='color:green;'>✅ Membre ajouté : {$_POST['nom_membre']}</p>";
}
?>

<!-- EXO 12 : Ajouter un livre -->
<h2>12. Ajouter un livre</h2>
<form method="post">
    <input type="text" name="titre_livre" placeholder="Titre" required>
    <input type="number" name="annee_publi" placeholder="Année" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <input type="number" name="auteur_id" placeholder="ID Auteur" required>
    <input type="submit" name="exo12" value="Ajouter">
</form>
<?php
if (isset($_POST['exo12'])) {
    $stmt = $pdo->prepare("
        INSERT INTO livres (titre, annee_publication, genre, auteur_id)
        VALUES (:titre, :annee, :genre, :auteur)
    ");
    $stmt->execute([
        'titre'  => $_POST['titre_livre'],
        'annee'  => $_POST['annee_publi'],
        'genre'  => $_POST['genre'],
        'auteur' => $_POST['auteur_id']
    ]);
    echo "<p style='color:green;'>✅ Livre ajouté : {$_POST['titre_livre']}</p>";
}
?>

<!-- EXO 13 : Ajouter un emprunt -->
<h2>13. Ajouter un emprunt</h2>
<form method="post">
    <input type="number" name="membre_id" placeholder="ID Membre" required>
    <input type="number" name="livre_id" placeholder="ID Livre" required>
    <input type="submit" name="exo13" value="Enregistrer l'emprunt">
</form>
<?php
if (isset($_POST['exo13'])) {
    $stmt = $pdo->prepare("
        INSERT INTO emprunts (membre_id, livre_id, date_emprunt)
        VALUES (:membre, :livre, CURDATE())
    ");
    $stmt->execute([
        'membre' => $_POST['membre_id'],
        'livre' => $_POST['livre_id']
    ]);
    echo "<p style='color:green;'>✅ Emprunt enregistré</p>";
}
?>

<!-- EXO 14 : Modifier l'email d'un membre -->
<h2>14. Modifier l'email d’un membre</h2>
<form method="post">
    <input type="number" name="id_membre" placeholder="ID Membre" required>
    <input type="email" name="nouvel_email" placeholder="Nouvel Email" required>
    <input type="submit" name="exo14" value="Modifier">
</form>
<?php
if (isset($_POST['exo14'])) {
    $stmt = $pdo->prepare("UPDATE membres SET email = :email WHERE id = :id");
    $stmt->execute([
        'email' => $_POST['nouvel_email'],
        'id'    => $_POST['id_membre']
    ]);
    echo "<p style='color:green;'>✅ Email mis à jour</p>";
}
?>

<!-- EXO 15 : Supprimer un livre -->
<h2>15. Supprimer un livre</h2>
<form method="post">
    <input type="number" name="id_livre_suppr" placeholder="ID du livre à supprimer" required>
    <input type="submit" name="exo15" value="Supprimer">
</form>
<?php
if (isset($_POST['exo15'])) {
    $stmt = $pdo->prepare("DELETE FROM livres WHERE id = :id");
    $stmt->execute(['id' => $_POST['id_livre_suppr']]);
    echo "<p style='color:red;'>❌ Livre supprimé</p>";
}
?>

<!-- EXO 16 : Liste des emprunts -->
<h2>16. Liste détaillée des emprunts</h2>
<form method="post">
    <input type="submit" name="exo16" value="Afficher">
</form>
<?php
if (isset($_POST['exo16'])) {
    $stmt = $pdo->query("
        SELECT membres.nom AS membre, livres.titre, auteurs.nom AS auteur, emprunts.date_emprunt
        FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        JOIN auteurs ON livres.auteur_id = auteurs.id
    ");
    foreach ($stmt as $row) {
        echo "{$row['membre']} a emprunté '{$row['titre']}' de {$row['auteur']} le {$row['date_emprunt']}<br>";
    }
}
?>

<!-- EXO 17 : Livres avec leurs auteurs -->
<h2>17. Livres avec auteurs</h2>
<form method="post">
    <input type="submit" name="exo17" value="Afficher">
</form>
<?php
if (isset($_POST['exo17'])) {
    $stmt = $pdo->query("
        SELECT livres.titre, auteurs.nom FROM livres
        JOIN auteurs ON livres.auteur_id = auteurs.id
    ");
    foreach ($stmt as $row) {
        echo "{$row['titre']} par {$row['nom']}<br>";
    }
}
?>

<!-- EXO 18 : Livres jamais empruntés -->
<h2>18. Livres jamais empruntés</h2>
<form method="post">
    <input type="submit" name="exo18" value="Afficher">
</form>
<?php
if (isset($_POST['exo18'])) {
    $stmt = $pdo->query("
        SELECT titre FROM livres
        WHERE id NOT IN (SELECT livre_id FROM emprunts)
    ");
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}
?>

<!-- EXO 19 : Membres sans emprunt -->
<h2>19. Membres sans emprunt</h2>
<form method="post">
    <input type="submit" name="exo19" value="Afficher">
</form>
<?php
if (isset($_POST['exo19'])) {
    $stmt = $pdo->query("
        SELECT nom FROM membres
        WHERE id NOT IN (SELECT membre_id FROM emprunts)
    ");
    foreach ($stmt as $row) {
        echo $row['nom'] . "<br>";
    }
}
?>

<!-- EXO 20 : Nombre de livres empruntés par membre -->
<h2>20. Nombre de livres empruntés par membre</h2>
<form method="post">
    <input type="submit" name="exo20" value="Afficher">
</form>
<?php
if (isset($_POST['exo20'])) {
    $stmt = $pdo->query("
        SELECT membres.nom, COUNT(emprunts.id) AS total FROM membres
        LEFT JOIN emprunts ON membres.id = emprunts.membre_id
        GROUP BY membres.id
    ");
    foreach ($stmt as $row) {
        echo "{$row['nom']} : {$row['total']} livre(s)<br>";
    }
}
?>

</body>
</html>
