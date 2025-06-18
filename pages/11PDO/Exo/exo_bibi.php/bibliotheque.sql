
-- ----------------------------------------------------------
-- TABLE : auteurs
-- Chaque auteur peut avoir écrit plusieurs livres
-- ----------------------------------------------------------
CREATE TABLE auteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Identifiant unique de l'auteur
    nom VARCHAR(100) NOT NULL,             -- Nom complet de l'auteur
    pays_origine VARCHAR(100)              -- Pays d'origine (optionnel)
);

-- ----------------------------------------------------------
-- TABLE : livres
-- Chaque livre a un auteur (relation avec la table auteurs)
-- ----------------------------------------------------------
CREATE TABLE livres (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Identifiant unique du livre
    titre VARCHAR(255) NOT NULL,               -- Titre du livre
    annee_publication INT,                     -- Année de publication (ex: 1995)
    genre VARCHAR(50),                         -- Genre (roman, essai, poésie...)
    auteur_id INT NOT NULL,                    -- Clé étrangère vers l'auteur

    -- Définir la relation entre livre et auteur
    FOREIGN KEY (auteur_id) REFERENCES auteurs(id)
        ON DELETE CASCADE                      -- Si un auteur est supprimé, ses livres aussi
);

-- ----------------------------------------------------------
-- TABLE : membres
-- Les personnes qui peuvent emprunter des livres
-- ----------------------------------------------------------
CREATE TABLE membres (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- ID du membre
    nom VARCHAR(100) NOT NULL,                 -- Nom du membre
    email VARCHAR(100) UNIQUE NOT NULL,        -- Email unique (pour éviter les doublons)
    date_inscription DATE NOT NULL   -- Date d'inscription, par défaut aujourd'hui
);

-- ----------------------------------------------------------
-- TABLE : emprunts
-- Pour savoir quels livres sont empruntés, par qui, et quand
-- ----------------------------------------------------------
CREATE TABLE emprunts (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Identifiant de l'emprunt
    membre_id INT NOT NULL,                    -- Qui a emprunté ? (clé étrangère)
    livre_id INT NOT NULL,                     -- Quel livre ? (clé étrangère)
    date_emprunt DATE NOT NULL,                -- Date de l'emprunt
    date_retour DATE                           -- Date de retour (peut être NULL si non rendu)

    -- Relations avec membres et livres
    ,FOREIGN KEY (membre_id) REFERENCES membres(id)
        ON DELETE CASCADE                      -- Si un membre est supprimé, on supprime ses emprunts
    ,FOREIGN KEY (livre_id) REFERENCES livres(id)
        ON DELETE CASCADE                      -- Si un livre est supprimé, on supprime ses emprunts
);

-- ----------------------------------------------------------
-- Données exemples : Auteurs
-- ----------------------------------------------------------
INSERT INTO auteurs (nom, pays_origine) VALUES
('Victor Hugo', 'France'),
('J.K. Rowling', 'Royaume-Uni'),
('Albert Camus', 'Algérie'),
('George Orwell', 'Royaume-Uni');

-- ----------------------------------------------------------
-- Données exemples : Livres
-- ----------------------------------------------------------
INSERT INTO livres (titre, annee_publication, genre, auteur_id) VALUES
('Les Misérables', 1862, 'Roman', 1),
('Harry Potter à l\'école des sorciers', 1997, 'Fantasy', 2),
('L\'Étranger', 1942, 'Roman philosophique', 3),
('1984', 1949, 'Science-fiction', 4);

-- ----------------------------------------------------------
-- Données exemples : Membres
-- ----------------------------------------------------------
INSERT INTO membres (nom, email, date_inscription) VALUES
('Alice Dupont', 'alice@example.com', CURDATE()),
('Jean Martin', 'jean@example.com', CURDATE());

-- ----------------------------------------------------------
-- Données exemples : Emprunts
-- ----------------------------------------------------------
INSERT INTO emprunts (membre_id, livre_id, date_emprunt) VALUES
(1, 1, '2025-04-01'),
(2, 3, '2025-04-02');

-- Fin du script
