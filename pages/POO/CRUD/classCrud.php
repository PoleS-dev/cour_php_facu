<?php



//  Crud : delete read update create

abstract class Vehicule
{

    //  proprietes de la class avec private pour protection, on devra utiliszer les getters et setters pour acceder aux proprietes
    private string $marque;
    private int $vitesse;
    private int $nbRoues;

    // le constructeur sert a initialiser les proprietes de la class pour qu'elles soient disponibles dans les methodes
    public function __construct(string $marque, int $vitesse, int $nbRoues)
    {

        // $this->marque represente la proprieté marque de la class Vehicule
        // $marque represente la proprieté marque du future objet Voiture ( par exemple Towota )

        $this->marque = $marque;
        $this->vitesse = $vitesse;
        $this->nbRoues = $nbRoues;
    }

    // getters et setters
    // string est le typage de retour de la fonction
    public function getMarque(): string
    {
        return $this->marque;
    }

    // comment pas de return alors le typage est void
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    public function setVitesse(int $vitesse): void
    {
        $this->vitesse = $vitesse;
    }

    public function getNbRoues(): int
    {
        return $this->nbRoues;
    }

    public function setNbRoues(int $nbRoues): void
    {
        $this->nbRoues = $nbRoues;
    }

    public function demarrer(): void
    {
        echo "Le véhicule démarre.";
    }
}


// CREATION DES CLASS QUI HERITENT DE LA CLASS VEHICULE
final class Voiture extends Vehicule
{

    public function demarrer(): void
    {
        echo "La voiture démarre.";
    }
}



final class Camion extends Vehicule
{

    public function demarrer(): void
    {
        echo "Le camion démarre.";
    }
}





final class Moto extends Vehicule
{

    public function demarrer(): void
    {
        echo "La moto démarre.";
    }
}

