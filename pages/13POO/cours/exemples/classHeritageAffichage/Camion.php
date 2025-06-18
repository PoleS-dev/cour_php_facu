<?php

final class Camion extends Vehicules
{

    public const CATEGORIE = "Camion";

    public static function nombreDeRoues(): int{

        return 6;
    }

    public function afficherDetails(): string{

        return parent::afficherDetails() . "camion soumis reglementation de charge.<br>";
    }

}


