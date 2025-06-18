<?php



// CREATE - Ajouter un élève
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = trim($_POST['nom']); // On récupère et nettoie le nom
    $pc = trim($_POST['ordinateur_numero']); // On récupère et nettoie le numéro de PC

    // Requête SQL préparée pour éviter les injections SQL
    $stmt = $pdo->prepare("INSERT INTO eleves (nom, ordinateur_numero) VALUES (:nom, :pc)");
    $stmt->execute([
        ':nom' => $nom,
        ':pc' => $pc
    ]);

    echo "<p style='color:green;'>✅ Élève ajouté avec succès !</p>";
    header("Refresh: 2; url=" . $_SERVER['PHP_SELF']);
    exit;
}





// if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['ajouter'])){


//     $nom=trim($_POST['nom']);
//     $pc=trim($_POST['ordinateur_numero']);

//     $stmt= $pdo->prepare("INSERT INTO eleves (nom, ordinateur_numero) VALUES (?, ?)");

//     $stmt->execute([
//       $nom, $pc
//     ]);

//     echo "<p style='color:green;'>✅ Élève ajouté avec succès !</p>";
//     header("Refresh: 2; url=" . $_SERVER['PHP_SELF']);
//     exit;


    
// }



include_once "view/01create.php";