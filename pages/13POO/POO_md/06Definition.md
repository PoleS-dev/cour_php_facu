# 📘 Glossaire PHP Orienté Objet

Ce fichier résume les concepts clés de la Programmation Orientée Objet (POO) en PHP, avec des exemples pratiques et des définitions claires.

---

## ✅ CLASS

> Une **classe** est un modèle (ou plan) qui définit des **propriétés** (attributs) et des **méthodes** (comportements).  
> Elle sert à **fabriquer des objets**.

```php
class Voiture {
    public $marque;
    public function klaxonner() {
        return "Tuut tuut !";
    }
}
```

---

## ✅ OBJET

> Un **objet** est une **instance concrète** d'une classe.  
> Il est créé à partir d’un modèle de classe avec le mot-clé `new`.

```php
$voiture1 = new Voiture();
```

---

## ✅ CONSTANTE

> Une **constante** est une valeur **immuable** (ne change pas).  
> Dans une classe, on la déclare avec le mot-clé `const`.

```php
class Vehicule {
    public const TYPE = "Véhicule terrestre";
}
```

---

## ✅ HERITAGE

> L’**héritage** permet à une classe de **réutiliser** les propriétés et méthodes d’une autre classe.  
> On évite ainsi la duplication de code.

```php
class Moto extends Vehicule {
    public function rouler() {
        return "La moto roule 🏍️";
    }
}
```

---

## ✅ INSTANCIATION

> L’**instanciation** est le processus de création d’un objet à partir d’une classe.

```php
$moto = new Moto();
```

---

## ✅ METHODE

> Une **méthode** est une fonction déclarée à l’intérieur d’une classe.  
> Elle définit le **comportement** d’un objet.

```php
class Voiture {
    public function demarrer() {
        return "La voiture démarre 🚗";
    }
}
```

---

## ✅ METHODES MAGIQUES

> Les **méthodes magiques** sont des fonctions spéciales en PHP, préfixées par `__`.  
> Elles sont automatiquement appelées par PHP dans certaines situations.

| Méthode       | Description                                  |
|---------------|----------------------------------------------|
| `__construct()` | Appelée à la **création** de l’objet         |
| `__destruct()`  | Appelée à la **destruction** de l’objet      |
| `__get()`       | Lors d’un accès à une propriété inexistante |
| `__set()`       | Lors d’une assignation à une propriété inexistante |
| `__call()`      | Lors d’un appel de méthode inexistante      |
| `__toString()`  | Quand on essaie d’**afficher** un objet     |
| `__clone()`     | Lors du clonage avec `clone`               |
| `__invoke()`    | Quand l’objet est appelé comme une fonction |

---

## ✅ VISIBILITÉ DES PROPRIÉTÉS ET MÉTHODES

### 🔓 public

> **Accessible partout** (dans et hors de la classe)

```php
public $marque;
```

### 🔐 private

> **Accessible uniquement à l’intérieur** de la classe qui la définit

```php
private $moteur;
```

### 🔒 protected

> **Accessible dans la classe** et **ses enfants** (héritage)

```php
protected $vitesse;
```

---

## 🧠 Bonnes pratiques à retenir

- Préférer `private` ou `protected` pour **protéger les données**
- Utiliser des **getters/setters** pour contrôler l'accès
- Tirer parti de l’**héritage** pour structurer le code
- Employer les **méthodes magiques** avec prudence
- Nommer les classes et fichiers selon **PSR-12**
- Utiliser **namespace** et **autoloading** (via Composer) dans des projets réels

---

> ✨ La POO en PHP permet de mieux organiser, structurer et faire évoluer ton code dans des projets de toute taille.
