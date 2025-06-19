# ⚙️ Comprendre `.htaccess` et le routage PHP

Dans une application PHP sans framework, la gestion des **URLs propres** et du **routage** peut être faite manuellement à l’aide de `.htaccess` et d’un fichier `router.php` ou `index.php`.

---

## 📁 Structure de base

```
/mon-site/
├── .htaccess
├── index.php
├── /pages/
│   ├── accueil.php
│   ├── contact.php
```

---

## 🧩 1. Le fichier `.htaccess`

Permet de rediriger toutes les requêtes vers `index.php` pour qu’il fasse le routage.

```apache
# 🔄 Redirige toutes les requêtes vers index.php sauf si fichier ou dossier existe
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php [QSA,L]
```

### 📌 Explication :

- `RewriteEngine On` : active la réécriture
- `RewriteCond %{REQUEST_FILENAME} !-f` : si ce n'est pas un fichier existant
- `RewriteCond %{REQUEST_FILENAME} !-d` : si ce n'est pas un dossier existant
- `RewriteRule ^(.*)$ index.php [QSA,L]` : redirige tout vers index.php

---

## 🧭 2. Le routeur dans `index.php`

```php
<?php
// Récupérer l'URL demandée
$url = $_GET['url'] ?? 'accueil';

// Sécuriser et supprimer les extensions inutiles
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);

// Définir le chemin du fichier cible
$page = 'pages/' . $url . '.php';

if (file_exists($page)) {
    require $page;
} else {
    http_response_code(404);
    echo "Page non trouvée.";
}
```

---

## 🧱 3. Exemple : pages/contact.php

```php
<h1>Page Contact</h1>
<p>Contactez-nous via ce formulaire...</p>
```

Accessible via `http://localhost/contact`

---

## 🔐 4. Sécurité : empêcher l’accès direct aux fichiers

Ajoutez dans `.htaccess` :

```apache
<FilesMatch "\.php$">
    Order deny,allow
    Deny from all
</FilesMatch>
```

Et autorisez uniquement `index.php` :

```apache
<Files "index.php">
    Order allow,deny
    Allow from all
</Files>
```

---

## 🚀 5. Aller plus loin : Router orienté objet

Vous pouvez créer un `Router.php` orienté objet :

```php
class Router {
    public function route(string $url) {
        switch ($url) {
            case '':
            case 'accueil':
                require 'pages/accueil.php';
                break;
            case 'contact':
                require 'pages/contact.php';
                break;
            default:
                http_response_code(404);
                echo "Page introuvable.";
        }
    }
}

// Usage
$router = new Router();
$router->route($_GET['url'] ?? '');
```

---

## ✅ En résumé

- `.htaccess` permet de rediriger toutes les requêtes vers un point d’entrée (ex: index.php)
- Le routage permet d’afficher différentes pages selon l’URL
- Ce système fonctionne **sans framework** mais demande une bonne structure
- On peut évoluer vers une logique **orientée objet** pour plus de maintenabilité

---

> 🔐 N'oubliez jamais de sécuriser vos entrées, surtout si vous utilisez l’URL pour inclure des fichiers !
