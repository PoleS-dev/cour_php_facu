# 🧭 Comprendre le Modèle MVC (Model-View-Controller)

Le **pattern MVC** est une architecture logicielle largement utilisée pour séparer les responsabilités d’une application.

---

## 🧱 1. Qu'est-ce que MVC ?

| Composant  | Rôle principal                                 |
|------------|-------------------------------------------------|
| **Model**  | Gère les **données** et la logique métier       |
| **View**   | Affiche l’**interface utilisateur**             |
| **Controller** | Fait le lien entre **Model** et **View** |

---

## 🧠 2. Pourquoi utiliser MVC ?

✅ Mieux organiser le code  
✅ Faciliter les tests et la maintenance  
✅ Séparer l’affichage de la logique métier  
✅ Réutilisation et évolutivité accrues

---

## 🔍 3. Le rôle de chaque composant

### 📦 Model (Modèle)

- Gère les **données** (base de données, fichiers, logique métier)
- Ne connaît ni les vues ni les contrôleurs

```php
// Exemple en PHP
class Article {
    public function getAll() {
        return Database::query("SELECT * FROM articles");
    }
}
```

---

### 🖼 View (Vue)

- Gère uniquement l’**affichage**
- Reçoit les données du contrôleur
- Ne fait pas de logique métier

```html
<!-- Exemple en HTML/PHP -->
<h1>Liste des articles</h1>
<ul>
<?php foreach ($articles as $article): ?>
  <li><?= $article['titre'] ?></li>
<?php endforeach; ?>
</ul>
```

---

### 🎮 Controller (Contrôleur)

- Reçoit les requêtes de l’utilisateur
- Appelle le modèle pour récupérer les données
- Envoie les données à la vue

```php
class ArticleController {
    public function index() {
        $model = new Article();
        $articles = $model->getAll();
        require 'views/articles/index.php';
    }
}
```

---

## 🧭 4. Exemple de cycle MVC

```
Utilisateur → Controller → Model → Controller → View → Navigateur
```

---

## 📁 5. Structure typique d’un projet MVC

```
/mon-app/
├── index.php            # point d'entrée
├── /controllers/        # contient les contrôleurs
├── /models/             # contient les modèles
├── /views/              # contient les vues HTML
├── /core/               # cœur du framework (router, base de données, etc.)
```

---

## ⚙️ 6. Exemple simple (MVC PHP sans framework)

### index.php

```php
require 'controllers/ArticleController.php';
$controller = new ArticleController();
$controller->index();
```

---

## 🚀 7. Avantages de MVC

- Séparation des responsabilités
- Plus de clarté et de modularité
- Facilite le travail en équipe (développeurs frontend/backend)
- Testabilité améliorée

---

## ⚠️ 8. Inconvénients possibles

- Complexité initiale pour les débutants
- Surcharge pour des projets très simples
- Nécessite de suivre une bonne convention de nommage et structure

---

## 🧰 9. Frameworks utilisant MVC

| Langage | Frameworks |
|--------|------------|
| PHP    | Laravel, Symfony, CodeIgniter |
| JS     | Angular, Backbone |
| Python | Django, Flask (partiellement) |
| Ruby   | Ruby on Rails |
| Java   | Spring MVC |

---

## ✅ 10. En résumé

| Élément      | Rôle principal                          |
|--------------|------------------------------------------|
| **Model**    | Gère les données, logique métier         |
| **View**     | Affiche les données à l'utilisateur      |
| **Controller** | Réceptionne la requête, appelle le modèle, affiche la vue |

---

> 🧠 Le pattern MVC est un **standard incontournable** dans le développement web. Il rend les applications **plus robustes, plus lisibles et plus faciles à maintenir.**
