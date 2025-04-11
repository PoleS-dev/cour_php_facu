-- --------------------------------------------------------
-- 🎓 COURS COMPLET : Création d’une Base de Données avec SQL
-- --------------------------------------------------------

-- 🔹 1. Qu’est-ce qu’une base de données SQL ?
-- Une base relationnelle est un ensemble de tables liées entre elles par des relations (clés primaires / étrangères).
-- Elle permet de stocker, organiser et interroger des données efficacement.

-- ✅ 2. Étapes pour créer une base de données

-- a. Création de la base
CREATE DATABASE entreprise
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- 📚 1. CREATE DATABASE entreprise
-- Crée une nouvelle base de données nommée entreprise.

-- ✔️ Remarque :

-- Si une base avec ce nom existe déjà, la commande va échouer (à moins d'ajouter IF NOT EXISTS).

-- entreprise est le nom que tu choisis (tu peux l'appeler gestion_rh, app_comptable, etc.)

-- 🌐 2. CHARACTER SET utf8mb4
-- Définit le jeu de caractères par défaut utilisé dans la base.

-- ❓ C’est quoi un jeu de caractères ?
-- C’est la manière dont les caractères (lettres, symboles, emojis, etc.) sont codés en binaire.

-- Pourquoi utf8mb4 ?
-- utf8mb4 est la version complète et sécurisée de utf8

-- Elle gère tous les caractères Unicode, y compris :

-- les émoticônes / emojis 😎🎉

-- les caractères de langues asiatiques, arabes, etc.

-- les symboles rares

-- 🔒 Recommandé pour toutes les nouvelles bases (au lieu de l'ancien latin1 ou utf8 limité)

-- 🧬 3. COLLATE utf8mb4_unicode_ci
-- Définit le tri et la comparaison de texte dans la base.

-- ❓ C’est quoi une collation ?
-- C’est la règle de tri des chaînes de caractères.

-- utf8mb4_unicode_ci signifie :

-- utf8mb4 : utilise le jeu de caractères complet Unicode

-- unicode : applique les règles de tri Unicode standards

-- ci : case-insensitive → ne fait pas de différence entre majuscule et minuscule

-- b. Sélection de la base
USE entreprise;

-- 🧱 3. Création des tables

CREATE TABLE employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50),
    salaire DECIMAL(10,2)
);

-- 🔍 4. Types de données les plus utilisés

-- INT           : Entier
-- VARCHAR(N)    : Chaîne de caractères (taille N)
-- TEXT          : Long texte
-- DATE          : Date (YYYY-MM-DD)
-- DATETIME      : Date + heure
-- DECIMAL(x,y)  : Nombre décimal (précis pour l’argent)
-- ENUM(...)     : Valeur fixe parmi une liste
-- BOOLEAN       : Vrai ou Faux (TINYINT(1))

-- 🔐 5. Contraintes importantes

-- PRIMARY KEY     : Identifie de façon unique une ligne
-- NOT NULL        : Valeur obligatoire
-- UNIQUE          : Valeurs uniques
-- AUTO_INCREMENT  : Incrémentation automatique
-- DEFAULT         : Valeur par défaut
-- FOREIGN KEY     : Clé étrangère (relation entre tables)

-- 🔗 6. Clés étrangères

CREATE TABLE commandes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    FOREIGN KEY (id_client) REFERENCES clients(id)
    ON DELETE CASCADE
);

-- 🗃️ 7. Organisation du fichier .sql

-- 1. Créer la base
-- 2. Utiliser la base (USE)
-- 3. Créer les tables
-- 4. Ajouter les contraintes
-- 5. Insérer les données

-- 🚫 8. Erreurs fréquentes

-- ❌ Oublier le point-virgule ;
-- ❌ Utiliser un mot réservé (ex: order)
--    ✅ Solution : utiliser des backticks -> `order`
-- ❌ Ne pas mettre d’encodage UTF-8
-- ❌ Trop de données dans une seule table
-- ❌ Ne pas utiliser de clé primaire

-- 💎 9. Bonnes pratiques

-- ✅ snake_case pour les noms : nom_utilisateur
-- ✅ Clé primaire numérique AUTO_INCREMENT
-- ✅ Table séparée pour chaque entité (normalisation)
-- ✅ Toujours commenter le script
-- ✅ Utiliser DECIMAL pour les montants

-- 🧪 10. Insertion de données

INSERT INTO employes (nom, prenom, salaire)
VALUES ('Durand', 'Alice', 2500.00);

-- Insertion en lot
INSERT INTO services (nom_service)
VALUES ('RH'), ('IT'), ('Comptabilité');

-- 🛠️ Outils conseillés

-- phpMyAdmin, Adminer ou ligne de commande :
-- mysql -u root -p < cours_creation_bdd.sql

-- 🔚 Conclusion

-- Structurer proprement les données
-- Utiliser les bons types et contraintes
-- Protéger l’intégrité avec des clés
-- Ecrire du SQL clair, commenté et maintenable

-- Bon apprentissage ! 😄
