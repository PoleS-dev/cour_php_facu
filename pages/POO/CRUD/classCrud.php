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

    // comme pas de return alors le typage est void
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
// un setter a besoin d'un paramètre pour pouvoir modifier la valeur de la propriété

// setNbRoues(parametre nbRoues) la valeur qui changera 
// $this->nbRoues represente la propriéte nbRoues de la class Vehicule
// $nbRoues :  c'est le parametre  qui changera la propriéte nbRoues 
    public function setNbRoues(int $nbRoues): void
    {
        $this->nbRoues = $nbRoues;
    }

    public function demarrer(): void
    {
        echo "Le véhicule démarre.";
    }
// déclaration d'une méthode publique appelée getObjet qui retourne chaine de caractère
// get_class() est une fonction PHP qui retourne le nom de la classe de l'objet
// $this represente l'objet sur lequel la méthode est appelée
    public function getObjet(): string {
        return get_class($this);
    }
}


// CREATION DES CLASS QUI HERITENT DE LA CLASS VEHICULE
final class Voiture extends Vehicule
{

    public const MAX_VITESSE = 200;

    public function demarrer(): void
    {
        echo "La voiture démarre.";
    }
}


//instanciation de la classe Camion, qui hérite de la classe Vehicule.
final class Camion extends Vehicule
{

    public const MAX_VITESSE = 120;

    public function demarrer(): void
    {
        echo "Le camion démarre.";
    }
}





final class Moto extends Vehicule
{
    public const MAX_VITESSE = 150;

    public function demarrer(): void
    {
        echo "La moto démarre.";
    }
}

