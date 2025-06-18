# 🧩 Constantes de Classe et Membre `static` en PHP

Ce mémo fait le tour **complet** des constantes de classe et des membres `static` : définition, syntaxe, différences, pièges et bonnes pratiques.

---

## 1. Constante de Classe

| Caractéristique | Détail |
|-----------------|--------|
| **Immuable ?**  | Oui, la valeur **ne peut pas être modifiée** après la définition (comme `define()`) |
| **Portée**      | Accessible **sans instanciation** |
| **Syntaxe**     | `public const NOM = valeur;` (toujours en MAJUSCULE par convention) |
| **Types autorisés** | `int`, `float`, `string`, `bool`, `array` (PHP 7.1+) |
| **Accès**       | `MaClasse::NOM` – même depuis l’extérieur |

```php
class MaClass {
    public const VERSION = "1.0.0";
}

echo MaClass::VERSION;          // ↪︎ 1.0.0
```

> 🔎 **À retenir :** les constantes de classe sont idéales pour des valeurs **figées** : statuts, clés, versions, messages d’erreur, etc.

---

## 2. Membre `static`

| Caractéristique | Propriété/Méthode `static` |
|-----------------|----------------------------|
| **Mutabilité ?**| Oui (propriétés)            |
| **Partagée ?**  | Valeur **commune** à toutes les instances |
| **Accès**       | `MaClasse::$propriete`; `MaClasse::methode()` |
| **Portée**      | Appel **sans objet** OU via `$this` dans la classe |
| **Usage typique** | Compteurs, cache, factory, configuration globale **dynamique** |

```php
class Compteur {
    public static int $total = 0;

    public function __construct() {
        self::$total++;
    }

    public static function afficherTotal(): void {
        echo "Total : " . self::$total . PHP_EOL;
    }
}

new Compteur();
new Compteur();
Compteur::afficherTotal();      // ↪︎ Total : 2
```

---

## 3. Constantes *vs* `static` : comparatif rapide

| Aspect          | `const`                         | `static` (propriété)          |
|-----------------|---------------------------------|--------------------------------|
| Valeur modifiable ? | ❌ Non                       | ✅ Oui                        |
| Partagée instances ? | ✅ Oui                     | ✅ Oui                        |
| Types supportés | Scalaires (+ array)             | Tous                          |
| Héritage        | Redéfinition possible en enfant | Valeur partagée, réécriture possible |
| Usage idéal     | Valeurs **figées**              | **État global** évolutif      |

---

## 4. Exemple Complet

```php
class CoursPHP {
    // 🔐 Constante
    public const VERSION = "1.0.0";

    // 🔄 Propriété statique
    public static int $nbInstances = 0;

    private static string $secret = "🤫";

    public function __construct() {
        self::$nbInstances++;
    }

    private static function secretMethod(): void {
        echo "Méthode statique privée" . PHP_EOL;
    }

    public static function dashboard(): void {
        echo "Instances : " . self::$nbInstances . PHP_EOL;
        echo "Version   : " . self::VERSION . PHP_EOL;
        self::secretMethod();
    }
}

CoursPHP::dashboard();      // pas besoin d'objet
$u1 = new CoursPHP();
$u2 = new CoursPHP();
CoursPHP::dashboard();      // Instances : 2
```

---

## 5. Redéfinition dans une classe enfant

```php
class ParentExemple {
    public const ROOT = "https://site.com";
    public static function info() {
        echo "Parent" . PHP_EOL;
    }
}

class EnfantExemple extends ParentExemple {
    public const ROOT = "https://site.com/profil";
    public static function info() {
        echo "Enfant" . PHP_EOL;
    }
}

echo ParentExemple::ROOT;   // ↪︎ https://site.com
echo EnfantExemple::ROOT;   // ↪︎ https://site.com/profil

ParentExemple::info();      // ↪︎ Parent
EnfantExemple::info();      // ↪︎ Enfant
```

> 💡 La constante d’origine **n’est pas modifiée** ; on crée une **nouvelle** constante dans la classe enfant.

---

## 6. Interaction entre classes indépendantes

```php
class Util {
    public static function log($msg) { echo "[LOG] $msg"; }
}

class Service {
    public static function run() {
        Util::log("Service démarré");
    }
}

Service::run();             // ↪︎ [LOG] Service démarré
```

---

## 7. Pièges & Best Practices

1. **Namespace:** Préfère `MyVendor\MyPackage\MaClasse::CONST` pour éviter les collisions.  
2. **Immutable:** Ne **jamais** essayer d’écrire `MaClasse::CONST = ...` (Erreur fatale)  
3. **Couplage:** Utilise les constantes pour config _globale_, mais évite le tout‑statique (difficile à tester).  
4. **Mocking/Test:** Les membres `static` compliquent le mocking → favorise l’**injection de dépendances** quand c’est possible.  
5. **PSR‑12:** Les noms de constantes sont en `UPPER_SNAKE_CASE`, les propriétés en `camelCase`.

---

> 🚀 **En résumé :**  
> - `const` = valeur **figée** partagée, non modifiable.  
> - `static` = **état/global** partagé mais dynamique.  
> Bien maîtrisés, ils offrent de la **clarté** et de la **performance** à votre code.
