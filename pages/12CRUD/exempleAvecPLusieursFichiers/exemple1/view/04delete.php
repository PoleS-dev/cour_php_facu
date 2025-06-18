<div class="box">
<h1>DELETE</h1>
<!-- Formulaires de suppression pour chaque élève -->
<h2>Supprimer un élève</h2>
<?php foreach ($eleves as $e): ?>
    <form method="POST" style="display:inline">
        ID: <?= $e['id'] ?> - Nom: <?= $e['nom'] ?> - PC: <?= $e['ordinateur_numero'] ?>
        <input type="hidden" name="id" value="<?= $e['id'] ?>">
        <input type="submit" name="sup" value="Supprimer">
    </form><br>
<?php endforeach; ?>

</div>
