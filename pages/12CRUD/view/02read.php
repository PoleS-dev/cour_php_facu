<?php

echo "<h3>Liste complète des élèves</h3>";
foreach ($eleves as $e) {
    echo "ID: {$e['id']} - Nom: {$e['nom']} - PC: {$e['ordinateur_numero']}<br>";
}
?>
</div>
