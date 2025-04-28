<?php

namespace App\Vehicules;

class Camion extends Vehicule
{
    public const CATEGORIE = "Camion";

    public static function nombreDeRoues(): int
    {
        return 6;
    }

    public function afficherDetails(): string
    {
        return parent::afficherDetails() . "Camion soumis à réglementation de charge.<br>";
    }
}
