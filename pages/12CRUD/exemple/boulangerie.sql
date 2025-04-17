-- Création de la base de données
CREATE DATABASE IF NOT EXISTS boulangerie CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE boulangerie;

-- Table des catégories de produits
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table des produits
CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Insertion de catégories de base
INSERT INTO categories (nom) VALUES
('Pains'),
('Viennoiseries'),
('Pâtisseries');

-- Insertion de produits de base
INSERT INTO produits (nom, prix, categorie_id) VALUES
('Baguette', 1.20, 1),
('Croissant', 1.50, 2),
('Tarte aux pommes', 3.50, 3);
