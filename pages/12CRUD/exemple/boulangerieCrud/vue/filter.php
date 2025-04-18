<!-- Formulaire de filtre -->

<?php 
include_once 'controller/filterController.php'; 

?>

<form method="get" >
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

