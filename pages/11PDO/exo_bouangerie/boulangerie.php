<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);




// Chaîne de connexion DSN (Data Source Name)
$dsn = "mysql:host=localhost;dbname=boulangerie_simple"; // Remplacer 'societe' par le nom réel de votre base
$user = "root"; // Nom d'utilisateur MySQL
$password = "votre_mot_de_passe"; // Mot de passe de l'utilisateur MySQL

try {
    /**
     * Création d'une instance PDO pour la connexion à la base de données
     *
     * PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION : active le mode exception pour la gestion des erreurs SQL
     * PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC : les résultats seront récupérés sous forme de tableau associatif
     * PDO::ATTR_EMULATE_PREPARES => false : désactive l'émulation des requêtes préparées (meilleure sécurité et performance)
     */
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    echo "Connexion réussie";
} catch (PDOException $exception) {
    // Affichage de l'erreur si la connexion échoue
    echo "Erreur de connexion à la base de données : " . $exception->getMessage();
    exit;
}


// je selectionne  produit de la base de données
$sql = "SELECT * FROM produit ";

$stmt = $pdo->prepare($sql);

$stmt->execute();

// je recupere la liste des produits de la base de données stocké dans $produits
$produits = $stmt->fetchAll();

// echo "<pre>";
// print_r($produits);

// echo "</pre>";

?>

<header style="width:100%; display:flex; border: 1px solid #000; padding: 10px; margin: 10px; flex-wrap: wrap; gap: 10px;">
    <h1>Boulangerie Simple</h1>
    <nav style="width: 400px;margin:auto; display:flex; flex-wrap: wrap; gap: 10px;">

        <?php
        $sql = "SELECT * FROM categorie ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $categories = $stmt->fetchAll();

        foreach ($categories as $categorie) {
            echo "<a href='byCategorie.php?category=" . $categorie['nom'] . "'>" . $categorie['nom'] . "</a>";
        }
        ?>

    </nav>
</header>

<section style="width:100%; display:flex; border: 1px solid #000; padding: 10px; margin: 10px; flex-wrap: wrap; gap: 10px;">

    <?php foreach ($produits as $produit) : ?>

        <div style="border: 1px solid #000; padding: 10px; margin: 10px; width: 200px; ">

            <div style="width:100%;">
                <img style="width:100%;" src="https://media.istockphoto.com/id/496564915/fr/photo/pain-et-petits-pains.jpg?s=612x612&w=0&k=20&c=RFPiTwOdeBi3kY8ge-W51Dpe8OiMWaDC5PAa5rEQOzY=" alt="">
            </div>

            <div style="width:100%;">
                <h3><?= htmlspecialchars($produit['nom']); ?></h3>
            </div>

            <p><?= htmlspecialchars($produit['categorie']); ?></p>
            <p><?= htmlspecialchars($produit['prix']); ?> €</p>

        </div>

    <?php endforeach; ?>

</section>

<?php


$sql = "SELECT * FROM utilisateur WHERE id = 1 ";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$utilisateur = $stmt->fetch();

// var_dump($utilisateur);

?>

<p><?= htmlspecialchars($utilisateur['nom']) . " " . htmlspecialchars($utilisateur['prenom']); ?> est fan de <?= htmlspecialchars($produits[2]['nom']); ?></p>