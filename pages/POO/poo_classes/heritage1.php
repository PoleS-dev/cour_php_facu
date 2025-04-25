<?php 
namespace App;

?>
<h1>Cour sur l'heritage des classes en PHP</h1>

<h3>Héritage c'est quoi ? </h3>


<p>L'héritage permet à une classe d'hériter des propriétés et méthodes d'une autre classe.</p>


<h4>exemple : </h4>


<?php 


class Animal {

    public function respirer() : void {

        echo "je respire dans l'air <br>";
}

}




class Chien extends Animal {

public function aboyer() : void {       
    echo "ouaf ouaf <br>";
}

}

class Chat extends Animal {

    public function miauler() : void {

        echo "miaou <br>";

    }
}
$chien1=new Chien();
$chien1->respirer();
$chien1->aboyer();

?>

<h2>redefinir une méthode (Override)</h2>

<?php 

class Poisson extends Animal{

    // cas  1  redefinition complete de la méthode ( on ecrase la version parente que sur la class Poison)
    
    public function respirer() : void {

        echo "je respire dans l'eau <br>";
    }
    
}

class Reptil extends Animal{

    // cas  2  on utlise le parent:: respirer() pour remplacer la version du parent 
    
    public function respirer() : void {
        // on appelle d'abord la methode du parent (Animal)
        parent::respirer();
        // puis on ajoute une phrase personalisée
        echo " et dans l'eau !   <br>";
  
}
}

// quand on veut conserver la logique du parent et l'enrichire : ajouter un comportement par exemple. on utilise parent::

// quand on veut totalement changer la logique du parent : on ecrase la version parente on utilise pas parent::

    
$reptil1=new Reptil();
$reptil1->respirer();


class Vehicule 
{

    public string $marque="sans nom";
    protected int $vitesse=0;
    private string $moteur="sans moteur";

    

    public function getMoteur() : string {
        return $this->moteur;
    }

    public function setMoteur(string $moteur) :string {
        return $this->moteur = $moteur;
    }

    public function accelerer() : void {

        $this->vitesse += 10;
        echo "Vitesse actuelle : {$this->vitesse} km/h<br>";

    }
}

class Voiture extends Vehicule {


    public function turbo() : void {
 

        $this->vitesse += 50;
        echo "Vitesse actuelle apres turbo : {$this->vitesse} km/h<br>";
    
}

public function creerMoteur(string $moteur)  {
          return $this->setMoteur($moteur);
}

public function afficherMoteur() : void {
    echo "moteur : {$this->getMoteur()}<br>";// comme moteur est en private  on doit passer par le getter


}
}

$voiture1 = new Voiture();
echo $voiture1->creerMoteur("essence");
$voiture1->accelerer();
$voiture1->turbo();

?>
<h2> abstract class</h2>

<p> une class abstraite ne peut pas être instanciée directement.</p>
<p>Elle sert de modèle aux classes qui l'étendent. Elle peut contenir des méthodes abstraites (à définir obligatoirement)</p>

<p>elle sert de model de base et peut contenir :</p>

<ul>
    <li>des methodes normales avec du code </li>
    <li>des methodes abstraites sans corps</li>
</ul>



<?php 

abstract class Animals {

    protected string $nom;
 
    public function __construct(string $nom) {

        $this->nom = $nom;

    }
 
    // Méthode abstraite : aucune implémentation ici

    abstract public function crier();
 
    // Méthode normale : peut être utilisée telle quelle

    public function sePresenter() {

        echo "Je suis un animal nommé $this->nom<br>";
     

    }

}
 
 class Chiens extends Animals {

      public function crier() {

        echo "Ouaf Ouaf 🐶<br>";

    }

}




 
$rex = new Chiens("Rex");

$rex->sePresenter();

$rex->crier();





?>

<h2>Utilisation de final</h2>

<p>La mot-clé final empêche la surcharge (redefinition) d'une méthode.</p>
<p>Elle peut être utilisée sur des classes, des méthodes, ou des propriétés.</p>
<p> Si au début d"une class il y a final, faire un heritage de cette class est impossible, c'est la classe final sans enfants possible</p>

<p>

    final class MaclassFinal, creation de la class final sans enfants possible
</p>

<p>

    class ClassEnfant extends MaclassFinal, on ne peut pas faire de heritage de la class final, cela va donné une erreur
</p>

<p>
    quand on déclare final dans une methode, les classes qui hérite ne pourront pas redefinir la methode 
</p>


<p>pourquoi utiliser final sur une methode ? </p>

<ul>
    <li> Pour verrouiller un comportement spaécifique qui ne doit pas être modifié</li>
    <li>Pour garantir la sécurité des données</li>
    <li>Pour eviter les erreur et les abus d'heritage</li>
</ul>

<?php 

class Employe
{
    protected string $nom;
 
    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }
 
    final public function travailler()
    {
        echo "$this->nom travaille sérieusement.<br>";
    }
}
 
class Manager extends Employe
{
    // ❌ ERREUR ! On ne peut pas redéfinir une méthode final
    /*
    public function travailler() {
        echo "$this->nom travaille en dirigeant l'équipe.<br>";
    }
    */
    public function diriger()
    {
        echo "$this->nom dirige une équipe.<br>";
    }
}
 
$m = new Manager("Sophie");
$m->travailler(); // fonctionne
$m->diriger();



?> 


<h2> trait</h2>

// Un trait en PHP est une sorte de bloc de code réutilisable.
// Il permet de partager des méthodes ou propriétés entre plusieurs classes,
// sans avoir à utiliser l'héritage (extends).
//
// Contrairement à une classe, un trait ne peut pas être instancié directement.
// On l’utilise dans une classe avec le mot-clé "use".
//
// C’est très utile quand plusieurs classes ont des comportements identiques,
// mais qu’elles n’ont pas de lien logique pour hériter d’une même classe.
//
// Exemple :
//
// trait Logger {
//     public function log($message) {
//         echo "[LOG] " . $message;
//     }
// }
//
// class Utilisateur {
//     use Logger;
// }
//
// $u = new Utilisateur();
// $u->log("Utilisateur connecté.");  // Affiche : [LOG] Utilisateur connecté.
//
// Ce système permet de factoriser du code sans casser la hiérarchie objet.









 









    




    






        