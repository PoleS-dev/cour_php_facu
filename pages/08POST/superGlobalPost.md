# 📤 Guide `$_POST` en PHP Procédural

> `$_POST` est utilisé pour **récupérer les données envoyées via un formulaire** HTML en méthode `POST`.  
> Ces données **ne sont pas visibles dans l’URL**, contrairement à `$_GET`.

---

## 🔍 Qu’est-ce que `$_POST` ?

| Élément        | Description                                               |
|----------------|-----------------------------------------------------------|
| `$_POST`       | Tableau associatif contenant les données envoyées par `POST` |
| Source         | Formulaires HTML (méthode `post`)                        |
| Sécurité       | Non visible dans l’URL, mais **à valider côté serveur**  |
| Taille max     | Dépend de `post_max_size` dans `php.ini`                 |

---

## ✏️ Exemple de formulaire en POST

```html
<form method="post" action="traitement.php">
    <input type="text" name="nom">
    <input type="email" name="email">
    <button type="submit" name="envoyer">Envoyer</button>
</form>
```

---

## 📥 Récupération côté PHP

```php
<?php
if (isset($_POST['envoyer'])) {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');

    echo "Bonjour " . htmlspecialchars($nom) . ", votre email est : " . htmlspecialchars($email);
}
?>
```

---

## 🧰 Bonnes pratiques

| Recommandation                  | Pourquoi                                         |
|---------------------------------|--------------------------------------------------|
| Utiliser `isset()`              | Évite les erreurs sur index non défini           |
| Nettoyer les données            | `trim()`, `htmlspecialchars()` pour XSS         |
| Toujours valider                | Ne jamais faire confiance aux données reçues     |
| Vérifier le format              | Avec `filter_var()`, regex, etc.                 |
| Ne pas dépendre uniquement du `name` | Il peut être modifié côté client            |

---

## 🧪 Exemple complet : formulaire d’inscription

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $age = intval($_POST['age'] ?? 0);

    if ($nom && $age > 0) {
        echo "Bienvenue $nom, vous avez $age ans.";
    } else {
        echo "Formulaire incomplet ou invalide.";
    }
}
?>
<form method="post">
    <input name="nom" placeholder="Votre nom">
    <input name="age" type="number" placeholder="Votre âge">
    <button type="submit">Envoyer</button>
</form>
```

---

## 🛑 Dangers potentiels

- XSS : si tu affiches directement des valeurs de `$_POST` sans filtrage
- Spam / Bots : les formulaires sont souvent attaqués (penser à un captcha ou `honeypot`)
- Injections (mail, fichiers, SQL...) : toujours valider les formats

---

## 🧪 Pour le debug

```php
<pre>
<?php print_r($_POST); ?>
</pre>
```

---

## 📎 Résumé

| Élément             | À retenir                             |
|---------------------|----------------------------------------|
| `$_POST['clé']`     | Lire un champ d’un formulaire POST     |
| `isset($_POST['clé'])` | Vérifie si la valeur a été envoyée |
| `htmlspecialchars()` | Sécurise l’affichage                  |
| `$_SERVER['REQUEST_METHOD'] === 'POST'` | Vérifie le type de requête |

---

> ✅ `$_POST` est idéal pour **les formulaires sensibles** (login, mots de passe, envois de données).  
> Utilisé avec soin, il est un pilier des applications web en PHP.

