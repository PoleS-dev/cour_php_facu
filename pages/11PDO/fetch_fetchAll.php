<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connexion à la base de données avec PDO
$dsn = 'mysql:host=localhost;dbname=ecole;charset=utf8';
$user = 'root';       // À adapter
$password = 'votre_mot_de_passe';       // À adapter

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

/*
|---------------------------------------------------------------
| EXEMPLE 1 : Récupérer un seul élève avec fetch() (sécurisé)
|---------------------------------------------------------------
| On utilise prepare() + execute() même sans paramètre.
*/

$sql = "SELECT * FROM eleves LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(); // Même sans paramètres, on exécute

$eleve = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<h3>Un seul élève (avec fetch)</h3>";
echo "ID: {$eleve['id']} - Nom: {$eleve['nom']} - PC: {$eleve['ordinateur_numero']}<br>";

while ($eleve = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$eleve['id']} - Nom: {$eleve['nom']} - PC: {$eleve['ordinateur_numero']}<br>";
}

/*
|---------------------------------------------------------------
| EXEMPLE 2 : Récupérer tous les élèves avec fetchAll()
|---------------------------------------------------------------
*/

$sqlAll = "SELECT * FROM eleves";
$stmtAll = $pdo->prepare($sqlAll);
$stmtAll->execute();

$eleves = $stmtAll->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Liste complète des élèves</h3>";
foreach ($eleves as $e) {
    echo "ID: {$e['id']} - Nom: {$e['nom']} - PC: {$e['ordinateur_numero']}<br>";
}

/*
|---------------------------------------------------------------
| EXEMPLE 3 : Trier par nom (ordre alphabétique)
|---------------------------------------------------------------
*/

$listeNoms = array_column($eleves, 'nom');
sort($listeNoms);

echo "<h3>Noms triés alphabétiquement</h3>";
foreach ($listeNoms as $nom) {
    echo $nom . "<br>";
}

/*
|---------------------------------------------------------------
| EXEMPLE 4 : Filtrer les élèves avec un 'a' dans le nom
|---------------------------------------------------------------
*/

$avecA = array_filter($eleves, function($eleve) {
    return stripos($eleve['nom'], 'a') !== false;
});

echo "<h3>Élèves contenant la lettre 'a'</h3>";
foreach ($avecA as $e) {
    echo "{$e['nom']} (PC: {$e['ordinateur_numero']})<br>";
}

/*
|---------------------------------------------------------------
| EXEMPLE 5 : Compter les élèves
|---------------------------------------------------------------
*/

echo "<h3>Nombre total d'élèves : " . count($eleves) . "</h3>";

/*
|---------------------------------------------------------------
| EXEMPLE 6 : Trier par numéro de PC
|---------------------------------------------------------------
*/

usort($eleves, function($a, $b) {
    return $a['ordinateur_numero'] <=> $b['ordinateur_numero'];
});

echo "<h3>Élèves triés par numéro de PC</h3>";
foreach ($eleves as $e) {
    echo "{$e['nom']} - PC #{$e['ordinateur_numero']}<br>";
}


/*
|---------------------------------------------------------------
| EXEMPLE 7 : Supprimer un élève par ID (ex: supprimer l’élève avec ID 12)
|---------------------------------------------------------------
| - On utilise exec() pour les requêtes qui ne retournent pas de données (INSERT, DELETE, UPDATE).
| - Ici on montre aussi prepare() + execute() pour sécuriser contre les injections.
*/

// ID de l’élève à supprimer (exemple : Adam avec ID 12)
$idASupprimer = 12;

// Préparation sécurisée
$stmt = $pdo->prepare("DELETE FROM eleves WHERE id = :id");
$stmt->bindParam(':id', $idASupprimer, PDO::PARAM_INT);

// Exécution
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<h3>Élève avec ID $idASupprimer supprimé avec succès.</h3>";
} else {
    echo "<h3>Aucun élève trouvé avec ID $idASupprimer.</h3>";
}
?>

fetch()	Récupère une ligne (utilisable dans une boucle)
fetchAll()	Récupère toutes les lignes
array_column()	Extrait une seule colonne d’un tableau
sort()	Trie un tableau simple
array_filter()	Filtre les éléments avec une condition
stripos()	Recherche insensible à la casse
count()	Compte les éléments
usort()	Trie un tableau multidimensionnel
