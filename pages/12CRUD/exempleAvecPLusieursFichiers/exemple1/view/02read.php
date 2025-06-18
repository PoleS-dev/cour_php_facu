<div class="box">
<h1>READ</h1>

<?php

echo "<h3>Liste complète des élèves</h3>";
foreach ($eleves as $index) {
    echo "ID: {$index['id']} - Nom: {$index['nom']} - PC: {$index['ordinateur_numero']}<br>";
}
?>
</div> 

