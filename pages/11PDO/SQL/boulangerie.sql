


-- 📦 Table des utilisateurs
CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY, -- identifiant unique auto-incrémenté
    nom VARCHAR(100) NOT NULL,         -- nom de l'utilisateur (obligatoire)
    prenom VARCHAR(100) NOT NULL,      -- prénom de l'utilisateur (obligatoire)
    mot_de_passe VARCHAR(255) NOT NULL,-- mot de passe hashé (obligatoire)
    is_admin TINYINT(1) NOT NULL DEFAULT 0 -- 0 = simple utilisateur, 1 = administrateur
);

--  Table des catégories de produits
CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY, -- identifiant unique auto-incrémenté
    nom VARCHAR(100) NOT NULL          -- nom de la catégorie (ex: Informatique, Vêtements...)
);

-- Table des produits
CREATE TABLE produit (
    id INT AUTO_INCREMENT PRIMARY KEY, -- identifiant unique auto-incrémenté
    nom VARCHAR(100) NOT NULL,         -- nom du produit (ex: "T-shirt rouge")
    prix DECIMAL(6,2) NOT NULL,        -- prix avec 2 décimales (ex: 9999.99 max)
    image VARCHAR(255),                -- URL ou chemin de l'image du produit (optionnel)
    categorie_id INT NOT NULL,         -- clé étrangère vers la catégorie
    FOREIGN KEY (categorie_id) REFERENCES categorie(id) -- lien vers la table categorie
);

--  Table des commandes (panier validé)
CREATE TABLE commande (
    id INT AUTO_INCREMENT PRIMARY KEY, -- identifiant de la commande
    utilisateur_id INT NOT NULL,       -- utilisateur ayant passé la commande
    date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- date/heure de la commande
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) -- lien vers le client
);

--  Table pivot commande_produit (liaison N:N)
CREATE TABLE commande_produit (
    commande_id INT NOT NULL,          -- identifiant de la commande
    produit_id INT NOT NULL,           -- identifiant du produit commandé
    quantite INT NOT NULL,             -- quantité commandée de ce produit
    PRIMARY KEY (commande_id, produit_id), -- empêche les doublons (clé composite)
    FOREIGN KEY (commande_id) REFERENCES commande(id), -- lien vers commande
    FOREIGN KEY (produit_id) REFERENCES produit(id)    -- lien vers produit
);

--   Types de données les plus utilisés

-- INT           : Entier
-- VARCHAR(N)    : Chaîne de caractères (taille N)
-- TEXT          : Long texte
-- DATE          : Date (YYYY-MM-DD)
-- DATETIME      : Date + heure
-- DECIMAL(x,y)  : Nombre décimal (précis pour l’argent)
-- ENUM(...)     : Valeur fixe parmi une liste
-- BOOLEAN       : Vrai ou Faux (TINYINT(1))


-- . Contraintes importantes

-- PRIMARY KEY     : Identifie de façon unique une ligne
-- NOT NULL        : Valeur obligatoire
-- UNIQUE          : Valeurs uniques
-- AUTO_INCREMENT  : Incrémentation automatique
-- DEFAULT         : Valeur par défaut
-- FOREIGN KEY     : Clé étrangère (relation entre tables)



--  Organisation du fichier .sql

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