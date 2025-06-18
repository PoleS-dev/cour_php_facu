-- Création de la base
CREATE DATABASE IF NOT EXISTS ecole;
USE ecole;

-- Création de la table "eleves"
DROP TABLE IF EXISTS eleves;

CREATE TABLE eleves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    ordinateur_numero INT NOT NULL
);

-- Insertion des 12 élèves avec un numéro d'ordinateur
INSERT INTO eleves (nom, ordinateur_numero) VALUES
('Nassuf', 1),
('Muriel', 2),
('Arneau', 3),
('Sekene', 4),
('Moussa', 5),
('Nawel', 6),
('Emanuel', 7),
('Najiba', 8),
('Shezad', 9),
('Ousmane', 10),
('Mathieu', 11),
('Adam', 12);
