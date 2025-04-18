<!-- Formulaire d'ajout de produit -->
<?php 
include_once 'controller/createController.php';
include_once 'controller/filterController.php';

?>
<form method="post" >
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
