<h2> Qu'est ce qu'une constante de classe ?</h2>


<p>Une constante de classe est une valeur fixe,immuable qui appratient à une class et non à un objet</p>
<p> Elle se déclare par le mot-clé "const " et est en majuscule</p>


<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class MaClass
{
    public int $test;
    public  const  MACONSTANTE = "Valeur de la constante";
}

echo MaClass::MACONSTANTE;
?>
<P> Accès : <code>MaClass::MACONSTANTE</code></P>


<h2> qu'est ce qu' une static ?</h2>
<p>
    le mot-clé static est utilisé pour déclarer des propriétés ou des méthodes qui appartiennent à la classe elle-même, et non aux instances de cette classe.
</p>

<p>les methodes et propriété static peuvent être recuoérer sans créer d'objet de la classe</p>
<p> exemple : </p>

<ul>
    <li>public static $test;</li>
    <li>public static function test() : void</li>
</ul>

<p> Pour appeller une const ou une static depuis la class on utilise le mot clé "self:: "</p>
<p>Pour appeller une const ou une public static depuis l'eterieru de la class on utilise : NOMDELACLASSDEMANDÉ::NOMDELAVARIABLE ou NOMDELACLASSDEMANDÉ::nomDeLaMethodeDemmandé() </p>

<?php

class CourPHP
{
    // constante de classe
    // | 📌 Immuable : La valeur ne peut pas être modifiée une fois définie
    // | 📦 Type : Constante
    // | 🔁 Partagée entre toutes les instances : OUI
    // | 🎯 Accessible via : self::NOM ou NomClasse::NOM
    // | 💾 Type autorisé :(string, int, float, bool)
    // | 🛠 Usage : Pour des valeurs figées comme des statuts, des versions, des clés
    // | 🧱 Exemple : VERSION, STATUT_VALIDÉ

    public const VERSION = "1.0.0";
    // propriété statique
    // ✅ Modifiable : La valeur peut changer durant l’exécution
    // | 📦 Type : Propriété de classe partagée
    // | 🔁 Partagée entre toutes les instances : OUI
    // | 🎯 Accessible via : self::$var ou NomClasse::$var
    // | 💾 Type autorisé : Tout type (array, object, int, etc.)
    // | 🛠 Usage : Pour des compteurs, caches, configuration globale dynamique
    // | 🧱 Exemple : $compteur, $config, $instances
    public static $nbInstances = 0;


    private static $prive = "je suis visible en passant par les methode de la classe";
    public $nom;
    public function __construct(string $nom)
    {
        $this->nom = $nom;
        self::$nbInstances++; // a chaque nouvelle instance ( new CourPHP on incremente de 1 )
    }
    // ici la methode est privé donc on ne peut pas l'appeller depuis l'exterieur,  
    private static function staticFunctionPrivate()
    {;
        echo "je suis une methode static privé";
    }

    public static function afficherNbInstances(): void
    {
        echo "total des instances : " . self::$nbInstances;
        echo self::$prive;
        // on peut appeller la methode privé depuis l'exterieur en appellant une methode static public
        self::staticFunctionPrivate();
        echo self::VERSION;
    }
}



echo CourPHP::VERSION;
echo "<br>";

echo "<br>";
echo CourPHP::VERSION;
echo "<br>";


echo CourPHP::VERSION;
echo "<br>";
// nous pouvons acceder à la valeur sans passer par l'objet 
echo CourPHP::$nbInstances;

CourPHP::afficherNbInstances();

$eleve1 = new CourPHP("Adam");
$eleve2 = new CourPHP("Moussa");

// nous pouvons acceder à la fonction sans passer par l'objet 
CourPHP::afficherNbInstances();

$eleve1->afficherNbInstances();

// je peux aussi modiffier sa valeur
CourPHP::$nbInstances = 99;
echo CourPHP::$nbInstances;

echo CourPHP::VERSION;
//  CourPHP::VERSION=2.0.0;  erreur car on ne peut pas modifier valeur d'une const



CourPHP::afficherNbInstances();
// ***********************************************************


// class composé uniquement de const 
class StatutCommande
{
    public const EN_ATTENTE = 'en_attente';
    public const VALIDE = 'valide';
    public const ANNULEE = 'annulee';
}




$statut = StatutCommande::VALIDE;

switch ($statut) {
    case StatutCommande::VALIDE:
        echo "✅ Commande validée<br>";
        break;
    case StatutCommande::ANNULEE:
        echo "❌ Commande annulée<br>";
        break;
}


//************************************************* */
?>

<h2>modification d'une constante et d'une methode static</h2>

<p>Comme avec define() une const ne peut être modifiable depuis l'exterieur de la class mais les class enfants peuvent la "modifier" </p>
<p>la version d'origine ne sera pas modifié mais une elle pourra avoir une autre valeur pour une class enfant </p>

<p>
    Par ce même principe une class enfant peut modifier une methode static.
</p>

<p>exemple</p>

<?php
class MonExemple
{
    public const ROOT = "http::/localhost";

    public static  function mafunction()
    {
        echo "je suis la methode de Monexemple";
    }
}


echo MonExemple::ROOT;
MonExemple::mafunction();
class EnfantExemple extends MonExemple
{
    public const ROOT = "http::/localhost/page/profil";

    public static  function mafunction()
    {
        echo "je suis la methode de EnfantExemple";
    }
}

echo "<br>";
echo MonExemple::ROOT; // affiche "http::/localhost"
echo "<br>";
echo EnfantExemple::ROOT;  // affiche "http::/localhost/page/profil"

echo "<br>";
MonExemple::mafunction(); // affiche "je suis la methode de Monexemple"
echo "<br>";
EnfantExemple::mafunction(); // affiche "je suis la methode de EnfantExemple"
echo "<br>";





//***************************************************************************** */

// Comme une methode est accessible depuis l'exterieur de la class elle peut être appelé depuis une autre class indépendante : 
class Test1
{

    public static function test1()
    {
        // on appelle la methode  public static issu de la class MonExemple
        MonExemple::mafunction();
    }
}
Test1::test1();// affiche "je suis la methode de Monexemple"



//***************************************************************************** */
