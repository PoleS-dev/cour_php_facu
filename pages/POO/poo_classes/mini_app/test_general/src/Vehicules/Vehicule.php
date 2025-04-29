<?php
namespace App\Vehicules;

abstract class Vehicule
{
    public const CATEGORIE = "Général";

    protected string $marque;
    protected string $modele;
    protected int $annee;

    public function __construct(string $marque, string $modele, int $annee)
    {
        if ($annee < 1900) {
            echo "L'année doit être supérieure ou égale à 1900.";
        }

        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
    }


    public function getMarque(): string
    {
        return $this->marque;
    }
    public function getModele(): string
    {
        return $this->modele;
    }
    public function getAnnee(): int
    {
        return $this->annee;
    }

    
    public function afficherDetails(): string
    {
        return "Marque : {$this->getMarque()}<br>Modèle : {$this->getModele()}<br>Année : {$this->getAnnee()}<br>Catégorie : " . static::CATEGORIE . "<br>";
    }

    public static function nombreDeRoues(): int
    {
        return 4;
    }

    public function estRecent(): bool
    {
        return $this->annee > 2015;
    }
}
