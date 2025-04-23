<?php
/*
|--------------------------------------------------------------------------
| Cours : Le typage dans les classes PHP
|--------------------------------------------------------------------------
|
| Objectif : comprendre et bien utiliser le typage dans les propriétés,
| les arguments, les valeurs de retour et le constructeur.
|
| Compatible PHP 7.4+ (typage des propriétés) et PHP 8+ (promotions + union types)
|
*/

echo "<h1>📘 Cours sur le typage dans les classes PHP</h1>";

echo "<h2>🔹 1. Le typage des propriétés</h2>";

class Produit
{
    public int $id;
    public string $nom;
    public float $prix;
    public ?string $description = null; // peut être string ou null
}

echo "<pre><code>
class Produit {
    public int \$id;
    public string \$nom;
    public float \$prix;
    public ?string \$description = null;
}
</code></pre>";

echo "<p>Les types permettent de sécuriser les données, ici : <code>int</code>, <code>string</code>, <code>float</code>, <code>?string</code>.</p>";

echo "<h2>🔹 2. Le typage dans les constructeurs</h2>";

class Article
{
    private int $id;
    private string $titre;

    public function __construct(int $id, string $titre)
    {
        $this->id = $id;
        $this->titre = $titre;
    }
}

echo "<p>Le constructeur attend un entier et une chaîne, et les affecte aux propriétés typées.</p>";

echo "<h2>🔹 3. Le typage dans les méthodes</h2>";

class Panier
{
    private array $produits = [];

    public function ajouterProduit(string $produit): void
    {
        $this->produits[] = $produit;
    }

    public function getProduits(): array
    {
        return $this->produits;
    }
}

echo "<pre><code>
public function ajouterProduit(string \$produit): void
public function getProduits(): array
</code></pre>";

echo "<p>On impose un <code>string</code> en entrée, et on retourne un <code>array</code> en sortie.</p>";

echo "<h2>🔹 4. Les types autorisés</h2>";

echo "<ul>
    <li><code>int</code> → entier</li>
    <li><code>float</code> → nombre décimal</li>
    <li><code>string</code> → chaîne</li>
    <li><code>bool</code> → vrai/faux</li>
    <li><code>array</code> → tableau</li>
    <li><code>object</code> → objet</li>
    <li><code>?type</code> → accepte null</li>
</ul>";

echo "<h2>🔹 5. Les erreurs de typage</h2>";

echo "<p>Si tu passes une mauvaise valeur à une méthode ou une propriété typée, PHP déclenche une <strong>Fatal Error</strong> :</p>";

echo "<pre><code>
\$a = new Article(42, []); // ❌ Erreur : tableau donné à la place d'un string
</code></pre>";

echo "<h2>🔹 6. Bonus : Typage strict (optionnel)</h2>";

echo "<p>Tu peux activer le typage strict en haut d’un fichier :</p>";

echo "<pre><code>
declare(strict_types=1);
</code></pre>";

echo "<p>Avec ce mode, PHP <strong>ne convertit pas automatiquement</strong> les types (ex: string vers int).</p>";

echo "<h2>✅ Résumé</h2>";

echo "<ul>
    <li>Le typage rend ton code plus fiable et plus lisible</li>
    <li>PHP vérifie les types automatiquement à l'exécution</li>
    <li>Utilise <code>?type</code> pour accepter null</li>
    <li>Depuis PHP 8, tu peux aussi utiliser des <code>union types</code> (ex : <code>int|string</code>)</li>
</ul>";

?>
