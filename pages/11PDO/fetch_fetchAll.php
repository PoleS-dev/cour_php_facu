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

$sql = "SELECT * FROM eleves ";
$stmt = $pdo->prepare($sql);
$stmt->execute(); // Même sans paramètres, on exécute


$eleve = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<h3>Un seul élève (avec fetch)</h3>";
echo "ID: {$eleve['id']} - Nom: {$eleve['nom']} - PC: {$eleve['ordinateur_numero']}<br>";


echo "<h3>Liste des élèves avec fetch()</h3>";
$sql = "SELECT * FROM eleves"; 
var_dump($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute();
// dans $tmt il y a une liste invisible des eleves 
// La méthode fetch() lit la prochaine ligne disponible dans le résultat SQL.

// Chaque appel avance d’une ligne, comme un curseur
// quand on fait un fetch on recupère la premiere de ce resultat
// avec un deuxieme feth() on recupère la deuxiemme ligne du resultat : 
// exemple :
var_dump($stmt);
$ligne1 = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($ligne1); // 🔹 Tu vois la première ligne

$ligne2 = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($ligne2); // 🔹 Deuxième ligne

$ligne3 = $stmt->fetch(PDO::FETCH_NUM);
var_dump($ligne3); // 🔹 Troisième ligne
$elevess = $stmt->fetch(PDO::FETCH_ASSOC);

// de cette maniere avec la boucle while on recupère 1 par 1 les eleves

while ($eleves = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

$eleves = $stmtAll->fetchAll(PDO::FETCH_NUM);
// ici nous avons recuperer tout les éléves d'un coup

echo "<h3>Liste complète des élèves avec  fetchAll</h3>";
var_dump($eleves);
foreach ($eleves as $e) {
    echo "ID: {$e['id']} - Nom: {$e['nom']} - PC: {$e['ordinateur_numero']}<br>";
}
/*
|---------------------------------------------------------------
| EXEMPLE 3 : Trier par nom (ordre alphabétique)
|---------------------------------------------------------------
*/
echo "<h3>Noms triés alphabétiquement</h3>";
var_dump($eleves);
$listeNoms = array_column($eleves, 'nom');
var_dump($listeNoms);
sort($listeNoms);


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





/*
|---------------------------------------------------------------
| EXEMPLE 8 : Exemple de formulaire de connexion avec verification du user existe dans la base de donnée
|---------------------------------------------------------------
| - On utilise exec() pour les requêtes qui ne retournent pas de données (INSERT, DELETE, UPDATE).
| - Ici on montre aussi prepare() + execute() pour sécuriser contre les injections.
*/


//  Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom_utilisateur'])) {

    // 🔍Nettoie la saisie
    $nomSaisi = trim($_POST['nom_utilisateur']);

    //  Préparation de la requête SQL
    $stmt = $pdo->prepare("SELECT * FROM eleves WHERE nom = :nom");
 
    $stmt->execute([
        ":nom"=> $nomSaisi,
    ]);

    //  Récupère un utilisateur si trouvé
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    //  Affiche un message en fonction du résultat
    if ($utilisateur) {
        echo "<h3>Bienvenue {$utilisateur['nom']} !  Connexion réussie.</h3>";
    } else {
        echo "<h3> Utilisateur non trouvé. Veuillez réessayer.</h3>";
    }
}
?>

<h2>Connexion utilisateur</h2>

<form method="POST">
    <label for="nom_utilisateur">Nom :</label>
    <input type="text" name="nom_utilisateur" required>
    <button type="submit">Se connecter</button>
</form>

<?php 

$sqlAll = "SELECT * FROM eleves";
$stmtAll = $pdo->prepare($sqlAll);
$stmtAll->execute();

$eleves = $stmtAll->fetchAll(PDO::FETCH_ASSOC);
var_dump($eleves);
echo "<pre>";
print_r($eleves);
echo "</pre>";
var_dump($_GET);
var_dump($_POST);

$contenu = "";

// Suppression sécurisée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["sup"], $_POST['id'])) {
    $isUserSup = (int) $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM eleves WHERE id = :id");
    $stmt->execute([
        ":id" => $isUserSup,
    ]);

    if ($stmt->rowCount() > 0) {
        $contenu = "ID {$isUserSup} supprimé avec succès.";
    } else {
        $contenu = " Aucun élève supprimé. ID inexistant ?";
    }
}

// Affichage du message
if (!empty($contenu)) {
    echo "<p style='color:green;'>$contenu</p>";
}

// Affichage des élèves + formulaire de suppression
foreach ($eleves as $e) {
    echo "
    ID: {$e['id']} - Nom: {$e['nom']} - PC: {$e['ordinateur_numero']}
    <form action='fetch_fetchAll.php' method='POST' style='display:inline'>
        <input type='hidden' name='id' value='{$e['id']}'>
        <input type='submit' name='sup' value='Supprimer'>
    </form><br>";
}


//UPDATE

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = (int) $_POST['id'];
    $nouveauNom = trim($_POST['nom']);

    $stmt = $pdo->prepare("UPDATE eleves SET nom = :nom WHERE id = :id");
    $stmt->execute([
        ':nom' => $nouveauNom,
        ':id' => $id
    ]);

    // Vérifie si l’UPDATE a affecté une ligne
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✅ Élève ID $id mis à jour avec succès ! Nouveau nom : $nouveauNom</p>";
    } else {
        echo "<p style='color: red;'>❌ Aucun changement effectué. L’élève existe-t-il ? Ou même nom ?</p>";
    }
}
?>
<h2>Modifier le nom d’un élève</h2>
<form method="POST">
    <label for="id">ID de l’élève :</label>
    <input type="number" name="id" required>
    <label for="id">ID de l’élève :</label>
    <input type="number" name="id" required>
    <br>
    <label for="nom">Nouveau nom :</label>
    <input type="text" name="nom" required>
    <br>
    <input type="submit" name="modifier" value="Mettre à jour">
</form>










fetch()	Récupère une ligne (utilisable dans une boucle)
fetchAll()	Récupère toutes les lignes
array_column()	Extrait une seule colonne d’un tableau
sort()	Trie un tableau simple
array_filter()	Filtre les éléments avec une condition
stripos()	Recherche insensible à la casse
count()	Compte les éléments
usort()	Trie un tableau multidimensionnel
