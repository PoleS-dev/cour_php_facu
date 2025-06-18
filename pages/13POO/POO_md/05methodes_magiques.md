# ✨ Cours Complet : Les Méthodes Magiques en PHP

> Les **méthodes magiques** sont des fonctions spéciales de PHP orienté objet, appelées automatiquement dans certains contextes spécifiques.  
> Elles sont toujours préfixées et suffixées de deux underscores `__`.

---

## 🔍 Définition

- Commencent par `__` (ex: `__construct`)
- Déclenchées automatiquement par PHP selon les actions réalisées sur l’objet
- Permettent d’ajouter des comportements avancés dynamiquement

---

## 📖 Liste complète avec explication

### 1. `__construct()`
Appelée **automatiquement** à la création d’un objet.

```php
public function __construct() {
    echo "Objet instancié";
}
```

---

### 2. `__destruct()`
Appelée **à la destruction de l’objet**, généralement à la fin du script.

---

### 3. `__get($propriete)`
Appelée quand on **lit une propriété inaccessible ou inexistante**.

---

### 4. `__set($propriete, $valeur)`
Appelée quand on **assigne une valeur à une propriété inaccessible/inexistante**.

---

### 5. `__isset($propriete)`
Déclenchée lorsqu’on utilise `isset()` ou `empty()` sur une propriété inaccessible.

---

### 6. `__unset($propriete)`
Déclenchée lors d’un `unset()` sur une propriété inaccessible.

---

### 7. `__call($nom, $arguments)`
Appelée quand on invoque une **méthode inexistante** sur un objet.

---

### 8. `__callStatic($nom, $arguments)`
Appelée lors d’un appel **statique** vers une méthode inexistante.

---

### 9. `__toString()`
Déclenchée quand on essaie **d'afficher un objet comme une chaîne de caractères** (via `echo`, `print`, etc.)

---

### 10. `__invoke($argument)`
Permet de **faire appel à un objet comme une fonction**.

---

### 11. `__clone()`
Appelée lorsqu’on **clone un objet** avec `clone`.

---

## ✅ Exemple Complet

```php
$obj = new Magie();               // __construct
echo $obj->inexistant;           // __get
$obj->secret = "valeur";         // __set
isset($obj->cache);              // __isset
unset($obj->cache);              // __unset
$obj->action("param");           // __call
Magie::statique("hello");        // __callStatic
echo $obj;                       // __toString
$obj("appel");                   // __invoke
$copie = clone $obj;             // __clone
```

---

## 🧠 Pourquoi utiliser les méthodes magiques ?

- Créer des **objets dynamiques** comme des proxys ou wrappers
- Gérer proprement l’**accès indirect** aux propriétés (ORM, DTO…)
- Simuler des comportements avancés (par exemple `__invoke` pour faire un objet-fonction)
- **Intercepter** des actions et ajouter de la logique personnalisée

---

## ⚠️ Bonnes pratiques

| Astuce                         | Pourquoi                       |
|-------------------------------|--------------------------------|
| Ne pas abuser des magies      | Cache la logique, rend le code difficile à lire |
| Préférer `__get/__set` avec parcimonie | Sinon, trop d’opacité        |
| Documenter les comportements  | Pour éviter les effets surprises |
| Toujours prévoir une version de secours dans `__call()` | Pour la robustesse |

---

> 🧙‍♂️ **Rappel** : Les méthodes magiques sont puissantes, mais doivent rester **lisibles**, **prévisibles** et **maîtrisées**.

