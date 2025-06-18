# 🧬 Cours sur l’Héritage des Classes en PHP

## 📌 Définition

L’**héritage** permet à une classe (dite *enfant*) d’hériter des **propriétés** et des **méthodes** d’une autre classe (dite *parent*).  
Cela favorise la **réutilisation du code** et sa **structuration**.

---

## 🐾 Exemple simple d’héritage

```php
class Animal {
    public function respirer() : void {
        echo "je respire dans l'air <br>";
    }
}

class Chien extends Animal {
    public function aboyer() : void {
        echo "ouaf ouaf <br>";
    }
}

class Chat extends Animal {
    public function miauler() : void {
        echo "miaou <br>";
    }
}

$chien1 = new Chien();
$chien1->respirer();
$chien1->aboyer();
```

---

## 🔁 Redéfinir une méthode (Override)

### Cas 1 : Écraser complètement la méthode parent

```php
class Poisson extends Animal {
    public function respirer() : void {
        echo "je respire dans l'eau <br>";
    }
}
```

### Cas 2 : Conserver la méthode parent et l’enrichir

```php
class Reptil extends Animal {
    public function respirer() : void {
        parent::respirer(); // appel au parent
        echo " et dans l'eau !<br>";
    }
}

$reptil1 = new Reptil();
$reptil1->respirer();
```

---

## 🚗 Héritage avec attributs `private`, `protected`, `public`

```php
class Vehicule {
    public string $marque = "sans nom";
    protected int $vitesse = 0;
    private string $moteur = "sans moteur";

    public function getMoteur(): string {
        return $this->moteur;
    }

    public function setMoteur(string $moteur): string {
        return $this->moteur = $moteur;
    }

    public function accelerer(): void {
        $this->vitesse += 10;
        echo "Vitesse actuelle : {$this->vitesse} km/h<br>";
    }
}

class Voiture extends Vehicule {
    public function turbo(): void {
        $this->vitesse += 50;
        echo "Vitesse actuelle apres turbo : {$this->vitesse} km/h<br>";
    }

    public function creerMoteur(string $moteur) {
        return $this->setMoteur($moteur);
    }

    public function afficherMoteur(): void {
        echo "moteur : {$this->getMoteur()}<br>";
    }
}
```

---

## 🧱 Classe Abstraite

> Une **classe abstraite** ne peut pas être instanciée.  
> Elle **sert de modèle** à d'autres classes et peut contenir :
> - des méthodes normales
> - des méthodes abstraites (sans corps, à implémenter)

```php
abstract class Animals {
    protected string $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    abstract public function crier();

    public function sePresenter() {
        echo "Je suis un animal nommé $this->nom<br>";
    }
}

class Chiens extends Animals {
    public function crier() {
        echo "Ouaf Ouaf 🐶<br>";
    }
}

$rex = new Chiens("Rex");
$rex->sePresenter();
$rex->crier();
```

---

## 🛡️ Utilisation de `final`

> `final` empêche :
> - qu'une **classe** soit héritée
> - qu'une **méthode** soit redéfinie

```php
class Employe {
    protected string $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    final public function travailler() {
        echo "$this->nom travaille sérieusement.<br>";
    }
}

class Manager extends Employe {
    // ❌ ERREUR : impossible de redéfinir une méthode final
    // public function travailler() { ... }

    public function diriger() {
        echo "$this->nom dirige une équipe.<br>";
    }
}

$m = new Manager("Sophie");
$m->travailler();
$m->diriger();
```

---

## 🧩 Trait

> Un **trait** est un bloc de code réutilisable dans plusieurs classes.  
> Il permet d’éviter la duplication sans avoir recours à l’héritage.

```php
trait Logger {
    public function log($message) {
        echo "[LOG] " . $message;
    }
}

class Utilisateur {
    use Logger;
}

$u = new Utilisateur();
$u->log("Utilisateur connecté.");  // Affiche : [LOG] Utilisateur connecté.
```

---

## 🧠 Résumé des concepts

| Concept       | Description                                      |
|---------------|--------------------------------------------------|
| `extends`     | Pour hériter d’une classe                        |
| `parent::`    | Pour appeler une méthode du parent               |
| `abstract`    | Classe ou méthode à compléter obligatoirement    |
| `final`       | Empêche la redéfinition ou l’héritage            |
| `trait`       | Bloc de code réutilisable sans héritage          |
| `private`     | Visible uniquement dans la classe                |
| `protected`   | Visible dans la classe et ses enfants            |
| `public`      | Visible partout                                  |

---

> ✨ L'héritage est une pierre angulaire de la POO : il améliore la **réutilisation**, la **modularité** et la **maintenabilité** du code.
