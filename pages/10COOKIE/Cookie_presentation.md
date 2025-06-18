# 🍪 Guide des Cookies en PHP **Procédural**

> *Dernière mise à jour : 2025‑06‑18*

Ce document explique **ce qu’est un cookie HTTP**, comment le **créer, lire, modifier et supprimer** en **PHP procédural**, et donne les **bonnes pratiques** de sécurité.

---

## 1. Qu’est‑ce qu’un cookie ?

| Terme          | Définition                                                                                   |
|----------------|----------------------------------------------------------------------------------------------|
| **Cookie**     | Petit fichier texte sauvegardé par le navigateur et **renvoyé à chaque requête** vers le même domaine. |
| **But**        | Stocker de l’info *côté client* : session, langue, panier, tracking, préférences…            |
| **Limites**    | 4 Ko max par cookie, ~50 cookies par domaine, accessible en clair (non chiffré).             |

### Anatomie d’un cookie HTTP

```
Set-Cookie: nom=valeur; Expires=Wed, 17 Jul 2025 07:28:00 GMT; Path=/; Secure; HttpOnly; SameSite=Lax
```

| Attribut   | Rôle                                                         |
|------------|-------------------------------------------------------------|
| `Expires` / `Max-Age` | Date ou durée d’expiration                        |
| `Path`     | Chemin concerné (défaut `/`)                                |
| `Domain`   | Sous‑domaine concerné                                       |
| `Secure`   | Envoi **uniquement** via HTTPS                              |
| `HttpOnly` | Inaccessible au JavaScript (mitige XSS)                     |
| `SameSite` | Contrôle l’envoi en cross‑site (`Strict`, `Lax`, `None`)    |

---

## 2. Créer un cookie en PHP

```php
<?php
// Syntaxe : setcookie(nom, valeur, expiration, chemin, domaine, secure, httponly, samesite)
setcookie(
    'lang',          // nom
    'fr',            // valeur
    time() + 3600,   // expire dans 1 h
    '/',             // path
    '',              // domain (courant)
    true,            // secure  (HTTPS)
    true             // httponly
    // Depuis PHP 7.3 : ['samesite' => 'Lax']
);
?>
```

> ⚠️ `setcookie()` **doit être appelé avant tout HTML** (aucun `echo`/espace).

---

## 3. Lire un cookie

```php
<?php
if (isset($_COOKIE['lang'])) {
    echo "Langue : " . htmlspecialchars($_COOKIE['lang']);
}
?>
```

- Tous les cookies reçus se trouvent dans le tableau **super‑global** `$_COOKIE`.

---

## 4. Modifier un cookie

Modifier = ré‑émettre `setcookie()` avec **le même nom** et de nouveaux paramètres.

```php
setcookie('lang', 'en', time() + 3600, '/');
```

---

## 5. Supprimer un cookie

```php
setcookie('lang', '', time() - 3600, '/');   // date passée → suppression
```

---

## 6. Exemple complet (procédural)

```php
<?php
// 1. Accepte la langue via formulaire
if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];
    // 30 jours – Secure + HttpOnly
    setcookie('lang', $lang, time() + 60*60*24*30, '/', '', true, true);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Choix langue</title></head>
<body>
<form method="post">
    <select name="lang">
        <option value="fr">Français</option>
        <option value="en">English</option>
    </select>
    <button type="submit">Enregistrer</button>
</form>

<?php if (isset($_COOKIE['lang'])): ?>
    <p>Langue actuelle : <?= htmlspecialchars($_COOKIE['lang']) ?></p>
<?php endif; ?>
</body>
</html>
```

---

## 7. Bonnes pratiques de sécurité

| Recommandation        | Pourquoi ?                                      |
|-----------------------|-------------------------------------------------|
| `Secure` + HTTPS      | Empêche l’interception en clair                 |
| `HttpOnly`            | Bloque l’accès JS (XSS)                         |
| `SameSite=Lax/Strict` | Réduit les risques CSRF                         |
| Chiffrer la valeur    | Protège le contenu (ex : JWT, AES)              |
| Stocker peu de données| 4 Ko max, éviter les infos sensibles            |

---

## 8. Cookies & RGPD

- Informer l’utilisateur (bannière, modal).
- Obtenir son **consentement explicite** pour le tracking.
- Offrir un moyen de **retirer** son consentement (suppression cookies).

---

## 9. Aide‑mémoire `setcookie()` (PHP 8.1+)

```php
setcookie(
  name:      'token',
  value:     'abc123',
  expires_or_options: [
      'expires'  => time() + 3600,
      'path'     => '/',
      'secure'   => true,
      'httponly' => true,
      'samesite' => 'Strict'
  ]
);
```

---

> ✨ **En résumé :** Les cookies permettent de mémoriser des informations côté client.  
> En PHP procédural : `setcookie()` pour créer/modifier/supprimer et `$_COOKIE` pour lire.  
> N’oublie jamais les attributs de sécurité (`Secure`, `HttpOnly`, `SameSite`) et les obligations RGPD.
