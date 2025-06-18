# Guide : PHP - Concaténation, Arithmétique, Conditions, Tableaux, Boucles, Fonctions

---

## 🔤 1. Concaténation de chaînes

### Syntaxe de base

```php
$nom = "Fatoumata";
echo "Bonjour " . $nom; // Bonjour Fatoumata
```

### Concaténation avec opérateur `.=` (ajout)

```php
$message = "Bonjour";
$message .= " Mohamed";
echo $message; // Bonjour Mohamed
```

### Différence entre guillemets simples et doubles

```php
$prenom = "Marie";
echo 'Bonjour $prenom'; // Bonjour $prenom
echo "Bonjour $prenom"; // Bonjour Marie
```

---

## ➕ 2. Opérateurs arithmétiques

| Opérateur | Signification        | Exemple |
|----------|----------------------|---------|
| `+`      | Addition              | `2 + 3` |
| `-`      | Soustraction          | `5 - 1` |
| `*`      | Multiplication        | `3 * 4` |
| `/`      | Division              | `10 / 2` |
| `%`      | Modulo (reste)        | `7 % 3` |
| `**`     | Exponentielle (PHP 5.6+) | `2 ** 3` |

### Exemple :

```php
$a = 10;
$b = 3;

echo $a + $b;
echo $a % $b;
```

---

## 🔍 3. Les conditions

### `if`, `else`, `elseif`

```php
$age = 20;

if ($age < 18) {
    echo "Mineur";
} elseif ($age >= 18 && $age < 60) {
    echo "Adulte";
} else {
    echo "Senior";
}
```

### Opérateur ternaire

```php
$age = 16;
$message = ($age >= 18) ? "Adulte" : "Mineur";
```

### `switch`

```php
$jour = "lundi";

switch ($jour) {
    case "lundi":
        echo "Début de semaine";
        break;
    case "vendredi":
        echo "Presque le week-end";
        break;
    default:
        echo "Jour classique";
}
```

---

## 📦 4. Tableaux

### Tableaux indexés

```php
$fruits = ["pomme", "banane", "orange"];
echo $fruits[1]; // banane
```

### Tableaux associatifs

```php
$user = [
    "nom" => "Doe",
    "prenom" => "John"
];

echo $user["prenom"]; // John
```

### Tableaux multidimensionnels

```php
$eleves = [
    ["nom" => "Alice", "age" => 20],
    ["nom" => "Bob", "age" => 22]
];

echo $eleves[1]["nom"]; // Bob
```

### Fonctions utiles

```php
count($array);       // nombre d’éléments
array_keys($array);  // toutes les clés
array_values($array);// toutes les valeurs
in_array("val", $array); // true/false
array_merge($a, $b); // fusionne deux tableaux
```

---

## 🔁 5. Boucles

### `while`

```php
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}
```

### `do...while`

```php
$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 5);
```

### `for`

```php
for ($i = 0; $i < 5; $i++) {
    echo $i;
}
```

### `foreach`

```php
$fruits = ["pomme", "banane", "orange"];
foreach ($fruits as $fruit) {
    echo $fruit;
}

$user = ["nom" => "Doe", "prenom" => "Jane"];
foreach ($user as $cle => $valeur) {
    echo "$cle : $valeur";
}
```

---

## 🧠 6. Fonctions

### Déclaration

```php
function direBonjour($prenom) {
    return "Bonjour " . $prenom;
}

echo direBonjour("Luc"); // Bonjour Luc
```

### Valeur par défaut

```php
function saluer($nom = "visiteur") {
    echo "Bonjour $nom";
}
```

### Passage par valeur vs par référence

```php
function incremente($nombre) {
    $nombre++;
}

function incrementeRef(&$nombre) {
    $nombre++;
}
```

### Fonctions anonymes

```php
$square = function($n) {
    return $n * $n;
};

echo $square(4); // 16
```

### Fonctions fléchées (PHP 7.4+)

```php
$multiplier = fn($x) => $x * 10;
echo $multiplier(5); // 50
```

---

## ✅ Résumé

| Élément        | Exemple                     |
|----------------|-----------------------------|
| Concaténation  | `"Bonjour " . $nom`         |
| Arithmétique   | `$a + $b`                   |
| Condition      | `if`, `else`, `switch`      |
| Tableaux       | `[]`, `["clé" => "valeur"]` |
| Boucles        | `for`, `while`, `foreach`   |
| Fonctions      | `function nom()`            |

---

> Ce guide est une base complète pour manipuler les fondamentaux de PHP. Combine-les pour construire des pages dynamiques puissantes !
