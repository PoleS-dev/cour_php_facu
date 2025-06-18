# 📬 Guide `$_GET` en PHP Procédural

> `$_GET` permet de **récupérer les données passées dans l’URL**, typiquement dans les liens ou les formulaires de type `method="get"`.

---

## 🔍 Qu’est-ce que `$_GET` ?

| Élément         | Description                                            |
|------------------|--------------------------------------------------------|
| `$_GET`          | Tableau associatif contenant les **paramètres URL**    |
| Source           | Visible dans l’URL (après le `?`)                      |
| Sécurité         | Visible, modifiable par l’utilisateur (⚠️ à valider)  |
| Taille max       | Limitée par le navigateur (~2000 caractères)           |

---

## 🧪 Exemple d’URL avec paramètres

```
https://monsite.com/page.php?id=42&categorie=livres
```

```php
<?php
echo $_GET['id'];        // ↪︎ 42
echo $_GET['categorie']; // ↪︎ livres
?>
```

---

## ✏️ Exemple HTML avec méthode GET

```html
<form method="get" action="resultat.php">
    <input type="text" name="recherche">
    <button type="submit">Chercher</button>
</form>
```

L’URL générée sera du type :

```
resultat.php?recherche=chat
```

---

## 🧰 Bonnes pratiques

```php
<?php
if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']); // Protection XSS
    echo "Vous êtes sur la page : " . $page;
} else {
    echo "Aucune page sélectionnée.";
}
?>
```

| Recommandation             | Pourquoi                                          |
|----------------------------|---------------------------------------------------|
| Vérifier `isset()`         | Évite les erreurs "index non défini"             |
| Utiliser `htmlspecialchars()` | Empêche les injections HTML/JS (XSS)        |
| Ne jamais faire confiance à `$_GET` | L’utilisateur peut modifier l’URL       |

---

## 🎯 Utilisation typique : système de page

```php
<?php
$page = $_GET['page'] ?? 'accueil'; // valeur par défaut

switch ($page) {
    case 'accueil':
        include 'pages/accueil.php';
        break;
    case 'contact':
        include 'pages/contact.php';
        break;
    default:
        echo "Page inconnue.";
}
?>
```

---

## 🚫 Dangers si mal utilisé

```php
// ⚠️ Ne jamais faire ça sans contrôle
include $_GET['template']; // → Peut inclure n'importe quel fichier !!
```

✅ Toujours **valider et filtrer** les entrées avant de les utiliser dans des fonctions critiques (`include`, SQL, fichiers, etc.)

---

## 🧪 Debug rapide

```php
<pre>
<?php print_r($_GET); ?>
</pre>
```

---

## 📎 Résumé

| Élément             | À retenir                               |
|---------------------|------------------------------------------|
| `$_GET['clé']`      | Lire un paramètre transmis par URL       |
| `isset($_GET['clé'])` | Vérifie sa présence                    |
| `htmlspecialchars()` | Sécurise l’affichage                    |
| `method="get"`      | Pour envoyer les données dans l’URL      |

---

> ✅ `$_GET` est idéal pour les **recherches, filtres, pagination, onglets dynamiques**, mais ne doit pas être utilisé pour des données sensibles (préférer `$_POST` ou `$_SESSION`).

