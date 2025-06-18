# PHP procédural vs Programmation Orientée Objet (POO)

> *Un mémo pas‑à‑pas pour comprendre quand et pourquoi passer d’un script linéaire à un code orienté objets.*

---

## Table des matières

1. [Introduction rapide](#introduction-rapide)
2. [PHP procédural](#php-procédural)
3. [PHP Orienté Objet](#php-orienté-objet)

   1. [Exemple minimal : classe `Utilisateurs`](#exemple-minimal-classe-utilisateurs)
   2. [Concepts clés](#concepts-clés)
4. [Portée des attributs & des méthodes](#portée-des-attributs--des-méthodes)
5. [Getters, setters & encapsulation](#getters-setters--encapsulation)
6. [Méthodes magiques utiles](#méthodes-magiques-utiles)
7. [Héritage & surcharge](#héritage--surcharge)
8. [Bonnes pratiques modernes](#bonnes-pratiques-modernes)
9. [Ressources utiles](#ressources-utiles)

---

## Introduction rapide

PHP naît en 1995 comme un langage **procédural** – on enchaîne des instructions ligne par ligne. Depuis PHP 5, il supporte pleinement la **POO** (Classes, objets, héritage…). Choisir l’un ou l’autre dépend :

* de la taille du projet ;
* du besoin de réutilisation / maintenance ;
* de la lisibilité pour l’équipe.

---

## PHP procédural

*Approche historique, efficace pour les petits scripts ou POCs.*

```php
<?php
$nom = "Alice";
$age = 25;

function direBonjour(string $nom, int $age): string
{
    return "Bonjour $nom, tu as $age ans.";
}

echo direBonjour($nom, $age);
```

### ✅ Avantages

* Facile à assimiler pour débuter.
* Moins de « bruit » syntaxique.
* Temps d’exécution minimal pour un fichier unique.

### ❌ Inconvénients

* Peu ou pas de modularité.
* Re‑utilisabilité limitée → duplication de code.
* Entretien complexe (variables globales, dépendances implicites).

---

## PHP Orienté Objet

La **POO** organise le code autour d’*objets* qui regroupent **état** (*propriétés*) et **comportement** (*méthodes*). On gagne :

| Bénéfice               | Pour quoi faire ?                                       |
| ---------------------- | ------------------------------------------------------- |
| Modélisation naturelle | Un *User*, une *Voiture*, une *Commande*…               |
| Réutilisation          | Les classes deviennent des bibliothèques ré‑importables |
| Encapsulation          | Cache les détails, expose une API claire                |
| Testabilité            | Chaque classe se teste isolément                        |

### Exemple minimal : classe `Utilisateurs`

```php
class Utilisateurs
{
    public string $nom;
    public int $age;

    public function __construct(string $nom, int $age)
    {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function direBonjour(): string
    {
        return "Bonjour {$this->nom}, tu as {$this->age} ans.";
    }
}

$user = new Utilisateurs('Alice', 25);
echo $user->direBonjour(); // Bonjour Alice, tu as 25 ans.
```

### Concepts clés

| Terme            | Définition courte                          |
| ---------------- | ------------------------------------------ |
| Classe           | Plan d’architecture d’un objet             |
| Objet (instance) | Représentation concrète issue de la classe |
| Propriété        | Variable appartenant à l’objet             |
| Méthode          | Fonction appartenant à l’objet             |
| `__construct()`  | *Ctor* : s’exécute à l’instanciation       |

#### Exemple complet : `Voiture`

```php
class Voiture
{
    public string $marque;
    public string $couleur;

    public function __construct(string $marque, string $couleur)
    {
        $this->marque  = $marque;
        $this->couleur = $couleur;
    }

    public function demarrer(): string
    {
        return "La {$this->marque} démarre 🏁";
    }
}

$maVoiture = new Voiture('Toyota', 'Rouge');
echo $maVoiture->demarrer();
```

---

## Portée des attributs & des méthodes

| Mot‑clé     | Visible…                          | Exemple                                   |
| ----------- | --------------------------------- | ----------------------------------------- |
| `public`    | Partout                           | API d’une classe                          |
| `protected` | Dans la classe **et** ses enfants | Facteurs communs à plusieurs sous‑classes |
| `private`   | Dans la classe uniquement         | Données internes sensibles                |

> **Règle d’or :** restreins au maximum ; n’ouvre en `public` que ce qui doit vraiment l’être.

---

## Getters, Setters & Encapsulation

```php
class Animal
{
    private string $espece;

    public function setEspece(string $espece): void
    {
        $valide = ['chat', 'chien', 'lion', 'tigre', 'lapin'];
        if (!in_array(strtolower($espece), $valide, true)) {
            throw new InvalidArgumentException("Espèce inconnue: $espece");
        }
        $this->espece = strtolower($espece);
    }

    public function getEspece(): string
    {
        return ucfirst($this->espece);
    }

    public function __toString(): string
    {
        return "Animal de l'espèce " . $this->getEspece();
    }
}
```

*Pourquoi s’embêter ?*
👉 Valider, formater, tracer les modifications… bref **contrôler** l’état de l’objet.

---

## Méthodes magiques utiles

| Méthode               | Quand est‑elle appelée ?                               |
| --------------------- | ------------------------------------------------------ |
| `__construct()`       | À `new`                                                |
| `__destruct()`        | À la destruction de l’objet                            |
| `__toString()`        | Quand l’objet est converti en chaîne (ex. `echo $obj`) |
| `__get()` / `__set()` | Accès en lecture/écriture sur propriété inaccessible   |

> Utilise‑les avec parcimonie : la magie nuit parfois à la lisibilité.

---

## Héritage & surcharge

```php
class Chien extends Animal
{
    public function aboyer(): string
    {
        return 'Wouf ! 🐶';
    }
}

$rex = new Chien();
$rex->setEspece('chien');

// Méthode héritée
echo $rex->getEspece();
// Méthode spécifique
echo $rex->aboyer();
```

*PHP n’autorise pas l’héritage multiple (`class X extends A, B` ❌)*

### Surcharge de méthode

```php
class Admin extends Utilisateurs
{
    public function direBonjour(): string // ← override
    {
        return "👑 Admin : {$this->nom}";
    }
}
```

---

## Bonnes pratiques modernes

| Astuce                                    | Pourquoi ?                              |
| ----------------------------------------- | --------------------------------------- |
| **PSR‑12**                                | Standardise le style de code.           |
| **Namespaces** (`namespace App\Service;`) | Évite les collisions de noms.           |
| **Autoloading Composer**                  | Charge auto les classes sans `require`. |
| **Type‑hints & `strict_types`**           | Sécurise et documente les fonctions.    |
| **Unit Testing** (PHPUnit)                | Garantie de non‑régression.             |
| **SOLID**                                 | 5 principes pour un design OOP propre.  |

---

## Ressources utiles

* [Manuel PHP – Classes & objets](https://www.php.net/manual/fr/language.oop5.php)
* [PSR‑12 – Extended Coding Style Guide](https://www.php-fig.org/psr/psr-12/)
* *Modern PHP* – O’Reilly Media (livre)

---

> 💡 *Pro tip :* même pour un script unique, penser « objet » facilite la transition quand le projet grossit.
