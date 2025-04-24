<?php
declare(strict_types=1);

/*
=====================================================
🏀 EXERCICE 1 : Classe JoueurDeBasket

🧾 Objectif :
Créer une classe `JoueurDeBasket` représentant un joueur avec :
- nom (string)
- numéro de maillot (int)
- points marqués (int)

✅ Fonctionnalités attendues :
- Constructeur typé
- Méthode `marquerPoints(int $nb)` qui ajoute des points
- Méthode `getStatistiques()` qui retourne un résumé

=====================================================
*/

class JoueurDeBasket {
    private string $nom;
    private int $numero;
    private int $points=0;

    public function __construct(string $nom, int $numero) {
        $this->nom = ucfirst($nom);
        $this->numero = $numero;
       
    }

    public function getPoints(): int { return $this->points; }

    public function marquerPoints(int $nb): void {
        $this->points += $nb;
    }

    public function getStatistiques(): string {
        return "Joueur {$this->nom} (maillot numéro : {$this->numero}) - Points marqués : {$this->points}";
    }
}   

// Test
$joueur = new JoueurDeBasket("dada", 7);
$joueur->marquerPoints(12);
$joueur->marquerPoints(8);

echo "<h3>Joueur de basket</h3>";
echo $joueur->getStatistiques() . "<br><hr>";


/*
=====================================================
📦 EXERCICE 2 : Classe ProduitEnStock

🧾 Objectif :
Créer une classe `ProduitEnStock` représentant un produit avec :
- nom du produit (string)
- quantité en stock (int)
- prix unitaire (float)

✅ Fonctionnalités attendues :
- Constructeur avec typage
- Méthode `ajouterStock(int $nb)`
- Méthode `valeurStock()` (quantité * prix)

=====================================================
*/

class ProduitEnStock {
    private string $nom;
    private int $quantite;
    private float $prixUnitaire;

    public function __construct(string $nom, int $quantite, float $prixUnitaire) {
        $this->nom = ucfirst($nom);
        $this->quantite = $quantite;
        $this->prixUnitaire = $prixUnitaire;
    }

    public function ajouterStock(int $nb): void {
        $this->quantite += $nb;
    }

    public function valeurStock(): float {
        return $this->quantite * $this->prixUnitaire;
    }

    public function getInfos(): string {
        return "{$this->nom} — {$this->quantite} en stock — " . $this->valeurStock() . " € de valeur";
    }
}

// Test
$produit = new ProduitEnStock("chaise", 10, 29.99);
$produit->ajouterStock(5);

echo "<h3>Produit en stock</h3>";
echo $produit->getInfos() . "<br><hr>";


/*
=====================================================
🎓 EXERCICE 3 : Classe Etudiant

🧾 Objectif :
Créer une classe `Etudiant` avec :
- prénom (string)
- moyenne générale (float)
- liste des matières (array de string)

✅ Fonctionnalités attendues :
- Méthode `ajouterMatiere(string $matiere)`
- Méthode `getProfil()` qui affiche prénom, moyenne, et matières suivies

=====================================================
*/

class Etudiant {
    private string $prenom;
    private float $moyenne;
    private array $matieres;

    public function __construct(string $prenom, float $moyenne) {
        $this->prenom = ucfirst($prenom);
        $this->moyenne = $moyenne;
        $this->matieres = [];
    }

    public function ajouterMatiere(string $matiere): void {
        $this->matieres[] = ucfirst($matiere);
    }

    public function getProfil(): string {
        $liste = implode(", ", $this->matieres);
        return "Étudiant : {$this->prenom}<br>Moyenne : {$this->moyenne}/20<br>Matières : {$liste}";
    }
}

// Test
$etudiant = new Etudiant("lucas", 14.5);
$etudiant->ajouterMatiere("maths");
$etudiant->ajouterMatiere("histoire");
$etudiant->ajouterMatiere("anglais");

echo "<h3>Étudiant</h3>";
echo $etudiant->getProfil();
