<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">



<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'bdd.php';

?>
<!-- Formulaire d'ajout de produit -->
<?php include_once 'vue/create.php'; ?>

<!-- Formulaire de filtre -->
<?php include_once 'vue/filter.php'; ?>

<!-- Affichage des produits -->
<?php include_once 'vue/readFilter.php'; ?>