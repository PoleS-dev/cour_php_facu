<?php


abstract class Vehicules{

    public const CATEGORIE = "Général";
    protected string $marque;
    protected string $modele;
    protected int $annee;

    public function __construct(string $marque, string $modele, int $annee){

        $this->marque=$marque;
        $this->modele=$modele;
        $this->annee=$annee;
    }

    public function getMarque(): string{

        return $this->marque;
    }
    public function getModele(): string{ 

        return $this->modele;
     }  

     public function getAnnee(): int{
        
        return $this->annee;
     }

     public function afficherDetails(): string{
        return "Marque : {$this->marque}<br>Modèle : {$this->modele}<br>Année : {$this->annee}<br>Catégorie : " . static::CATEGORIE . "<br>";
     }

     public static function nombreDeRoues(): int{

        return 4;
     }

}

