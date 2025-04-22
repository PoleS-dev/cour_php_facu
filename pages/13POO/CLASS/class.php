

<h2>différence php procedural et POO</h2>

<p>php procedural : c'est un langage de programmation qui n'a pas de classes, de méthodes, de propriétés, de constructeurs, etc.</p>
<ul>
    <li>PHP procédural = du code écrit ligne par ligne, avec des fonctions et des variables globales.</li>
    <li>Pas d’objet, pas de classe. C’est un enchaînement d’instructions, comme une recette de cuisine.</li>
</ul>
<p>exemple</p>

<?php

$nom = "Alice";
$age = 25;

function direBonjour($nom, $age) {
    return "Bonjour " . $nom . " et tu as " . $age . " ans <br>";
}

echo direBonjour($nom, $age);

// Avantages :
// Simple à comprendre

// Rapide pour les petits scripts

// Facile à démarrer


// ❌ Inconvénients :
// Peu modulaire

// Pas réutilisable

// Difficile à maintenir quand ça grandit

// Variables globales → collisions, erreurs


class Utilisateurs {
    public $nom;
    public $age;
    
    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }
    
    public function direBonjour() {
        return "Bonjour " . $this->nom . " et tu as " . $this->age . " ans <br>";
    }
}

$u = new Utilisateurs("Alice", 25);
echo $u->direBonjour(); // Bonjour Alice
echo $u->nom ."<br>";
$u->nom = "Bob ";
echo $u->direBonjour(); // Bonjour Bob



?>

<p>
La Programmation Orientée Objet (POO) est un paradigme de programmation basé sur le concept d'objets. En PHP, cela permet de mieux organiser le code, de le rendre plus réutilisable, modulaire et maintenable.
</p>

<h1>1. Les classes</h1>
    <p>Une classe est une structure qui définit un objet, c'est le modèle à partir duquel des objets (instances) sont créés.</p>
    <p>On la déclare avec le mot-clé <code>class</code>.</p>

<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
// 2. Exemple simple de classe
class Voitures
{
    // Propriétés
    public $marque;
    public $couleur;

    // Méthode
    public function klaxonner()
    {
        echo "Tuut tuut !";
    }
}
// . Créer un objet à partir d’une classe

$maVoiture = new Voitures();
$maVoiture->marque = "Peugeot";
$maVoiture->couleur = "Rouge";

$maVoiture->klaxonner(); 


class Voiture {
    public $marque;// <- ça c’est une PROPRIÉTÉ (d’un OBJET)
    
    public $couleur;//

    // Constructeur // c'est une méthode qui s'execute automatiquement quand on crée un objet avec new
    public function __construct($marque, $couleur) {
        $this->marque = $marque; // $this->marque fait reference à public $marque; $marque fait reference au paramètre de la fonction
        echo "Paramètre \$marque = $marque <br>";
        $this->couleur = $couleur;
        echo "Paramètre \$couleur = $couleur <br>";
    }

    // Méthode // c'est une fonction qui s'execute quand on appelle l'objet avec ->
    public function demarrer() {
        return "La {$this->marque} démarre 🏁";
    }


    // Une classe est comme un plan de construction pour créer des objets. Elle définit les propriétés (attributs) et les méthodes (fonctions) que les objets créés à partir de cette classe vont avoir. 
}

// creation d'objet
echo "<h2>Création d'un objet</h2>";
$maVoiture = new Voiture("Toyota", "rouge");
echo $maVoiture->demarrer(); // Affiche : La Toyota démarre 🏁
echo "<pre>";
print_r($maVoiture); 
echo "</pre>";
//echo $maVoiture['marque']; erreur Uncaught Error: Cannot use object of type Voiture as array
echo $maVoiture->marque ."<br>";
echo $maVoiture->couleur ."<br>";

?>
<h2>👉 __construct()</h2>
<p>C’est une méthode spéciale qu’on appelle automatiquement quand on crée un objet avec new.</p>
<p>Elle sert à initialiser les propriétés de l’objet.</p>

<p>$this->marque :</p>
<p>Cela fait référence à l’attribut de la classe : public $marque;</p>
<p> Pourquoi on accède à public $marque avec $this->marque et pas avec $marque directement dans la classe ?</p>
<p>public $marque;</p>
<p> Déclare une propriété dans la classe, mais elle appartient à chaque objet (instance).</p>
<ul><li>
Elle est définie dans la classe (c’est son plan de construction),
mais elle est instanciée dans chaque objet que tu crées à partir de cette classe.
</li></ul>


<p>En clair, c’est comme si tu disais : « Attribut marque de cet objet, prends la valeur que je viens de recevoir dans le paramètre $marque »</p>

<h2>Attributs et méthodes</h2>
<p>Attributs (ou propriétés) : Ce sont les variables de la classe ($marque, $couleur)</p>
<p>Méthodes : Ce sont les fonctions de la classe (demarrer())</p>

<h2>La portée des attributs</h2>
<p>public : accessible partout</p>
<p>private : accessible uniquement dans la classe</p>
<p>protected : accessible dans la classe et dans ses classes filles</p>

<h2>La portée des méthodes</h2>
<p>public : accessible partout</p>
<p>private : accessible uniquement dans la classe</p>
<p>protected : accessible dans la classe et dans ses classes filles</p>

<h2>exemples</h2>

<?php

class Animal {
    private $espece;

    public function __construct($espece) {
        $this->espece = $espece;
    }

    public function getEspece() {
        return $this->espece;
    }
    public function __toString() {
        return "Espèce : " . $this->espece;
        //✅ $this->espece
        // ✔️ Ça signifie : « je veux accéder à la propriété espece de l’objet courant »
        //return "Espèce : " . $espece;
        // ✔️ Ça signifie : « je veux accéder à la propriété espece de l’objet courant »
        // mais comme elle n’existe pas dans cette méthode, PHP renverra une erreur comme :
        // Notice: Undefined variable: espece in ...
    }
}
// __toString() est une méthode magique qui permet de convertir un objet en chaîne de caractères PHP voit que tu fais echo $chat, donc il cherche comment convertir l’objet $chat en texte.

// ➡️ Il trouve que la classe Animal a une méthode __toString().

// ➡️ Donc PHP appelle automatiquement :
$chat = new Animal("chat");
echo $chat ."<br>"; // Affiche : Espèce : chat
print_r($chat);
echo $chat->getEspece(); // Affiche : chat
?>

<p> public $espece → simple mais risqué (pas de contrôle)</p>
<p>✅ private $espece + getEspece() → pro, sécurisé, évolutif</p>
<p>Et grâce à __toString(), tu peux afficher proprement ton objet, sans exposer ses données internes directement.</p>


<p> Parfait ! 😎 On va maintenant illustrer le vrai pouvoir du private avec un exemple complet, où on :</p>

<ul>
    <li>✅ Empêche de donner une valeur incorrecte à l’attribut (ex : "table", "voiture", etc.)</li>
    <li>✅ Contrôle proprement l’accès à l’attribut</li>
    <li>✅ Affiche l’objet proprement avec __toString()</li>
</ul>
<?php

class Animale {
    private $espece;

    public function __construct($espece) {
        $this->setEspece($espece); // On utilise le setter pour profiter de la validation
    }

    // Getter
    public function getEspece() {
        return ucfirst($this->espece);
    }

    // Setter avec validation
    public function setEspece($espece) {
        $especesValides = ['chat', 'chien', 'lion', 'tigre', 'lapin'];

        if (in_array(strtolower($espece), $especesValides)) {
            $this->espece = strtolower($espece);
        } else {
            throw new Exception("Espèce invalide : $espece ❌");
        }
    }

    // fonction in_array() : vérifie si une valeur existe dans un tableau,  retourne true ou false
    // fonction strtolower() : convertit une chaîne de caractères en minuscules, retourne la chaîne de caractères
    // ucfirst() : convertit la première lettre d'une chaîne de caractères en majuscule, retourne la chaîne de caractères
    // Pour afficher directement l'objet
    public function __toString() {
        return "Animal de l'espèce : " . $this->getEspece();
    }
}

try {
    $chat = new Animale("chat");
    echo $chat . "<br>"; // ✅ Affiche : Animal de l'espèce : Chat

    $chat->setEspece("lion");
    echo $chat->getEspece() . "<br>"; // ✅ Affiche : Lion

    $chat->setEspece("table"); // ❌ Erreur levée
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}


// ici je force le user a passer par le setter et entrer une valeur correcte (setespece )
?>

<p>private     :  $espece	L'attribut est protégé, on ne peut pas y accéder directement</p>
<p>setEspece():   Méthode de contrôle : vérifie si la valeur est correcte</p>
<p>getEspece():	  Fournit un affichage propre, formaté</p>
<p>__toString(): Permet d’afficher l’objet comme une chaîne lisible</p>
<p>Exception:     Sécurise le programme en cas de mauvaise valeur</p>

<h2>🧠 Qu’est-ce qu’un getter et un setter ?</h2>

<p>Getter:	Permet de lire (accéder à) une propriété privée</p>
<p>Setter:	Permet de modifier une propriété privée, avec ou sans validation</p>

<h2>❓ Pourquoi ne pas mettre simplement les propriétés en public ?</h2>
<p>❌ On ne contrôle plus ce qu’on y met</p>
<p>❌ On ne peut pas valider les valeurs</p>
<p>❌ On casse l’encapsulation, principe fondamental de la POO</p>

<?php
class Animal2 {
    private $espece;

    // Setter : définit la valeur
    public function setEspece($espece) {
        $this->espece = $espece;
    }

    // Getter : récupère la valeur
    public function getEspece() {
        return $this->espece;
    }
}
$chat = new Animal2();
$chat->setEspece("Chat");         // J’écris la valeur
echo $chat->getEspece();          // Je lis la valeur


//*************** */

class Utilisateur {
    private $nom;

    public function setNom($nom) {
        if (strlen($nom) < 2) {
            throw new Exception("Nom trop court !");
        }
        $this->nom = ucfirst($nom);
    }

    public function getNom() {
        return $this->nom;
    }
}

$user = new Utilisateur();
$user->setNom("alice");
echo $user->getNom(); // Affiche : Alice

?>

<h2>ici, on :</h2>

<p>Valide que le nom a une taille suffisante</p>
<p>Formate la première lettre en majuscule</p>
<p>Protège la propriété de modifications hasardeuses</p>

<h2>héritage</h2>
<?php

class Chien extends Animale {
    public function aboyer() {
        return "Wouf ! 🐶";
    }
}

$rex = new Chien("Canidé");
echo $rex->getEspece(); // Canidé // heriter de animal 
echo $rex->aboyer();    // Wouf ! 🐶 // de class chien
?>

<p>extends	Pour hériter d’une autre classe</p>
<p>parent::	Pour appeler une méthode du parent</p>
<p>protected	Accès dans la classe et dans les enfants</p>

<?php 

class Utilisateure {
    protected $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function saluer() {
        return "Bonjour, je suis " . $this->nom;
    }
    public function debug() {
        return [
            'nom' => $this->nom
        ];
    }
}

class Admin extends Utilisateure {
    public function saluer() {
        return "👑 Admin : " . $this->nom;
    }

    public function supprimerUtilisateur($utilisateur) {
        return "L'utilisateur {$utilisateur} a été supprimé ✅";
    }
}

$admin = new Admin("Jean");
var_dump($admin);
// Le nom de la classe : Utilisateur

// L’identifiant de l’objet : #1

// La propriété nom, sa visibilité (protected) et sa valeur ("Alice")
var_dump($admin->debug());
// Méthode maison pour afficher ce que tu veux

echo $admin->saluer(); // 👑 Admin : Jean
echo $admin->supprimerUtilisateur("Alice"); // L'utilisateur Alice a été supprimé ✅

// php n'a pas d'heritage multiple class X extends A, B // ❌ interdit

?>
<p>private	❌ Seulement à l’intérieur de la classe elle-même</p>
<p>protected	✅ Dans la classe elle-même ET dans ses enfants</p>
<p>public	✅ Accessible partout, même depuis l’extérieur</p>