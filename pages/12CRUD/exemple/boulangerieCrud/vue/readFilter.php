<!-- Affichage des produits -->

<?php include_once 'controller/filterController.php'; ?>

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
                <form method="post" action="../controller/updateController.php" style="display:inline">
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