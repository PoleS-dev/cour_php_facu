<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connexion PDO propre avec options recommandées
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

// --------------------------
// NIVEAU 1 : Base du fetch()
// --------------------------

function exo1_afficherTousLesLivres($pdo) {
    $stmt = $pdo->query("SELECT * FROM livres");
    echo "<h3>1. Tous les livres</h3>";
    foreach ($stmt as $livre) {
        echo "{$livre['titre']} ({$livre['annee_publication']}) - {$livre['genre']}<br>";
    }
}

function exo2_auteursAlpha($pdo) {
    $stmt = $pdo->query("SELECT * FROM auteurs ORDER BY nom");
    echo "<h3>2. Auteurs par ordre alphabétique</h3>";
    foreach ($stmt as $auteur) {
        echo $auteur['nom'] . "<br>";
    }
}

function exo3_livreParId($pdo, $id = 2) {
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $livre = $stmt->fetch();
    echo "<h3>3. Livre ID = $id</h3>";
    echo "{$livre['titre']} - {$livre['annee_publication']} - {$livre['genre']}<br>";
}

function exo4_membresAvantDate($pdo, $date = '2025-04-05') {
    $stmt = $pdo->prepare("SELECT * FROM membres WHERE date_inscription < :date");
    $stmt->execute(['date' => $date]);
    echo "<h3>4. Membres inscrits avant $date</h3>";
    foreach ($stmt as $membre) {
        echo $membre['nom'] . " ({$membre['date_inscription']})<br>";
    }
}

function exo5_livresApresAnnee($pdo, $annee = 1950) {
    $stmt = $pdo->prepare("SELECT titre FROM livres WHERE annee_publication > :annee");
    $stmt->execute(['annee' => $annee]);
    echo "<h3>5. Livres publiés après $annee</h3>";
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}

// ------------------------------
// NIVEAU 2 : Paramètres dynamiques
// ------------------------------

function exo6_livresParAuteur($pdo, $nomAuteur) {
    $stmt = $pdo->prepare("
        SELECT livres.titre FROM livres
        JOIN auteurs ON livres.auteur_id = auteurs.id
        WHERE auteurs.nom = :nom
    ");
    $stmt->execute(['nom' => $nomAuteur]);
    echo "<h3>6. Livres de $nomAuteur</h3>";
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}

function exo7_empruntsParEmail($pdo, $email) {
    $stmt = $pdo->prepare("
        SELECT livres.titre, date_emprunt FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        WHERE membres.email = :email
    ");
    $stmt->execute(['email' => $email]);
    echo "<h3>7. Emprunts par $email</h3>";
    foreach ($stmt as $row) {
        echo "{$row['titre']} - Emprunté le {$row['date_emprunt']}<br>";
    }
}

function exo8_livresParGenre($pdo, $genre) {
    $stmt = $pdo->prepare("SELECT titre FROM livres WHERE genre = :genre");
    $stmt->execute(['genre' => $genre]);
    echo "<h3>8. Livres du genre $genre</h3>";
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}

function exo9_membresParLivre($pdo, $titre) {
    $stmt = $pdo->prepare("
        SELECT membres.nom FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        WHERE livres.titre = :titre
    ");
    $stmt->execute(['titre' => $titre]);
    echo "<h3>9. Membres ayant emprunté '$titre'</h3>";
    foreach ($stmt as $row) {
        echo $row['nom'] . "<br>";
    }
}

function exo10_empruntsEntreDates($pdo, $debut, $fin) {
    $stmt = $pdo->prepare("
        SELECT * FROM emprunts
        WHERE date_emprunt BETWEEN :debut AND :fin
    ");
    $stmt->execute(['debut' => $debut, 'fin' => $fin]);
    echo "<h3>10. Emprunts entre $debut et $fin</h3>";
    foreach ($stmt as $e) {
        echo "ID emprunt : {$e['id']} - Date : {$e['date_emprunt']}<br>";
    }
}

// ------------------------------
// NIVEAU 3 : INSERT / UPDATE / DELETE
// ------------------------------

function exo11_ajouterMembre($pdo, $nom, $email) {
    $stmt = $pdo->prepare("INSERT INTO membres (nom, email) VALUES (:nom, :email)");
    $stmt->execute(['nom' => $nom, 'email' => $email]);
    echo "<h3>11. Membre ajouté : $nom</h3>";
}

function exo12_ajouterLivre($pdo, $titre, $annee, $genre, $auteurId) {
    $stmt = $pdo->prepare("
        INSERT INTO livres (titre, annee_publication, genre, auteur_id)
        VALUES (:titre, :annee, :genre, :auteur)
    ");
    $stmt->execute([
        'titre'  => $titre,
        'annee'  => $annee,
        'genre'  => $genre,
        'auteur' => $auteurId
    ]);
    echo "<h3>12. Livre ajouté : $titre</h3>";
}

function exo13_ajouterEmprunt($pdo, $membreId, $livreId) {
    $stmt = $pdo->prepare("
        INSERT INTO emprunts (membre_id, livre_id, date_emprunt)
        VALUES (:membre, :livre, CURDATE())
    ");
    $stmt->execute(['membre' => $membreId, 'livre' => $livreId]);
    echo "<h3>13. Emprunt enregistré</h3>";
}

function exo14_modifierEmail($pdo, $id, $newEmail) {
    $stmt = $pdo->prepare("UPDATE membres SET email = :email WHERE id = :id");
    $stmt->execute(['email' => $newEmail, 'id' => $id]);
    echo "<h3>14. Email du membre #$id mis à jour</h3>";
}

function exo15_supprimerLivre($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM livres WHERE id = :id");
    $stmt->execute(['id' => $id]);
    echo "<h3>15. Livre supprimé (ID $id)</h3>";
}

// ------------------------------
// NIVEAU 4 : Jointures & stats
// ------------------------------

function exo16_listeEmprunts($pdo) {
    $stmt = $pdo->query("
        SELECT membres.nom AS membre, livres.titre, auteurs.nom AS auteur, emprunts.date_emprunt
        FROM emprunts
        JOIN membres ON emprunts.membre_id = membres.id
        JOIN livres ON emprunts.livre_id = livres.id
        JOIN auteurs ON livres.auteur_id = auteurs.id
    ");
    echo "<h3>16. Liste des emprunts détaillée</h3>";
    foreach ($stmt as $row) {
        echo "{$row['membre']} a emprunté '{$row['titre']}' de {$row['auteur']} le {$row['date_emprunt']}<br>";
    }
}

function exo17_livresAvecAuteurs($pdo) {
    $stmt = $pdo->query("
        SELECT livres.titre, auteurs.nom FROM livres
        JOIN auteurs ON livres.auteur_id = auteurs.id
    ");
    echo "<h3>17. Livres et leurs auteurs</h3>";
    foreach ($stmt as $row) {
        echo "{$row['titre']} par {$row['nom']}<br>";
    }
}

function exo18_livresJamaisEmpruntes($pdo) {
    $stmt = $pdo->query("
        SELECT titre FROM livres
        WHERE id NOT IN (SELECT livre_id FROM emprunts)
    ");
    echo "<h3>18. Livres jamais empruntés</h3>";
    foreach ($stmt as $row) {
        echo $row['titre'] . "<br>";
    }
}

function exo19_membresSansEmprunt($pdo) {
    $stmt = $pdo->query("
        SELECT nom FROM membres
        WHERE id NOT IN (SELECT membre_id FROM emprunts)
    ");
    echo "<h3>19. Membres sans emprunt</h3>";
    foreach ($stmt as $row) {
        echo $row['nom'] . "<br>";
    }
}

function exo20_nombreLivresParMembre($pdo) {
    $stmt = $pdo->query("
        SELECT membres.nom, COUNT(emprunts.id) AS total FROM membres
        LEFT JOIN emprunts ON membres.id = emprunts.membre_id
        GROUP BY membres.id
    ");
    echo "<h3>20. Nombre de livres empruntés par membre</h3>";
    foreach ($stmt as $row) {
        echo "{$row['nom']} : {$row['total']} livre(s)<br>";
    }
}

// 📌 Appel de tests manuels (exemples)
exo1_afficherTousLesLivres($pdo);
exo2_auteursAlpha($pdo);
exo3_livreParId($pdo);
exo4_membresAvantDate($pdo);
exo5_livresApresAnnee($pdo);
exo6_livresParAuteur($pdo, 'George Orwell')
?>
