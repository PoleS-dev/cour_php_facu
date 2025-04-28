

<h2> Qu'estce qu'une constante de classe ?</h2>


<p>Une constante de classe est une valeur fixe,immuable qui appratient à une class et non à un objet</p>
<p> Elle se déclare par le mot-clé "const " et est en majuscule</p>


<?php 

class MaClass
{
    public int $test;
    public  const  MACONSTANTE = "Valeur de la constante";
}

echo MaClass::MACONSTANTE;
?>
<P> Accès : <code>MaClass::MACONSTANTE</code></P>


<h2> qu'estce que une static</h2>
<p>
    le mot-clé static est utilisé pour déclarer des propriétés ou des méthodes qui appartiennent à la classe elle-même, et non aux instances de cette classe.
</p>

<p>les methodes et propriété static peuvent être recuoérer sans créer d'objet de la classe</p>
<p> exemple : </p>

<ul>
    <li>public static $test;</li>
    <li>public static function test() : void</li>
</ul>

<?php 

class CourPHP
{
    // constante de classe
    public const VERSION ="1.0.0";
    // propriété statique
    public static $nbInstances = 0;

    private static $prive="je suis visible en passant par les methode de la classe";
    public $nom;
    public function __construct(string $nom)
    {
        $this->nom = $nom;
        self::$nbInstances++;
         
        
    }

    public static function afficherNbInstances() : void
    {
        echo "total des instances : " . self::$nbInstances;
        echo self::$prive;
    }

  

}

echo CourPHP::VERSION;
echo "<br>";
// nous pouvons acceder à la valeur sans passer par l'objet 
echo CourPHP::$nbInstances;

$eleve1 = new CourPHP("Adam");
$eleve2 = new CourPHP("Moussa");

// nous pouvons acceder à la fonction sans passer par l'objet 
CourPHP::afficherNbInstances();

$eleve1->afficherNbInstances();

// je peux aussi modiffier sa valeur
 CourPHP::$nbInstances=99;
 echo CourPHP::$nbInstances;

 echo CourPHP::VERSION;
//  CourPHP::VERSION=2.0.0;  erreur car on ne peut pas modifier valeur d'une const



