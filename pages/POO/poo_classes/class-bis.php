
<h2> Difference entre php procedural et le POO</h2>

<ul>
    <li>
        Le php procédural est un language de programation qui n'a pas de classes, de méthodes, de propriétés, de constructeurs, etc.
    </li>
    <li>
        le PHP procédural est un code écris ligne par ligne avec des fonctions et des variable globales.
    </li>
    <li> C'est un enchaînement d'instructions, comme une recette de cuisine.</li>
</ul>

<p>
    Exemple
</p>
<?php

$nom = "Ousmane";
$age = 8;


function direBonjour($a, $b) {
    echo "Bonjour " . $a . " et tu as " . $b . " ans <br>";
}

 direBonjour($nom, $age);

// Avantages :
// Simple à comprendre

// Rapide pour les petits scripts

// Facile à démarrer


// Inconvénients :
// Variables globales → collisions, erreurs
// pas réutilisable
// difficile à maintenir quand le code devient plus complexe


class Users{
    public $nom;
    public $age;
    public function __construct($a, $b) {
        $this->nom = $a;
        $this->age = $b;

    }
    public function direBonjour() {
        echo "Bonjour " . $this->nom . " et tu as " . $this->age . " ans <br>";
    }

}

$user = new Users("Ousmane", 8);
$user->direBonjour();

$user1=new Users("Alice", 25);
$user1->direBonjour();

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


<p>La programation orientée objet (POO) est un paradigme de programmation qui permet de mieux organiser le code, de le rendre plus réutilisable, modulaire et maintenable.</p>


<h2> les classes</h2>

<p>Une classe est une structure qui définit un objet, c'est le modèle à partir duquel des objets (instances) sont créés.</p>
<p>On la déclare avec le mot-clé class.</p>

<?php

// exemple simple de classe

class Voiture1
{
    // propriétés
    public $marque;
    public $couleur;
    
    // méthode
    public function klaxoner() {
        echo "Tuut tuut !";
    }
}

// Creer un objet à partir d'une classe

$maVoiture = new Voiture1();

$maVoiture->marque = "Peugeot";
$maVoiture->couleur = "Rouge";
$maVoiture->klaxoner();
echo "<pre>";
print_r($maVoiture);
echo "</pre>";

class Car{
    public $marque; // propriétés
    public $couleur; // propriétés

    // Méthodes
    public function __construct($a, $b) {
        $this->marque = $a;// $this->marque fait reference à public $marque;
        $this->couleur = $b;// $this->couleur fait reference à public $couleur;
    }
    // methode, c'est une fonction qui s'execute quand on appelle l'objet avec " -> "
    public function demarrer() {
        echo "La $this->marque démarre !";
    }
  
}

$new_car= new Car("Peugeot", "Rouge");
echo "<pre>";
print_r($new_car);
echo "</pre>";
$new_car->demarrer();

echo $new_car->marque;
?>
<h4>__construct()</h4>

<p>La méthode __construct() est une méthode magique qui est automatiquement appelée lors de la création d'un objet. Elle permet d'initialiser les propriétés de l'objet.</p>

<h4> $this->marque</h4>
<p>Cela fait référence à la propriété de la classe : public $marque;</p>

<p>public $marque;</p>
<p> Déclare une propriété dans la classe, mais elle appartient à chaque objet (instance).</p>
<ul><li>
Elle est définie dans la classe (c’est son plan de construction),
mais elle est instanciée dans chaque objet que tu crées à partir de cette classe.
</li></ul>


<p>En clair, c’est comme si tu disais : « propriété marque de cet objet, prends la valeur que je viens de recevoir dans le paramètre $a »</p>

<h4>Propriétés et méthodes</h4>
<p>Les propriétés sont des variables de la classe.</p>
<p>Les méthodes sont des fonctions de la classe.</p>

<h4>Portée des propriétés</h4>
<p>La portée des propriétés détermine l'accès à ces propriétés.</p>

<p>public : accessible partout</p>
<p>private : accessible uniquement dans la classe</p>
<P>protected : accessible uniquement dans la classe et dans les classes enfants</P>

<h4>Portée des methodes</h4>
<p>La portée des methodes détermine l'accès à ces methodes.</p>

<p>public : accessible partout</p>
<p>private : accessible uniquement dans la classe</p>
<P>protected : accessible uniquement dans la classe et dans les classes enfants</P>

<?php


class Animal {
    private $espece;

public function __construct($a) {
    $this->espece = $a;
}

public function getEspece() {
    return ucfirst($this->espece);
}
public function setEspece($a) {
      $espaceValide=["chat", "chien", "oiseau", "reptile"];

      if (in_array($a, $espaceValide)) {
          $this->espece = $a;
      }else{
        echo "espèce invalide <br>";
      }



}
// __toString() est une méthode magique qui permet de convertir l'objet en string
public function __toString()
{
    return "L'animal est de l'espèce " . $this->espece;
}
}

$chat = new Animal("chat");
echo $chat;
 
 echo $chat->getEspece();
echo "<br>";
 $chat->setEspece("lapin");// affiche espèce invalide

?>

<p>private $espece: la propriété est protégée, on ne peut pas y accéder directement, on est obligé de passer par le getter et le setter</p>

<p>setEspece(): Methode de contrôle : verifie si la valeur est correcte</p>
<p>getEspece(): Methode de lecture : retourne la valeur de la propriété</p>

<h4> Getter : Permet de lire (accéder) la propriété privé</h4>
<h4> Setter : Permet de modifier la propriété privé, avec ou sans sécurité</h4>

<h4>Pourquoi ne pas mettre simplement les propriétés en public ?</h4>
<p>Parce que c'est moins sécurisé, on peut modifier la propriété directement, sans passer par le setter.</p>
<p>On ne peut plus controller ce qu'on y met</p>









