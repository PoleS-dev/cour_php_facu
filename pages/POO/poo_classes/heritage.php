<?php 
namespace App;
/*
|--------------------------------------------------------------------------
| Cours sur l'héritage des classes en PHP
|--------------------------------------------------------------------------
|
| Ce fichier contient un cours structuré avec exemples concrets.
| Il peut être ouvert dans un navigateur ou exécuté en CLI.
|
*/

echo "<h1>🧬 Cours sur l’héritage des classes en PHP</h1>";

echo "<h2>✅ Qu’est-ce que l’héritage ?</h2>";
echo "<p>L’héritage permet à une classe d’hériter des propriétés et méthodes d’une autre classe.</p>";
echo "<p>Syntaxe : <code>class Enfant extends Parent</code></p>";

echo "<h2>🧩 Exemple simple</h2>";

class Animal
{
    public function respirer()
    {
        echo "Je respire<br>";
    }
}

class Chien extends Animal
{
    public function aboyer()
    {
        echo "Ouaf !<br>";
    }
}

$rex = new Chien();
$rex->respirer();
$rex->aboyer();

echo "<h2>🔄 Redéfinir une méthode (Override)</h2>";

class Chat extends Animal
{
    public function respirer()
    {
        echo "Le chat respire silencieusement<br>";
    }
}

$chat = new Chat();
$chat->respirer();

echo "<h2>🔗 Utiliser parent:: pour appeler le parent</h2>";

class Chat2 extends Animal
{
    public function respirer()
    {
        parent::respirer();
        echo "Mais moi je suis un chat 🐱<br>";
    }
}

$chat2 = new Chat2();
$chat2->respirer();

echo "<h2>🔐 Portée des propriétés</h2>";

class Vehicule
{
    public string $marque = "Sans nom";
    protected int $vitesse = 0;

    public function accelerer()
    {
        $this->vitesse += 10;
        echo "Vitesse actuelle : {$this->vitesse} km/h<br>";
    }
}

class Voiture extends Vehicule
{
    public function turbo()
    {
        $this->vitesse += 50;
        echo "Turbo activé ! Nouvelle vitesse : {$this->vitesse} km/h<br>";
    }
}

$car = new Voiture();
$car->accelerer();
$car->turbo();

echo "<h2>📘 Exemple concret : Employé → Manager</h2>";

class Employe
{
    protected string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function travailler()
    {
        echo "$this->nom travaille<br>";
    }
}

class Manager extends Employe
{
    public function diriger()
    {
        echo "$this->nom dirige une équipe<br>";
    }
}

$m = new Manager("Sophie");
$m->travailler();
$m->diriger();

echo "<h2>🚫 Utilisation de final</h2>";

final class MonSingleton
{
    public function info()
    {
        echo "Je suis une classe finale<br>";
    }
}

// class Herite extends MonSingleton {} // ERREUR : on ne peut pas hériter

echo "<h2>📐 Classe abstraite (abstract)</h2>";
echo "<p>Une classe <code>abstract</code> ne peut pas être instanciée directement.</p>";
echo "<p>Elle sert de modèle aux classes qui l'étendent. Elle peut contenir des méthodes abstraites (à définir obligatoirement) et des méthodes normales.</p>";

abstract class EmployeAbstrait
{
    protected string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    abstract public function travailler();

    public function sePresenter()
    {
        echo "Bonjour, je suis $this->nom<br>";
    }
}

class Developpeur extends EmployeAbstrait
{
    public function travailler()
    {
        echo "$this->nom code une application 🖥️<br>";
    }
}

$dev = new Developpeur("Maxime");
$dev->sePresenter();
$dev->travailler();

echo "<h2>📌 Récapitulatif</h2>";
echo "<ul>
    <li><strong>extends</strong> : pour hériter d’une autre classe</li>
    <li><strong>parent::</strong> : appeler une méthode héritée</li>
    <li><strong>protected</strong> : accessible dans la classe et les enfants</li>
    <li><strong>final</strong> : empêche l’héritage ou la redéfinition</li>
    <li><strong>abstract</strong> : modèle de base pour d’autres classes, non instanciable</li>
</ul>";