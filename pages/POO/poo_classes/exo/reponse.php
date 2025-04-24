

<?php



class compteBancaire
{

    private $titulaire;
    private $solde;

    public function __construct($a, $b)
    {

        $this->setTitulaire($a);
        $this->setSolde($b);
    }


    // getter de titulaire
    public function getTitulaire()
    {

        return $this->titulaire;
    }

    // setter de titulaire
    public function setTitulaire($z)
    {

        return $this->titulaire = $z;
    }

    // getter de solde

    public function getSolde()
    {
        return $this->solde;
    }

    // setter de solde

    public function setSolde($d)
    {
        if ($d <= 0) {
            echo "Erreur : le solde ne peut pas être négatif ou à 0. <br>";
        } else {
            return $this->solde = $d;
        }
    }

    public function depot($montant)
    {

        if ($montant <= 0) {
            echo "Erreur : le montant du depot ne peut pas être négatif ou à 0. <br>";
        } else {
            return $this->solde += $montant;
        }
    }

    public function retrait($montant)
    {

        if ($montant <= 0) {
            echo "Erreur : le montant du retrait ne peut pas être négatif ou à 0. <br>";
        } elseif ($this->solde < $montant) {

            echo "fond insuffisant pour effectuer le retrait";
        } else {
            return $this->solde -= $montant;
        }
    }
}


$compte1 = new compteBancaire("John", 100);

echo $compte1->getTitulaire();
echo "<br>";

echo $compte1->getSolde();

$compte2 = new compteBancaire("Moussa", 100000);

echo $compte2->getTitulaire();
echo "<br>";

echo $compte2->getSolde();


$compte2->depot(100000);

echo $compte2->getSolde();

$compte2->retrait(200000);
echo "<br>";
echo $compte2->getSolde();


class Livre
{

    private $titre;
    private $auteur;
    private $annee;
    private $disponible;
    private $nombreEmprunts=0;

    public function __construct($a, $b, $c, $d)
    {

        $this->titre = $a;
        $this->auteur = $b;
        $this->annee = $c;
        $this->disponible = $d;
       
    }

    // getter de nombreEmprunts
    public function getNombreEmprunts()
    {
        return $this->nombreEmprunts;
    }

    // setter de nombreEmprunts
    public function setNombreEmprunts($e)
    {
        return $this->nombreEmprunts = $e;
    }

    // getter de titre
    public function getTitre()
    {
        return $this->titre;
    }

    // setter de titre    return
    public function setTitre($a)
    {
        return $this->titre = $a;
    }



    // getter de auteur
    public function getAuteur()
    {
        return $this->auteur;
    }

    // setter de auteur
    public function setAuteur($b)
    {
        return $this->auteur = $b;
    }



    // getter de annee
    public function getAnnee()
    {
        return $this->annee;
    }

    // setter de annee
    public function setAnnee($c)
    {
        return $this->annee = $c;
    }

    // getter de disponible
    public function getDisponible()
    {
        return $this->disponible;
    }

    // setter de disponible
    public function setDisponible($d)
    {
        return $this->disponible = $d;
    }

    // afficher les informations du livre

    public function afficherFiche()
    {

        echo "Titre : " . $this->getTitre() . "<br>";
        echo "Auteur : " . $this->getAuteur() . "<br>";
        echo "Annee : " . $this->getAnnee() . "<br>";
        echo "Disponible : " . ($this->getDisponible() ? "Oui" : "Non") . "<br>";


        echo "titre : {$this->getTitre()} auteur : {$this->getAuteur()} annee : {$this->getAnnee()} disponible : " . ($this->getDisponible() ? "Oui" : "Non");
    }

    // emprunter le livre
    public function emprunter()
    {
        if ($this->disponible) {
            echo " emprunt reussi";
            $this->nombreEmprunts++;// a chaque fois que le livre est emprunté, on incrémente le nombre d'emprunts
            return $this->setDisponible(false);
        } else {
            echo " le livre n'est pas disponible";
        }
    }

    // rendre le livre disponible

    public function rendreLivre()
    {

        $this->setDisponible(true);
        echo "le livre : " . $this->getTitre() . " est à nouveau disponible";
    }
}

$livre1 = new Livre("1984", "George Orwell", 1949, false);

echo $livre1->getTitre();

echo "<br>";

$livre1->setTitre("1985");
echo "<br>";

echo $livre1->getTitre();

$livre2 = new Livre("44", "facundo varas", 1984, true);

$livre3 = new Livre("45", "facundo varas", 1985, true);


$livre1->afficherFiche();
$livre2->afficherFiche();

$livre2->emprunter();
$livre2->emprunter();

$livre3->emprunter();
echo $livre3->getNombreEmprunts();

$livre3->rendreLivre();
$livre3->emprunter();
echo $livre3->getNombreEmprunts();

$livre2->setNombreEmprunts(800);
echo $livre2->getNombreEmprunts();
