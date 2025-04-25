<?php
namespace App;

class Restaurant extends Entreprise
{
    use GereSalaries;

    public function getNom(): string { return $this->nom; }
    public function getSiret(): string { return $this->siret; }
    public function getAdresse(): string { return $this->adresse; }
    public function getVille(): string { return $this->ville; }
    public function getCodePostal(): string { return $this->codePostal; }
    public function getPays(): string { return $this->pays; }
}