<h2>🧠 Qu’est-ce qu’une constante de classe ?</h2>;
<p>Une constante de classe est une valeur <strong>fixe, immuable</strong> qui appartient à une <strong>classe</strong> et non à un objet.</p>;
<p>Elle se déclare avec le mot-clé <code>const</code> et ne commence <strong>pas</strong> par un <code>$</code>.</p>;

<h2>🔤 Syntaxe</h2>;

<pre><code>class MaClasse {
    public const NOM = 'MaConstante';
}</code></pre>;

<p>Accès : <code>MaClasse::NOM</code></p>;


Le mot-clé static est utilisé pour déclarer des propriétés ou des méthodes qui appartiennent à la classe elle-même, et non aux instances de cette classe.

Autrement dit :

Les membres static sont partagés entre toutes les instances d'une classe, et peuvent être utilisés sans créer d’objet.


<?php
// ---------------------------------------------
// Cours complet sur : static, const, self, ::
// ---------------------------------------------
class CoursPHP
{
    // --------------------
    // 1. CONSTANTE DE CLASSE
    // --------------------

    // Une constante de classe est une valeur fixe, immuable qui appartient à une classe et non à un objet.
    public const VERSION = "1.0.0";

    // --------------------
    // 2. PROPRIÉTÉ STATIQUE
    // --------------------
 
    //appartient à une classe et non à un objet
    
    public static $nbInstances = 0;

    private static $prive = "je suis visible uniquement par la méthode afficherNbInstances ou afficherInfos";

    public $nom;

    // --------------------
    // Constructeur
    // --------------------
    public function __construct($nom)
    {
        $this->nom = $nom;

        // self:: pour accéder à des propriétés ou constantes de la classe
        self::$nbInstances++;
    }

    // --------------------
    // Méthode non statique (utilise $this)
    // --------------------
    public function afficherInfos()
    {
        echo "👤 Nom de l’instance : " . $this->nom . "<br>";
        echo "📦 Version de la classe : " . self::VERSION . "<br>";
        echo "🔢 Nombre d’instances créées : " . self::$nbInstances . "<br>";
        echo  self::$prive . "<br>";
        echo "<hr>";
    }

    // --------------------
    // Méthode statique (aucune instance nécessaire)
    // --------------------
    public static function afficherNbInstances()
    {
        echo "📊 Total des instances : " . self::$nbInstances . "<br>";
        echo  self::$prive . "<br>";
    }
}

// ---------------------------------------------
// UTILISATION EN DEHORS DE LA CLASSE
// ---------------------------------------------

// Création d'objets
$e1 = new CoursPHP("Alice");
$e2 = new CoursPHP("Bob");


// Affichage via méthode d’instance
$e1->afficherInfos();
$e2->afficherInfos();

// Utilisation d'une méthode statique
CoursPHP::afficherNbInstances();

// ✅ Modification autorisée : propriété statique publique
CoursPHP::$nbInstances = 99;
CoursPHP::afficherNbInstances();

// ❌ Interdit : tentative de modifier une constante (provoquerait une erreur fatale)
// CoursPHP::VERSION = "2.0.0"; // <-- NE PAS FAIRE ❗






// constantes
class StatutCommande
{
    public const EN_ATTENTE = 'en_attente';
    public const VALIDE = 'valide';
    public const ANNULEE = 'annulee';
}

//pourquoi utiliser des constantes et define ici?

$statut = StatutCommande::VALIDE;

switch ($statut) {
    case StatutCommande::VALIDE:
        echo "Commande validée<br>";
        break;
    case StatutCommande::ANNULEE:
        echo " Commande annulée<br>";
        break;
}



class Meuble
{
    public const TYPE = "Meuble";

    public function afficherType()
    {
        echo "self::TYPE = " . self::TYPE . "<br>";     // Toujours "Animal"
        echo "static::TYPE = " . static::TYPE . "<br>"; // Peut changer avec héritage
    }
}

class Table extends Meuble
{
    public const TYPE = "Table";
}

// Test
echo "<h3>Meuble :</h3>";
$meuble = new Meuble();
$meuble->afficherType();

echo "<h3>Table :</h3>";
$table = new Table();
$table->afficherType();


// public static	✅ Oui	Depuis l’extérieur
// private static	✅ Oui	Uniquement depuis la classe elle-même
// protected static	✅ Oui	Depuis la classe et ses enfants


// À retenir :
// self:: → rigide, compile à la classe où la méthode est définie

// static:: → souple, compile à la classe qui appelle la méthode (💥 late static binding)


class ParentClass
{
    public const VERSION = '1.0';
}
// Peut-on redéfinir une constante dans une classe enfant ?
// ✅ OUI, mais ⚠️ ça ne remplace pas la constante parent, ça la masque :
class EnfantClass extends ParentClass
{
    public const VERSION = '2.0';
}

echo ParentClass::VERSION; // 1.0
echo EnfantClass::VERSION; // 2.0


class Exemple
{
    /*
    |--------------------------------------------------------------------------
    | 🔸 CONST : Constante de classe
    |--------------------------------------------------------------------------
    | 📌 Immuable : La valeur ne peut pas être modifiée une fois définie
    | 📦 Type : Constante
    | 🔁 Partagée entre toutes les instances : OUI
    | 🎯 Accessible via : self::NOM ou NomClasse::NOM
    | 💾 Type autorisé : Valeurs scalaires uniquement (string, int, float, bool)
    | 🛠 Usage : Pour des valeurs figées comme des statuts, des versions, des clés
    | 🧱 Exemple : VERSION, STATUT_VALIDÉ
    */
    public const VERSION = "1.0.0";

    /*
    |--------------------------------------------------------------------------
    | 🔹 STATIC : Propriété statique de classe
    |--------------------------------------------------------------------------
    | ✅ Modifiable : La valeur peut changer durant l’exécution
    | 📦 Type : Propriété de classe partagée
    | 🔁 Partagée entre toutes les instances : OUI
    | 🎯 Accessible via : self::$var ou NomClasse::$var
    | 💾 Type autorisé : Tout type (array, object, int, etc.)
    | 🛠 Usage : Pour des compteurs, caches, configuration globale dynamique
    | 🧱 Exemple : $compteur, $config, $instances
    */
    public static $compteur = 0;

    /*
    |--------------------------------------------------------------------------
    | 🔸 Propriété d’instance : chaque objet a sa propre valeur
    |--------------------------------------------------------------------------
    | 📌 Modifiable : Oui, propre à chaque objet
    | 🔁 Partagée entre instances : NON ❌
    | 🛠 Usage : Données spécifiques à chaque objet
    */
    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
        self::$compteur++; // Incrémenter compteur partagé
    }

    public function afficher()
    {
        echo "🧍 Nom : $this->nom <br>";
        echo "📦 Version de la classe (const) : " . self::VERSION . "<br>";
        echo "🔢 Nombre d'instances créées (static) : " . self::$compteur . "<br>";
        echo "<hr>";
    }
}

// Démo
$e1 = new Exemple("Alice");
$e2 = new Exemple("Bob");

$e1->afficher();
$e2->afficher();

?>