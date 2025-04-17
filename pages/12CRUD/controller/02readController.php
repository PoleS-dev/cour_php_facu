<div class="box">
<h1>READ</h1>
<?php



// READ - Récupération de tous les élèves
$sqlAll = "SELECT * FROM eleves";
$stmtAll = $pdo->prepare($sqlAll);
$stmtAll->execute();
$eleves = $stmtAll->fetchAll(PDO::FETCH_ASSOC); // On récupère les résultats sous forme de tableau associatif


include_once "view/02read.php";