# 🗂️ Guide `$_SESSION` en PHP Procédural

> Les sessions permettent de **mémoriser des données utilisateur** d’une page à l’autre, côté **serveur**.  
> Elles sont **indispensables** pour gérer des connexions, paniers, préférences, etc.

---

## 📦 Qu’est-ce qu’une session PHP ?

| Élément        | Description                                                                 |
|----------------|-----------------------------------------------------------------------------|
| `$_SESSION`    | Superglobale contenant les données de session                              |
| ID de session  | Identifiant unique stocké dans un cookie (`PHPSESSID`)                     |
| Durée de vie   | Dépend de `php.ini` (ou modifiable dynamiquement)                          |
| Emplacement    | Données stockées côté **serveur**, souvent dans un fichier `.tmp`          |

---

## 🧰 1. Démarrer une session

```php
<?php
session_start(); // Toujours AVANT tout HTML
?>
```

- Cette fonction initialise ou reprend une session existante.
- Elle **doit être appelée au tout début**, avant tout `echo`, `var_dump`, etc.

---

## 🧪 2. Écrire et lire des données

```php
// Enregistrement
$_SESSION['prenom'] = 'Alice';
$_SESSION['role'] = 'admin';

// Lecture
echo $_SESSION['prenom']; // ↪︎ Alice
```

---

## 🧹 3. Supprimer une ou toutes les données

```php
// Supprimer une seule valeur
unset($_SESSION['prenom']);

// Supprimer toute la session
session_unset();     // Supprime les variables
session_destroy();   // Détruit la session
```

> ⚠️ Après `session_destroy()`, la session est vidée **mais le cookie de session peut subsister**.

---

## 🧪 Exemple complet de login avec session

```php
<?php
session_start();

if ($_POST['login'] === 'admin' && $_POST['password'] === '1234') {
    $_SESSION['connecté'] = true;
    $_SESSION['nom'] = 'Administrateur';
    header('Location: dashboard.php');
    exit();
}
?>
<form method="post">
    <input name="login">
    <input name="password" type="password">
    <button type="submit">Connexion</button>
</form>
```

---

## 🔒 Bonnes pratiques

| Bonne pratique                     | Pourquoi                                                  |
|------------------------------------|-----------------------------------------------------------|
| `session_start()` tout en haut     | Sinon vous aurez une erreur "headers already sent"       |
| Toujours vérifier l’existence      | `isset($_SESSION['clé'])` avant de lire une valeur        |
| Protéger les accès privés          | Exemple : rediriger si `$_SESSION['connecté']` n’existe pas |
| Ne pas stocker d’informations sensibles | Les sessions sont sécurisées, mais pas cryptées         |
| Nettoyer après déconnexion         | `session_destroy()` + redirection                         |

---

## 🔐 Sécurité des sessions

- Utiliser `session_regenerate_id(true)` après une connexion (évite le vol de session).
- Forcer HTTPS si possible.
- Éviter les ID de session dans les URLs (utiliser les cookies).
- Activer `cookie_httponly` et `cookie_secure` dans `php.ini`.

---

## 🧠 Vérifier la session en debug

```php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
```

---

## 📎 Résumé

| Élément             | À retenir                     |
|---------------------|-------------------------------|
| `session_start()`   | Démarre la session            |
| `$_SESSION['clé']`  | Lire/écrire une donnée        |
| `session_unset()`   | Supprime toutes les valeurs   |
| `session_destroy()` | Détruit complètement la session |

---

> ✅ Les sessions en PHP permettent de gérer les **états utilisateurs** en toute simplicité.  
> Idéal pour créer des **logins**, des **panier e-commerce**, ou **des préférences utilisateur**.

