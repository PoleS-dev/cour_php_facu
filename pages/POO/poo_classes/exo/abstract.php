<!-- | 🧪 Exercices PHP – POO : classes, getters/setters, héritage, abstract, etc.
|--------------------------------------------------------------------------
| Ce fichier contient 10 exercices pédagogiques pour pratiquer la POO en PHP.
| Chaque exercice est clairement commenté pour comprendre l'objectif.
| À exécuter et compléter en local pour s'entraîner.
*/
 
echo "<h1>🧪 Exercices PHP – Programmation Orientée Objet</h1>";
 
/*
* 🔹 Exercice 1 : Classe simple + constructeur
* Crée une classe Utilisateur avec un nom et un email passés via le constructeur.
* Affiche ensuite ces informations avec une méthode afficherProfil().
*/
 
 
 
/*
* 🔹 Exercice 2 : Getters et Setters
* Crée une classe Produit avec un prix privé. Ajoute des getters et setters.
* Utilise-les pour définir un prix, puis l'afficher.
*/
 
 
 
/*
* 🔹 Exercice 3 : Héritage simple
* Crée une classe Vehicule avec une méthode rouler().
* Crée une classe Voiture qui hérite de Vehicule, et ajoute une méthode klaxonner().
* Instancie une Voiture et appelle les deux méthodes.
*/
 
 
 
/*
* 🔹 Exercice 4 : Redéfinir une méthode (override)
* Crée une classe Animal avec une méthode parler() qui dit "Je fais un bruit".
* Crée une classe Chat qui hérite de Animal et redéfinit parler() pour dire "Miaou".
*/
 
 
 
/*
* 🔹 Exercice 5 : Utiliser parent:: dans une redéfinition
* Dans une classe Chien qui hérite de Animal, redéfinis parler() :
* appelle parent::parler() puis ajoute " et j'aboie !".
*/
 
 
 
/*
* 🔹 Exercice 6 : Classe abstraite
* Crée une classe abstraite Forme avec une méthode abstraite afficherNom().
* Crée deux classes Cercle et Carre qui héritent de Forme et implémentent afficherNom().
*/
 
 
/*
* 🔹 Exercice 7 : Propriété protégée
* Crée une classe Compte avec une propriété protégée solde.
* Ajoute une méthode deposer() dans une classe enfant CompteCourant.
* Teste le dépôt et affiche le solde.
*/
 

 
/*
* 🔹 Exercice 8 : Méthode
* Crée une classe Logger en `final` avec une méthode log().
* Tente de créer une classe fille qui hérite de Logger et observe le blocage.
*/
 
 
/*
* 🔹 Exercice 10 : Encapsulation complète
* Crée une classe Banque avec des propriétés privées (nomClient, solde).
* Implémente des getters/setters et une méthode transfert() entre deux comptes.finale
* Crée une classe Base avec une méthode finale identifiant().
* Essaie de redéfinir cette méthode dans une classe enfant : observe l'erreur.
*/ -->

<?php


class Banque 
{

    private string $nomClient;
    private float $solde;

    public function __construct(string $nomClient, float $solde)
    {
        $this->nomClient = $nomClient;
        $this->solde = $solde;
    }

    // getter 
    public function getNomClient() : string
    {
        return $this->nomClient;
    }

    public function getSolde() : float
    {
        return $this->solde;
    }

    public function setSolde(float $solde) : float
    {
         return $this->solde = $solde;
    }

    public function setNomClient(string $nomClient) : string
    {
        return $this->nomClient = $nomClient;
    }

 public function transfert(Banque $destinataire, float $montant) : void // ici je fait un typage d'objet Banque, je demande un objet issu de Banque 
    
    {
       if($montant > 0 && $this->solde >= $montant) {
        $this->solde -= $montant;
        $destinataire->solde += $montant;
       }else {
        echo "le solde est insuffisant";
       }
    }
    

}

$compte1= new Banque("najiba",150000);
$compte2= new Banque("facundo",2);
echo $compte2->getSolde(). "<br>";
echo $compte1->getSolde(). "<br>";
$compte1->transfert($compte2, 100000);
echo $compte2->getSolde(). "<br>";
echo $compte1->getSolde(). "<br>";

?>
 
 
<!--  
/*
* 🔹 Exercice 9 : Classe finale
* Crée une classe Logger en `final` avec une méthode log().
* Tente de créer une classe fille qui hérite de Logger et observe le blocage.
*/
 
 
 
/*
* 🔹 Exercice 10 : Encapsulation complète
* Crée une classe Banque avec des propriétés privées (nomClient, solde).
* Implémente des getters/setters et une méthode transfert() entre deux comptes. -->



 