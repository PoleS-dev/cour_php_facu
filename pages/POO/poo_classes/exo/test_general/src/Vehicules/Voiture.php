<?php
namespace App\Vehicules;

final class Voiture extends Vehicule
{
    public const CATEGORIE = "Voiture";

    // Pas besoin de redéfinir nombreDeRoues() : hérite de Vehicule (4 roues)
}
