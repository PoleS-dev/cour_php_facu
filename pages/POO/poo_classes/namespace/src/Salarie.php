<?php
namespace App;

final class Salarie
{
    public function __construct(
        protected string $nom,
        protected string $poste
    ) {}

    public function getNom(): string {
        return $this->nom;
    }

    public function getPoste(): string {
        return $this->poste;
    }
}
