# 🚀 Présentation complète de Symfony & Symfony CLI

Symfony est un **framework PHP** robuste et modulaire pour construire des applications web évolutives et performantes.

---

## 🧠 1. Qu'est-ce que Symfony ?

Symfony est un **framework PHP open-source** maintenu par SensioLabs. Il est basé sur le pattern **MVC** (Model-View-Controller) et respecte les standards du PHP (PSR).

### 🎯 Objectifs de Symfony :
- Réutilisabilité de code
- Performance
- Tests automatisés
- Séparation des responsabilités
- Maintenabilité

---

## 🔧 2. Structure d'un projet Symfony

```
mon_projet/
├── bin/
├── config/
├── public/         # Point d'entrée (index.php)
├── src/            # Code métier (Controller, Entity, ...)
├── templates/      # Vues (Twig)
├── translations/
├── var/            # Fichiers temporaires
├── vendor/         # Dépendances Composer
└── .env            # Variables d'environnement
```

---

## ⚙️ 3. Symfony CLI

Symfony CLI est un outil en ligne de commande puissant permettant de :

✅ Créer des projets Symfony  
✅ Démarrer un serveur local  
✅ Gérer les environnements `.env`  
✅ Vérifier la configuration du projet  
✅ Déployer

### 📦 Installation :
```bash
curl -sS https://get.symfony.com/cli/installer | bash
```

Ajoute ensuite le binaire dans ton PATH (`~/.symfony/bin` ou `/usr/local/bin`).

---

## 📁 4. Créer un projet avec Symfony CLI

```bash
symfony new nom_du_projet --webapp
```

Options :
- `--webapp` : installe les composants essentiels (Twig, Doctrine, Security, etc.)
- `--full` : version complète avec tous les bundles utiles
- `--api` : projet orienté API

---

## 🚀 5. Démarrer un serveur local

```bash
cd nom_du_projet
symfony server:start
```

Accès via `https://localhost:8000`

---

## 🧰 6. Utilisation des commandes de base

```bash
php bin/console list                # Liste toutes les commandes
php bin/console make:controller    # Crée un contrôleur
php bin/console make:entity        # Crée une entité Doctrine
php bin/console doctrine:schema:update --force  # Met à jour la base
php bin/console make:migration     # Crée une migration
```

---

## 🛠 7. Environnements de développement

Symfony utilise `.env` pour gérer les variables :
```env
APP_ENV=dev
APP_SECRET=...
DATABASE_URL="mysql://user:pass@127.0.0.1:3306/db"
```

Symfony CLI permet de les surcharger :
```bash
symfony var:export --multiline
```

---

## 🏗 8. Différentes façons d'utiliser Symfony

### A. Application Web classique
- Architecture MVC
- Twig pour le templating
- Routing YAML ou annotations

### B. API REST ou JSON
- Utilisation de `API Platform` ou `JsonResponse`
- Idéal pour du back-end pur

### C. Microservice
- Utilisation minimale de composants Symfony
- Routing, HTTPKernel, EventDispatcher

### D. Console app
- Utilisation uniquement des composants Console, Filesystem...

---

## 🔌 9. Écosystème Symfony

- **Flex** : installe automatiquement les bundles utiles
- **MakerBundle** : pour générer des classes rapidement
- **Twig** : moteur de template
- **Doctrine** : ORM SQL
- **API Platform** : framework API REST + GraphQL
- **Encore** : gestion des assets JS/CSS (Webpack)

---

## 🔒 10. Sécurité

Symfony possède un système de sécurité robuste :

- Authentification par formulaire, HTTP, JWT...
- Gestion des rôles (`ROLE_ADMIN`, `ROLE_USER`)
- Encodage des mots de passe
- Guards ou Authenticator

---

## ✅ Conclusion

Symfony est un **framework complet**, adapté aussi bien :
- aux projets **complexes** d’entreprise,
- aux **API modernes**,
- aux **sites web performants**.

Avec **Symfony CLI**, l’environnement est plus simple, plus rapide à gérer.

---

> 🔍 **Symfony** est un choix de référence pour les développeurs PHP qui souhaitent structure, maintenabilité et performance dans leurs projets web.

