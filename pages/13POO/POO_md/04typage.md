# 📝 Cours : Le typage dans les classes PHP

> Compatibilité : **PHP 7.4+** (typed properties) & **PHP 8+** (constructor promotion, union types, mixed).

---

## 1. 🔹 Typage des propriétés

```php
class Produit {
    public int $id;
    public string $nom;
    public float $prix;
    public ?string $description = null;   // nullable
}
```

| Propriété      | Type      | Nullable ? | Valeur par défaut |
|----------------|-----------|------------|-------------------|
| `$id`          | `int`     | non        | —                 |
| `$nom`         | `string`  | non        | —                 |
| `$prix`        | `float`   | non        | —                 |
| `$description` | `?string` | oui        | `null`            |

> ✅ **Avantages** : validation automatique des types, IDE autocomplétion, zéro “array of doom”.

---

## 2. 🔹 Typage dans le constructeur (avec promotion PHP 8)

```php
class Article {
    public function __construct(
        private int $id,
        private string $titre
    ) {}
}
```

*   Les propriétés **sont créées et typées** directement dans la signature.
*   Plus de répétition : pas besoin de les redéfinir dans le corps.

---

## 3. 🔹 Typage des arguments & valeurs de retour

```php
class Panier {
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
```

| Méthode                  | Paramètres                        | Retour |
|--------------------------|-----------------------------------|--------|
| `ajouterProduit()`       | `string $produit`                 | `void` |
| `getProduits()`          | *(aucun)*                         | `array`|

---

## 4. 🔹 Types scalaires & spéciaux

| Type      | Description            |
|-----------|------------------------|
| `int`     | Entier (`42`)          |
| `float`   | Décimal (`3.14`)       |
| `string`  | Chaîne                 |
| `bool`    | `true` / `false`       |
| `array`   | Tableau                |
| `object`  | Instance d’une classe  |
| `mixed`   | **Tout type** (PHP 8)  |
| `?Type`   | Nullable               |
| `TypeA|TypeB` | **Union** (PHP 8)  |

---

## 5. 🔹 Erreurs de typage

```php
declare(strict_types=1);

$a = new Article(42, []);  // ❌ Fatal error : array donné au lieu de string
```

* Avec `strict_types` désactivé, PHP *tente* des conversions ; activé, il lève une erreur immédiate.

---

## 6. 🔹 Union & intersection types (PHP 8.1)

```php
function convert(int|string $value): string
{
    return (string) $value;
}
```

*  `int|string` accepte **l’un OU l’autre**.  
*  `A&B` (intersection) nécessite **les deux interfaces** (PHP 8.2).

---

## 7. 🔹 Bonnes pratiques

1. **Active** `declare(strict_types=1);` en tête de fichier ou via l’auto‑prepend.  
2. Utilise des outils d’analyse statique (**PHPStan**, **Psalm**) : ils repèrent les incohérences avant l’exécution.  
3. Privilégie les **DTO** (Data Transfer Objects) typés plutôt que des tableaux associatifs magiques.  
4. Documente les propriétés avec PHPDoc *et* types natifs pour la rétro‑compatibilité (IDE pré‑PHP 7.4).  
5. Préfère `?Type` à des valeurs magiques (`''`, `0`) pour exprimer l’absence de donnée.

---

## ✅ Synthèse

* **Typed properties** → fiabilité & lisibilité.  
* **Constructeur promu** → moins de boilerplate.  
* **Retour et paramètres typés** → auto‑vérification runtime.  
* **Union / nullable / mixed** offrent flexibilité *contrôlée*.  
* Avec le mode strict + analyse statique, ton code gagne en **qualité** et en **maintenabilité**.

---

> 🚀 *“Des types bien choisis réduisent les bugs et augmentent la confiance.”*  
