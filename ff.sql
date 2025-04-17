CREATE TABLE `user` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(100) NOT NULL,
    `mail` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `register_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `id_role` INT UNSIGNED
);
 
CREATE TABLE `subject` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP
);
 
 
CREATE TABLE `article` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `modification_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `id_subject` INT UNSIGNED NOT NULL,
    `id_user` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`id_subject`) REFERENCES `subject`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_user`) REFERENCES `user`(`id`) ON DELETE CASCADE
);
 
CREATE TABLE `role` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL UNIQUE
);
 
INSERT INTO `role` (`name`) VALUES ('Admin'), ('User');
INSERT INTO `user` (`pseudo`, `mail`, `password`, `id_role`) VALUES
('Alice', 'alice@example.com', 'hashed_pw1', 1),
('Bob', 'bob@example.com', 'hashed_pw2', 1);
 
INSERT INTO `subject` (`title`, `description`) VALUES
('PHP', 'Programmation côté serveur'),
('SQL', 'Langage de base de données');
 
INSERT INTO `article` (`title`, `content`, `id_subject`, `id_user`)
VALUES
('Introduction à PHP', 'Contenu PHP', 1, 1),
('Les jointures SQL', 'Contenu SQL', 2, 2);