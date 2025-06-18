# 🔌 Guide PDO en PHP Procédural

> PDO (PHP Data Objects) est une **interface orientée objet** pour accéder aux bases de données en PHP, mais elle peut parfaitement s'utiliser dans des scripts **procéduraux**.

---

## 🎯 Pourquoi utiliser PDO ?

| Avantage             | Description                                               |
|----------------------|-----------------------------------------------------------|
| Sécurisé             | Requêtes préparées → prévention des injections SQL        |
| Compatible           | Fonctionne avec MySQL, PostgreSQL, SQLite, etc.           |
| Structuré            | Une interface uniforme quelle que soit la base utilisée   |
| Gestion des erreurs  | Mode exception très lisible                               |

---

## 🧱 Étapes d’utilisation (en procédural)

1. Connexion avec `new PDO()`
2. Préparation avec `prepare()`
3. Exécution avec `execute()`
4. Récupération des données (`fetch()` / `fetchAll()`)

---

## 🔐 1. Connexion à la base

```php
<?php
$host = 'localhost';
$db   = 'ma_base';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options recommandées
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Résultats sous forme associative
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Requêtes préparées réelles
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connexion réussie ✅";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
```

---

## 📥 2. INSERT : Ajouter une donnée

```php
$sql = "INSERT INTO utilisateurs (nom, email) VALUES (:nom, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nom'   => 'Alice',
    'email' => 'alice@example.com'
]);
```

---

## 🔍 3. SELECT : Lire des données

```php
$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => 'alice@example.com']);
$user = $stmt->fetch();

if ($user) {
    echo "Nom : " . $user['nom'];
} else {
    echo "Utilisateur introuvable.";
}
```

---

## 🛠️ 4. UPDATE / DELETE

```php
// UPDATE
$pdo->prepare("UPDATE utilisateurs SET nom = :nom WHERE id = :id")
    ->execute(['nom' => 'Bob', 'id' => 1]);

// DELETE
$pdo->prepare("DELETE FROM utilisateurs WHERE id = :id")
    ->execute(['id' => 1]);
```

---

## 🧠 Bonnes pratiques

| Conseil                            | Pourquoi                                              |
|-----------------------------------|-------------------------------------------------------|
| Toujours utiliser `prepare()`     | Évite les injections SQL                              |
| Utiliser `try/catch`              | Permet de gérer les erreurs proprement                |
| Centraliser la connexion          | Dans un `pdo.php` ou `db.php` à inclure (`require`)   |
| Ne jamais afficher d’erreurs SQL  | En production, logguer au lieu d’afficher             |
| Utiliser `fetchAll()` pour listes | `fetch()` → 1 ligne ; `fetchAll()` → tableau complet  |

---

## 🧪 Exemple complet

```php
<?php
require 'pdo.php'; // contient la connexion

$stmt = $pdo->prepare("SELECT * FROM produits");
$stmt->execute();
$produits = $stmt->fetchAll();

foreach ($produits as $p) {
    echo $p['nom'] . " - " . $p['prix'] . " €<br>";
}
?>
```

---

## ❓ PDO vs MySQLi

| Critère         | PDO                     | MySQLi             |
|------------------|--------------------------|---------------------|
| Multi SGBD       | ✅ Oui (MySQL, SQLite…)  | ❌ Non (MySQL only) |
| OOP              | ✅ Complet                | ✅ (limité)         |
| Sécurité         | ✅ Requêtes préparées     | ✅ aussi             |
| Simplicité       | ✅ Épuré                 | ✅                  |

---

> 🧩 PDO est **moderne, sécurisé et réutilisable**. Même en code procédural, tu peux l’utiliser efficacement sans changer de paradigme.
