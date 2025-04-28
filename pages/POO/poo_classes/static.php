<?php
/*
|--------------------------------------------------------------------------
| Cours sur les propriétés et méthodes STATIC en PHP
|--------------------------------------------------------------------------
|
| Ce fichier présente comment et pourquoi utiliser `static` dans une classe.
| Il inclut des explications, exemples, démonstrations, et résumé final.
|
*/

echo "<h1>⚙️ Cours sur les propriétés et méthodes <code>static</code> en PHP</h1>";

echo "<h2>🔎 Qu’est-ce que <code>static</code> ?</h2>";
echo "<p>Le mot-clé <code>static</code> permet de créer :</p>
<ul>
    <li>✔️ des <strong>méthodes de classe</strong> (appelables sans instanciation)</li>
    <li>✔️ des <strong>propriétés de classe</strong> (partagées entre tous les objets)</li>
</ul>";

echo "<h2>📌 Pourquoi utiliser <code>static</code> ?</h2>
<ul>
    <li>✅ Quand tu n’as pas besoin d’un objet (ex : calcul mathématique)</li>
    <li>✅ Pour stocker des données globales à la classe (ex : compteur d’objets)</li>
    <li>✅ Pour des méthodes utilitaires (helpers, services, etc.)</li>
</ul>";

echo "<h2>🧪 Exemple simple avec méthode static</h2>";

class Calculatrice
{
    public static function addition(int $a, int $b): int
    {
        return $a + $b;
    }

    public static function multiplication(int $a, int $b): int
    {
        return $a * $b;
    }
}

echo "5 + 3 = " . Calculatrice::addition(5, 3) . "<br>";
echo "4 × 6 = " . Calculatrice::multiplication(4, 6) . "<br>";

echo "<h2>📊 Exemple avec propriété static</h2>";

class Utilisateur
{
    public string $nom;
    public static int $nbUtilisateurs = 0;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
        self::$nbUtilisateurs++;
    }

    public static function afficherStatut(): void
    {
        echo "Il y a " . self::$nbUtilisateurs . " utilisateur(s) actif(s)<br>";
    }
}

$u1 = new Utilisateur("Alice");
$u2 = new Utilisateur("Bob");
Utilisateur::afficherStatut(); // Il y a 2 utilisateur(s)

echo "<h2>🧠 Différence entre <code>self::</code> et <code>static::</code></h2>";
echo "<ul>
    <li><code>self::</code> → appelle la méthode/propriété dans la classe actuelle</li>
    <li><code>static::</code> → appelle selon la classe qui a été utilisée (héritage dynamique)</li>
</ul>";

class Base
{
    public static function quiSuisJe()
    {
        echo "Je suis la classe " . __CLASS__ . "<br>";
    }

    public static function test()
    {
        self::quiSuisJe();   // fixe à la classe Base
        static::quiSuisJe(); // retardé : dépend de la classe qui appelle
    }
}

class Enfant extends Base
{
    public static function quiSuisJe()
    {
        echo "Je suis la classe " . __CLASS__ . "<br>";
    }
}

echo "<strong>Avec Base::test() :</strong><br>";
Base::test();   // affiche "Base" deux fois

echo "<br><strong>Avec Enfant::test() :</strong><br>";
Enfant::test(); // self → Base, static → Enfant

echo "<h2>📘 Résumé des règles</h2>";

echo "<ul>
    <li><strong>static</strong> = attaché à la <u>classe</u>, pas à l’objet</li>
    <li>Utilisable via <code>NomClasse::methode()</code> ou <code>self::</code></li>
    <li>Très utile pour des fonctions utilitaires, compteurs, constantes, etc.</li>
</ul>";

echo "<h2>🎁 Bonus : méthode helper</h2>";

class StringHelper
{
    public static function resume(string $texte, int $limite = 20): string
    {
        return strlen($texte) > $limite ? substr($texte, 0, $limite) . "..." : $texte;
    }
}

echo "Résumé : " . StringHelper::resume("Ce texte est un peu trop long pour une ligne") . "<br>";

?>
<!-- self static  -->
<?php

// Déclaration d'une classe parente
class ParentClasse
{
    // Déclaration d'une constante TYPE dans la classe Parent
    public const TYPE = "Parent";

    // Méthode qui affiche self::TYPE
    public function afficherTypeSelf()
    {
        // self::TYPE utilise la classe où CE CODE est ÉCRIT (ici ParentClasse)
        echo "Avec self::TYPE => " . self::TYPE . "<br>";
    }

    // Méthode qui affiche static::TYPE
    public function afficherTypeStatic()
    {
        // static::TYPE utilise la classe qui APPELLE la méthode (peut changer dynamiquement)
        echo "Avec static::TYPE => " . static::TYPE . "<br>";
    }
}

// Déclaration d'une classe enfant qui hérite de ParentClasse
class EnfantClasse extends ParentClasse
{
    // On redéfinit la constante TYPE dans l'enfant
    public const TYPE = "Enfant";
}

// Création d'un objet de type ParentClasse
$parent = new ParentClasse();

// Création d'un objet de type EnfantClasse
$enfant = new EnfantClasse();

echo "<h2>Test avec un objet ParentClasse :</h2>";

// Quand on appelle afficherTypeSelf() depuis un ParentClasse
$parent->afficherTypeSelf();    // Affiche "Parent" (self::TYPE => ParentClasse::TYPE)

// Quand on appelle afficherTypeStatic() depuis un ParentClasse
$parent->afficherTypeStatic();  // Affiche "Parent" (static::TYPE => ParentClasse::TYPE)

echo "<h2>Test avec un objet EnfantClasse :</h2>";

// Quand on appelle afficherTypeSelf() depuis un EnfantClasse
$enfant->afficherTypeSelf();    // Affiche "Parent" (self::TYPE => ParentClasse::TYPE car self ne change jamais)

// Quand on appelle afficherTypeStatic() depuis un EnfantClasse
$enfant->afficherTypeStatic();  // Affiche "Enfant" (static::TYPE => EnfantClasse::TYPE grâce à Late Static Binding)

?>

