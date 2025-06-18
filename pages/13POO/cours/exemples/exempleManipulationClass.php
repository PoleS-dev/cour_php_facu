<?php
session_start();

// echo "post";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// echo "session";
// print_r($_SESSION);
// echo "</pre>";
// echo "<pre>";
// print_r($_SESSION['livres']);
// echo "</pre>";
// Classe Livre
class Livre
{
    private string $titre;
    private string $auteur;
    private int $annee;
    private bool $disponible;
    private int $nombreEmprunts = 0;

    public function __construct(string $a, string $b, int $c, bool $d)
    {
        $this->titre = $a;
        $this->auteur = $b;
        $this->annee = $c;
        $this->disponible = $d;
    }

    public function getTitre(): string { return $this->titre; }
    public function getAuteur(): string { return $this->auteur; }
    public function getAnnee(): int { return $this->annee; }
    public function getDisponible(): bool { return $this->disponible; }
    public function getNombreEmprunts(): int { return $this->nombreEmprunts; }

    public function setDisponible(bool $d): void { $this->disponible = $d; }

    public function emprunter(): string {
        if ($this->disponible) {
            $this->nombreEmprunts++;
            $this->setDisponible(false);
            return "✅ Emprunt réussi";
        } else {
            return "❌ Livre déjà emprunté";
        }
    }

    public function rendreLivre(): string {
        $this->setDisponible(true);
        return "🔄 Livre rendu : {$this->titre}";
    }

    public function afficherFiche(): string {
        return "📘 <strong>{$this->titre}</strong> - {$this->auteur} ({$this->annee})<br>" .
               "Disponible : " . ($this->disponible ? "Oui" : "Non") . "<br>" .
               "Nombre d'emprunts : {$this->nombreEmprunts}<br>";
    }
}

// Simuler une base de données via session
if (!isset($_SESSION['livres'])) {
    $_SESSION['livres'] = [];
}

// Quand le bouton "Ajouter" est cliqué
if (isset($_POST['ajouter'])) {
    // Récupère les données du formulaire sinon "" chaine de cat=ractère vide 
    $titre = $_POST['titre'] ?? '';
    $auteur = $_POST['auteur'] ?? '';

    $input = $_POST['annee'] ?? null;
    $annee = is_numeric($input) ? (int) $input : "indefini"; // int ou string

    // Si les champs sont remplis, on crée un livre et on l’ajoute en session
    if ($titre && $auteur && $annee) {
        $livre = new Livre($titre, $auteur, $annee, true); // disponible = true
        $_SESSION['livres'][] = $livre; // ajout dans la liste des livres
    }
}

// Quand le bouton "Emprunter" est cliqué
if (isset($_POST['emprunter'])) {
    $index = (int) $_POST['index']; // index du livre dans la session
    $message = $_SESSION['livres'][$index]->emprunter(); // appel à la méthode emprunter()
   
   
}

// Quand le bouton "Rendre" est cliqué
if (isset($_POST['rendre'])) {
    $index = (int) $_POST['index']; //(int) ici on fait un cast on force le type d'une variable
    $message = $_SESSION['livres'][$index]->rendreLivre();
  
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
</head>
<body>
    <h1>📚 Gestion de Bibliothèque</h1>

    <!-- Message -->
    
    <!-- Formulaire d'ajout -->
    <h2>➕ Ajouter un livre</h2>
    <form method="POST">
        <input type="text" name="titre" placeholder="Titre" required>
        <input type="text" name="auteur" placeholder="Auteur" required>
        <input type="number" name="annee" placeholder="Année" required>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
    
    <!-- Liste des livres -->
    <h2>📋 Liste des livres</h2>
    <div id="flash-message">
    <?php if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>
    </div>
    <?php foreach ($_SESSION['livres'] as $index => $livre): ?>
        <div style="margin-bottom:15px; border-bottom:1px solid #ccc; padding-bottom:10px;">
            <?= $livre->afficherFiche(); ?>
           
         
            
            <?php if ($livre->getDisponible()): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="index" value="<?= $index; ?>">
                <button type="submit" name="emprunter">📖 Emprunter</button>
               
            </form>
            <?php endif; ?>
            
            <?php if (!$livre->getDisponible()): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="index" value="<?= $index; ?>">
                <button type="submit" name="rendre">↩️ Rendre</button>
            </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <script>
// Masquer le message après 2 secondes (2000 ms)
setTimeout(() => {
    const msg = document.getElementById("flash-message");
    if (msg) msg.style.display = "none";
}, 3000);
</script>
</body>
</html>
