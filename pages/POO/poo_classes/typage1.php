

<h1>Typage de classe en php</h1>

<p>Objectif : bien comprendre et bien utiliser le typage dans les propriétés, les arguments, le constructeur....</p>

<p> compatible depuis php 7.4</p>

<p>Les types autorisés : int, float, string, bool, array, object, ?type</p>

<h3>le typage dans une class php</h3>


<?php


class Produit{

    private int  $id; // on attend un entier
    private string $nom; // on attend une chaine de caractères
    private float $prix; // on attend un nombre à virgule
    private ?string $description = null; //  accecpte null peut être  string ou null
    private bool $disponible = true; //  on attends un booléen true ou false

    public function __construct(int $id,string $nom,?float $prix,?string $description,bool $disponible){

        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->disponible = $disponible;



    }
}



?>

<p>les types permettent de sécuriser les données </p>

<p>on exige que les données soient du type attendu ici dans la class Produit : int, string, float, ?string</p>

<h2>le typage dans les methodes </h2>

<?php

class Panier{
    private array $produits = [];// j'attends a ce que $produit soit un tableau 

    public function ajouterProduit(string $a):array // on impose que le paramètre $a soit une chaine de caractères et que la fonction retourne un tableau 
    { 
       $this->produits[] = $a;
       return $this->produits; // on retourne le tableau 
    }
}


class Article {

    private string $nom;
    private float $prix;
    private bool $disponible = true;

    public function __construct(string $nom, float $prix, bool $disponible) {
    
        $this->nom = $nom;
        $this->prix = $prix;
        $this->disponible = $disponible;
    }

    public function getNom():string // on exige que la fonction retourne une chaine de caractères
    {
        return $this->nom;
    }

    public function setNom(string $nom):void // ne revoie rien
    {
        $this->nom = $nom;
    }
    public function getPrix():void
    {
        echo $this->prix;
    }
public function getDisponible():bool{
    return $this->disponible;
}
}
   
?>

<h4>les erreurs de typages</h4>

<p>si on met un type incorrect, on aura une erreur, PHP declenche une fatal error</p>

<h4>le typage strict</h4>

<p>en mettent la fonction declare(strict_types=1); en haut du fichier, on active le typage strict</p>

<p> avec ce mode PHP NE CONVERTI PAS les types INT et STRING</p>







