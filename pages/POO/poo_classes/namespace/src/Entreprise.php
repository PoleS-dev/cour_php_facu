<?php
namespace App;

abstract class Entreprise
{
    protected string $nom;
    protected string $siret;
    protected string $adresse;
    protected string $ville;
    protected string $codePostal;
    protected string $pays;

    /**
     * Constructeur de base pour une entreprise.
     */
    public function __construct(
        string $nom,
        string $siret,
        string $adresse,
        string $ville,
        string $codePostal,
        string $pays
    ) {
        $this->nom = $nom;
        $this->siret = $siret;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
        $this->pays = $pays;
    }

    // Méthodes abstraites à implémenter dans chaque type d'entreprise
    abstract public function getNom(): string;
    abstract public function getSiret(): string;
    abstract public function getAdresse(): string;
    abstract public function getVille(): string;
    abstract public function getCodePostal(): string;
    abstract public function getPays(): string;

    /**
     * Méthode utilitaire pour afficher les infos de l'entreprise
     */
    public function afficherInfos(): void
    {
        echo "<strong>{$this->getNom()}</strong><br>";
        echo "SIRET : {$this->getSiret()}<br>";
        echo "Adresse : {$this->getAdresse()}, {$this->getCodePostal()} {$this->getVille()}<br>";
        echo "Pays : {$this->getPays()}<br>";
    }
}
