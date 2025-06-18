<?php

 final class Moto extends Vehicules
{

    public const CATEGORIE = "Moto";

    public static function nombreDeRoues(): int{

        return 2;
    }

    public function afficherDetails(): string{

        return parent::afficherDetails() . "Attention : équipement obligatoire pour la moto.<br>";
    }

}



