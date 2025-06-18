
Objectif pédagogique :
Apprendre à utiliser les getters et setters.

Comprendre la protection des données (encapsulation).

Appliquer une règle de validation métier dans un setter.

🧱 Structure attendue :
Crée une classe nommée CompteBancaire

Elle doit contenir 2 propriétés privées :

$titulaire (type string) → le nom du propriétaire du compte.

$solde (type float) → l'argent disponible sur le compte.

Crée les méthodes getter et setter pour chaque propriété :

getTitulaire() et setTitulaire(string $titulaire)

getSolde() et setSolde(float $solde)

Ajoute une vérification dans le setter du solde :

Si on essaie de mettre un solde négatif, refuse-le et affiche un message d’erreur (ex. "Erreur : le solde ne peut pas être négatif.")

Cela simule une règle métier qu'on retrouve souvent dans les applications bancaires.

📌 Exemple d'utilisation dans le code :
Tu devras :

Créer un objet de type CompteBancaire

Utiliser les setters pour définir le titulaire et le solde

Utiliser les getters pour les afficher

🔁 Bonus pour aller plus loin :
On pourrait plus tard ajouter :

Une méthode deposer($montant)

Une méthode retirer($montant) qui ne permet pas de retirer plus que ce qu’il y a sur le compte




<?php
  class Etudiant {

    public $nom;
    private $note;

    public function __construct($a, $b) {
      $this->nom = $a;
      $this->note = $b;
    }

    public function getNote() {
      return $this->note;
    }

    public function setNote($a) {
      if ($a >= 0 && $a <= 20) {
        $this->note = $a;
      } else {
        echo "Note invalide";
      }
    }

    public function afficherMention() {
      if ($this->note >= 16) {
        echo "mention : très bien";
      } elseif ($this->note >= 14) {
        echo "mention : bien";
      } elseif ($this->note >= 12) {
        echo "mention : assez bien";
      } elseif ($this->note >= 10) {
        echo "mention : passable";
      } else {
        echo "mention : à réviser";
      }
    }
  }

  $etudiant = new Etudiant("Mathieu", 8);
  echo $etudiant->getNote();
  $etudiant->setNote(10);
  echo $etudiant->getNote();



/*
|--------------------------------------------------------------------------
| 💼 Exercice 1 — Classe Livre (Sans typage)
|--------------------------------------------------------------------------
|
| Objectif : Créer une classe PHP représentant un livre dans une bibliothèque.
| On n’utilise PAS de typage ici (compatible PHP 5+), pour bien se concentrer
| sur la structure orientée objet (POO) et les bonnes pratiques.
|
*/

/* ÉNONCÉ ---------------------------------------------------------------

Créer une classe nommée `Livre` représentant un livre en bibliothèque.

🔹 Attributs attendus :
- titre        → Titre du livre (chaîne)
- auteur       → Nom de l’auteur (chaîne)
- annee        → Année de publication (entier)
- disponible   → Indique si le livre est disponible ou déjà emprunté (booléen)

🔸 Étapes :

1. Déclare toutes les propriétés comme `private`
2. Crée un constructeur pour initialiser les 4 propriétés
3. Crée un getter et un setter pour chaque propriété
4. Crée une méthode `afficherFiche()` qui retourne une phrase du style :
   "Titre : Le Petit Prince - Auteur : Antoine de Saint-Exupéry (1943). Disponible ? Oui"

5. Crée une méthode `emprunter()` :
   - Si le livre est déjà emprunté → afficher "Livre déjà emprunté"
   - Sinon → marquer comme indisponible et afficher "Emprunt réussi"

6. Crée une méthode `rendre()` pour remettre le livre en disponible

------------------------------------------------------------------------
EXEMPLE DE CODE ATTENDU :
------------------------------------------------------------------------

$livre = new Livre("1984", "George Orwell", 1949, true);
echo $livre->afficherFiche();   // Titre : 1984 - Auteur : George Orwell (1949). Disponible ? Oui

$livre->emprunter();            // Emprunt réussi
echo $livre->afficherFiche();   // Disponible ? Non

$livre->emprunter();            // Livre déjà emprunté
$livre->rendre();               // Le livre est de nouveau disponible

------------------------------------------------------------------------
BONUS (facultatif) :
------------------------------------------------------------------------
- Ajouter un compteur `nbEmprunts`
- Valider que l’année est > 1400 dans le setter
------------------------------------------------------------------------

*/


class Livre {
  private string $titre;
  private string $auteur;
  private int $annee;
  private bool $disponible;
  private int $nbEmprunts = 0; // BONUS facultatif

  // Constructeur
  public function __construct(string $titre, string $auteur, int $annee, bool $disponible) {
      $this->setTitre($titre);
      $this->setAuteur($auteur);
      $this->setAnnee($annee);
      $this->setDisponible($disponible);
  }

  // Getters
  public function getTitre(): string {
      return $this->titre;
  }

  public function getAuteur(): string {
      return $this->auteur;
  }

  public function getAnnee(): int {
      return $this->annee;
  }

  public function isDisponible(): bool {
      return $this->disponible;
  }

  public function getNbEmprunts(): int {
      return $this->nbEmprunts;
  }

  // Setters
  public function setTitre(string $titre): void {
      $this->titre = $titre;
  }

  public function setAuteur(string $auteur): void {
      $this->auteur = $auteur;
  }

  public function setAnnee(int $annee): void {
      if ($annee > 1400) {
          $this->annee = $annee;
      } else {
          echo "❌ Erreur : L'année doit être supérieure à 1400." . PHP_EOL;
      }
  }

  public function setDisponible(bool $disponible): void {
      $this->disponible = $disponible;
  }

  // afficherFiche()
  public function afficherFiche(): string {
      $dispo = $this->disponible ? "Oui" : "Non";
      return "Titre : {$this->titre} - Auteur : {$this->auteur} ({$this->annee}). Disponible ? {$dispo}";
  }

  // emprunter()
  public function emprunter(): void {
      if (!$this->disponible) {
          echo "📕 Livre déjà emprunté" . PHP_EOL;
      } else {
          $this->disponible = false;
          $this->nbEmprunts++; // BONUS
          echo "✅ Emprunt réussi" . PHP_EOL;
      }
  }

  // rendre()
  public function rendre(): void {
      $this->disponible = true;
      echo "📗 Le livre est de nouveau disponible" . PHP_EOL;
  }
}


// Création d'objets Livre
// ==============================

$livre1 = new Livre("1984", "George Orwell", 1949, true);
$livre2 = new Livre("Le Petit Prince", "Antoine de Saint-Exupéry", 1943, true);
$livre3 = new Livre("Le Seigneur des Anneaux", "J.R.R. Tolkien", 1954, false);

// ==============================
// Affichage des fiches
// ==============================

echo "<h3>📚 Fiches des livres</h3>";
echo $livre1->afficherFiche() . "<br>";
echo $livre2->afficherFiche() . "<br>";
echo $livre3->afficherFiche() . "<br>";

// ==============================
// Emprunts & Retours
// ==============================

echo "<h3>🔁 Emprunt/Rendu Simulation</h3>";
$livre1->emprunter();
$livre1->emprunter(); // Essaye de réemprunter
$livre1->rendre();
$livre1->emprunter(); // Emprunt après retour

// ==============================
// Emprunts affichés
// ==============================

echo "<h3>📊 Statistiques</h3>";
echo "Nombre d'emprunts pour '{$livre1->getTitre()}' : " . $livre1->getNbEmprunts() . "<br>";
echo "Nombre d'emprunts pour '{$livre2->getTitre()}' : " . $livre2->getNbEmprunts() . "<br>";





class CompteBancaire {
    private string $titulaire;
    private float $solde;

    // ✅ Constructeur
    public function __construct(string $titulaire, float $soldeInitial = 0.0) {
        $this->setTitulaire($titulaire);
        $this->setSolde($soldeInitial);
        echo "🏦 Compte ouvert pour $titulaire avec un solde initial de {$this->solde} €.<br>";
    }

    // ✅ Getters
    public function getTitulaire(): string {
        return $this->titulaire;
    }

    public function getSolde(): float {
        return $this->solde;
    }

    // ✅ Setters
    public function setTitulaire(string $titulaire): void {
        $this->titulaire = $titulaire;
    }

    public function setSolde(float $solde): void {
        if ($solde >= 0) {
            $this->solde = $solde;
        } else {
            echo "❌ Erreur : le solde ne peut pas être négatif.<br>";
        }
    }

    // 💰 Méthode deposer
    public function deposer(float $montant): void {
        if ($montant > 0) {
            $this->solde += $montant;
            echo "💰 Dépôt de $montant € effectué pour {$this->titulaire}.<br>";
        } else {
            echo "❌ Montant de dépôt invalide.<br>";
        }
    }

    // 🏧 Méthode retirer
    public function retirer(float $montant): void {
        if ($montant <= 0) {
            echo "❌ Montant invalide.<br>";
        } elseif ($montant > $this->solde) {
            echo "❌ Fonds insuffisants pour retirer $montant €.<br>";
        } else {
            $this->solde -= $montant;
            echo "✅ Retrait de $montant € effectué pour {$this->titulaire}.<br>";
        }
    }

    // 👁️ Méthode pour afficher les infos du compte
    public function afficherFicheCompte(): void {
        echo "👤 Compte de : {$this->titulaire} | Solde : {$this->solde} €<br>";
    }
}

// ============================
// 💡 Tests avec le constructeur
// ============================

echo "<h3>🚀 Création de comptes avec __construct()</h3>";

$compte1 = new CompteBancaire("Sarah", 500.00);
$compte2 = new CompteBancaire("Jean", 1000.00);

// 👁️ Affichage
$compte1->afficherFicheCompte();
$compte2->afficherFicheCompte();

// 💶 Dépôt / Retrait
$compte1->deposer(150);
$compte2->retirer(300);

// 📊 Affichage final
echo "<h3>📊 Solde final</h3>";
$compte1->afficherFicheCompte();
$compte2->afficherFicheCompte();

?>


?>
