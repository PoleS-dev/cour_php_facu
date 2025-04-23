<?php
/*
|--------------------------------------------------------------------------
| Cours : Les constantes de classe en PHP
|--------------------------------------------------------------------------
|
| Objectif : comprendre comment déclarer, utiliser et à quoi servent les
| constantes dans une classe PHP (avec des exemples concrets).
|
*/

echo "<h1>📘 Cours sur les constantes de classe en PHP</h1>";

echo "<h2>🧠 Qu’est-ce qu’une constante de classe ?</h2>";
echo "<p>Une constante de classe est une valeur <strong>fixe, immuable</strong> qui appartient à une <strong>classe</strong> et non à un objet.</p>";
echo "<p>Elle se déclare avec le mot-clé <code>const</code> et ne commence <strong>pas</strong> par un <code>$</code>.</p>";

echo "<h2>🔤 Syntaxe</h2>";

echo "<pre><code>class MaClasse {
    public const NOM = 'MaConstante';
}</code></pre>";

echo "<p>Accès : <code>MaClasse::NOM</code></p>";

echo "<h2>🔐 Visibilité des constantes</h2>";
echo "<p>Depuis PHP 7.1, une constante peut être <code>public</code>, <code>protected</code> ou <code>private</code>.</p>";

class Exemple
{
    public const PUBLIQUE = "Visible partout";
    protected const PROTEGEE = "Visible uniquement dans la classe et les enfants";
    private const PRIVEE = "Visible uniquement dans la classe";
}

echo "<p>Exemple d’utilisation publique : " . Exemple::PUBLIQUE . "</p>";

echo "<h2>🎯 Cas d’usage concrets</h2>";

echo "<h3>1. 🔁 Valeur fixe réutilisable (ex : TVA)</h3>";

class Config
{
    public const TVA = 0.20;
}

$prix = 100;
$tva = $prix * Config::TVA;
echo "Prix : 100 € — TVA : " . ($tva) . " €<br>";

echo "<h3>2. 📦 Statuts d’une commande</h3>";

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

echo "<h3>3. ⚠️ Liste des messages d’erreur</h3>";

class Erreurs
{
    public const DB_ERROR = "Erreur de connexion à la base de données";
    public const AUTH_ERROR = "Accès refusé, utilisateur non connecté";
}

echo "Erreur affichée : " . Erreurs::AUTH_ERROR . "<br>";

echo "<h2>📚 Héritage et constantes</h2>";

class ParentClasse
{
    public const TYPE = "Parent";
}

class EnfantClasse extends ParentClasse
{
    public function afficherType()
    {
        echo "Type : " . self::TYPE . "<br>";
    }
}

$objet = new EnfantClasse();
$objet->afficherType(); // Affiche "Parent"

echo "<h2>❌ Ce qu’on ne peut pas faire avec une constante</h2>";
echo "<ul>
    <li>❌ Modifier sa valeur après la déclaration</li>
    <li>❌ Lui assigner une valeur dynamique (ex : date(), rand())</li>
    <li>❌ L’utiliser avec \$this → elle appartient à la classe, pas à l’objet</li>
</ul>";

echo "<h2>✅ Résumé</h2>";
echo "<ul>
    <li><strong>const</strong> permet de définir une valeur fixe pour une classe</li>
    <li>Accès avec <code>NomDeClasse::NOM_DE_CONSTANTE</code></li>
    <li>Utile pour : configuration, statuts, erreurs, rôles, etc.</li>
    <li>Compatible avec l’héritage</li>
</ul>";

?>
