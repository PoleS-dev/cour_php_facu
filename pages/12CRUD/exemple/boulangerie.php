
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">



<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion PDO à la base de données
$host = 'localhost';
$db = 'boul';
$user = 'root';
$pass = 'votre_mot_de_passe';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active l'affichage des erreurs PDO en tant qu'exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourne les résultats sous forme de tableau associatif
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Connexion à la base de données avec PDO
    echo "ok sdcs";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode()); // En cas d'erreur, on affiche le message
}

// Ajout d'un produit à la base de données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $categorie_id = $_POST['categorie_id'];

    // Vérifier si le produit existe déjà (même nom et même catégorie)
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM produits WHERE nom = ? AND categorie_id = ?");
    $checkStmt->execute([$nom, $categorie_id]);

    // fetchColumn() récupère directement la première colonne de la première ligne du résultat
    // Ici, cela retourne le nombre de produits correspondants (ex : 0 ou 1)
    $existe = $checkStmt->fetchColumn();

    if ($existe) {
        echo "<p style='color: red;'>Le produit existe déjà dans cette catégorie.</p>";
    } else {
        // Requête préparée pour insérer un produit (nom, prix, id catégorie)
        $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, categorie_id) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $prix, $categorie_id]);
    }

    echo "<p style='color:green;'>✅ produit ajouté avec succès !</p>";
    header("Refresh: 2; url=" . $_SERVER['PHP_SELF']);
}

// Suppression d'un produit via l'ID passé dans l'URL (?supprimer=ID)
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    // Requête préparée de suppression par ID
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$id]);
}

// Mise à jour d'un produit avec les données du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $categorie_id = $_POST['categorie_id'];

    // Requête préparée pour mettre à jour les champs d'un produit
    $stmt = $pdo->prepare("UPDATE produits SET nom = ?, prix = ?, categorie_id = ? WHERE id = ?");
    $stmt->execute([$nom, $prix, $categorie_id, $id]);
}

// Construction dynamique de la requête SELECT avec filtres
$where = []; // Tableau contenant les conditions WHERE
$params = []; // Tableau des valeurs associées aux conditions

// Si un prix max est fourni, on ajoute une condition
if (!empty($_GET['prix'])) {
    $where[] = "prix <= ?"; // Ajouter condition prix max
    $params[] = $_GET['prix'];
}

// Si une catégorie est sélectionnée, on ajoute une autre condition
if (!empty($_GET['categorie_id'])) {
    $where[] = "categorie_id = ?"; // Ajouter condition sur la catégorie
    $params[] = $_GET['categorie_id'];
}

// Requête principale avec jointure pour obtenir le nom de la catégorie
$sql = "SELECT produits.*, categories.nom AS categorie_nom FROM produits 
        JOIN categories ON produits.categorie_id = categories.id";

// Si des conditions existent, on les ajoute à la requête avec "AND"
if ($where) {
    // implode() combine les éléments du tableau avec un séparateur
    // Ici, cela crée une chaîne comme : "prix <= ? AND categorie_id = ?"
    $sql .= " WHERE " . implode(" AND ", $where); 
}

// Préparation et exécution de la requête avec les paramètres de filtre
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$produits = $stmt->fetchAll(); // Résultat final : liste des produits filtrés

// Récupération de toutes les catégories disponibles (pour les <select>)
$stmtCat = $pdo->prepare("SELECT * FROM categories");
$stmtCat->execute();
$categories = $stmtCat->fetchAll();
?>

<!-- Formulaire d'ajout de produit -->
<form method="post">
    <h3>Ajouter un produit</h3>
    <input type="text" name="nom" placeholder="Nom du produit" required>
    <input type="number" step="0.01" name="prix" placeholder="Prix" required>
    <!-- Sélecteur de catégorie -->
    <select name="categorie_id">
        <!-- On parcourt la liste des catégories récupérées depuis la base -->
        <!-- Chaque option représente une catégorie avec son id comme valeur -->
        <!-- Le texte affiché est le nom de la catégorie -->
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<!-- Formulaire de filtre -->
<form method="get">
    <h3>Filtrer les produits</h3>
    <!-- Champ pour filtrer par prix maximum -->
    <input type="number" name="prix" placeholder="Prix maximum" value="<?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?>">
    <!-- Liste déroulante des catégories avec présélection si filtrée -->
    <select name="categorie_id">
        <option value="">Toutes les catégories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= (isset($_GET['categorie_id']) && $_GET['categorie_id'] == $cat['id']) ? 'selected' : '' ?>><?= $cat['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filtrer</button>
</form>

<!-- Affichage des produits -->
<h3>Liste des produits filtrés</h3>
<?php if (empty($produits)): ?>
    <p>Aucun produit ne correspond à vos critères.</p>
<?php else: ?>
<ul>
<?php foreach ($produits as $produit): ?>
    <li>
        <!-- Affichage des détails du produit avec sa catégorie -->
        <?= htmlspecialchars($produit['nom']) ?> - <?= htmlspecialchars($produit['prix']) ?> € (<?= htmlspecialchars($produit['categorie_nom']) ?>)
        <a href="?supprimer=<?= $produit['id'] ?>">Supprimer</a>

        <!-- Formulaire de mise à jour inline pour chaque produit -->
        <form method="post" style="display:inline">
            <input type="hidden" name="id" value="<?= $produit['id'] ?>">
            <input type="text" name="nom" value="<?= $produit['nom'] ?>">
            <input type="number" step="0.01" name="prix" value="<?= $produit['prix'] ?>">
            <select name="categorie_id">
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $produit['categorie_id'] ? 'selected' : '' ?>><?= $cat['nom'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="update">Mettre à jour</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
