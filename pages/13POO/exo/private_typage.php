<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

class JoueurDeBasket
{

    private string $nom;
    private int $numero;
    private int $points;

    public function __construct(string $a, int $b)

    {
        $this->nom = $a;
        $this->numero = $b;
        $this->points = 0;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function marquerPoint(int $nb): void
    {

        $this->points = $this->points + $nb;
        // $this->points += $nb;
    }

    public function getStatistiques(): string
    {

        return " le joueur $this->nom avec le maillot $this->numero a marqué $this->points points";
    }
}

$joueur1 = new JoueurDeBasket("Seckene", 4);
$joueur2 = new JoueurDeBasket("Moussa", 10);

// echo $joueur1->nom;

echo $joueur1->getStatistiques();
echo "<br>";

$joueur1->marquerPoint(3);

echo "<br>";
echo $joueur1->getStatistiques();


$joueur1->marquerPoint(5);

echo "<br>";
echo $joueur1->getStatistiques();

$joueur2->marquerPoint(10);

echo "<br>";
echo $joueur1->getPoints();
echo "<br>";
echo $joueur2->getPoints();

function totalPoint(int $a,int $b){
    
    echo $a+$b;

}

$moussa=$joueur2->getPoints();
$seckene=$joueur1->getPoints();

echo "<br>";

totalPoint($moussa, $seckene);














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

class ProduitEnStock
{
    private string $nom;
    private int $quantite;
    private float $prix;

    public function __construct(string $nom, int $quantite, float $prix){

        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }

    public function ajouterStock(int $nb):string|int   { // typage d'union soit c'est un string soit c'est un int

        if($nb >0){
            return $this->quantite += $nb;
            // $this->quantite=$this->quantite+$nb;

        }else{
            return "le nombre doit etre positif";
        }
     

    } 

    public function valeurStock():float {

        echo "<br>";
        echo "le produit $this->nom a un stock de $this->quantite unités et un prix unitaire de $this->prix €";
        echo "<br>";
        return round($this->quantite * $this->prix,2) ;


    }
}

$produit1 = new ProduitEnStock("chaussure", 10, 50);
$produit1->valeurStock();
echo "<br>";
echo $produit1->ajouterStock(5);
echo "<br>";

echo $produit1->ajouterStock(-5);







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

class Etudiant
{
    private string $prenom;
    private float $moyenne;
    private array $matieres;

    public function __construct(string $prenom, float $moyenne)
    {
        $this->prenom = ucfirst($prenom);
        $this->moyenne = $moyenne;
        $this->matieres = [];
    }

    public function ajouterMatiere(string $matiere): void
    {
        $this->matieres[] = ucfirst($matiere);
    }

    public function getProfil(): string
    {
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
