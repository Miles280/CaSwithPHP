-- Active: 1741689977945@@127.0.0.1@3306
-- Création de la base de données
CREATE DATABASE chasse_aux_sorcieres;
USE chasse_aux_sorcieres;

-- Table des utilisateurs (joueurs et MJ)
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    est_mj BOOLEAN DEFAULT 0,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des parties
CREATE TABLE game (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mode_jeu ENUM('standard', 'composition cachée', 'quartier résidentiel') NOT NULL,
    statut ENUM('inscription', 'en cours', 'terminée') DEFAULT 'inscription',
    mj_id INT NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (mj_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Table des rôles
CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    camp ENUM('villageois', 'sorcières', 'indépendant') NOT NULL,
    description TEXT
);

DROP Table role;

-- Table des joueurs dans une partie
CREATE TABLE player (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    role_id INT NOT NULL,
    vivant BOOLEAN DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES game(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES role(id) ON DELETE CASCADE
);





-- Ajout de joueurs (avec quelques MJ)
INSERT INTO user (username, password, est_mj) VALUES
('Alice', 'motdepasse1', 1),
('Bob', 'motdepasse2', 0),
('Charlie', 'motdepasse3', 1),
('David', 'motdepasse4', 0),
('Emma', 'motdepasse5', 0);

-- Ajout de rôles
INSERT INTO role (nom, camp, description) VALUES
('Paysan', 'villageois', 'Un simple villageois sans pouvoir particulier.'),
('Sorcière', 'sorcières', 'Peut empoisonner un joueur chaque nuit.'),
('Chasseur', 'villageois', 'Lorsqu’il meurt, il peut tuer un joueur.'),
('Voyante', 'villageois', 'Peut voir le rôle d’un joueur chaque nuit.'),
('Renégat', 'indépendant', 'Doit survivre jusqu’à la fin sans se faire tuer.');

INSERT INTO role (nom, camp, description) VALUES
-- Rôles des sorcières
('Gardienne des secrets', 'sorcières', 'Maîtresse des confidences, elle connaît des vérités cachées.'),
('Manipulatrice de destin', 'sorcières', 'Influence subtilement le cours des événements.'),
('Reine des sorcières', 'sorcières', 'Dirige le coven d’une main de fer.'),
('Sage de l\'urne', 'sorcières', 'Prédit les issues funestes grâce à des rituels anciens.'),
('Joueur maléfique', 'sorcières', 'Amuse et trompe, semant le chaos.');

-- Rôles des villageois
INSERT INTO role (nom, camp, description) VALUES
('Postier fou', 'villageois', 'Dépose des lettres mystérieuses aux villageois.'),
('Papy le fermier', 'villageois', 'Un ancien sage qui connaît bien les histoires du village.'),
('Guet', 'villageois', 'Veille la nuit pour protéger le village des dangers.'),
('Occultiste', 'villageois', 'Cherche à comprendre les forces obscures.'),
('Diseuse de bonnes aventures', 'villageois', 'Peut prédire des fragments d\'avenir.'),
('Miroitier', 'villageois', 'Ses miroirs révèlent des vérités cachées.');

-- Rôles des indépendants
INSERT INTO role (nom, camp, description) VALUES
('Pendu', 'indépendant', 'Revient d\'entre les morts pour se venger.'),
('Ombre sans visage', 'indépendant', 'Change d’identité pour tromper son monde.'),
('Chasseur de primes', 'indépendant', 'Ne sert que son propre intérêt en traquant ses cibles.'),
('Inquisiteur', 'indépendant', 'Débusque les imposteurs et les sorcières.'),
('Roi des mouches', 'indépendant', 'Rassemble une armée de créatures pour prendre le pouvoir.'),
('Voleur', 'indépendant', 'Peut voler les capacités des autres rôles.');

-- Création de parties
INSERT INTO game (mode_jeu, statut, mj_id) VALUES
('standard', 'inscription', 1),
('composition cachée', 'en cours', 3),
('quartier résidentiel', 'terminée', 1);

-- Ajout de joueurs dans les parties avec rôles attribués aléatoirement
INSERT INTO player (user_id, game_id, role_id) VALUES
(2, 1, 1), -- Bob -> Partie 1 -> Villageois
(4, 1, 3), -- David -> Partie 1 -> Chasseur
(5, 1, 4), -- Emma -> Partie 1 -> Voyante
(2, 2, 2), -- Bob -> Partie 2 -> Sorcière
(4, 2, 5); -- David -> Partie 2 -> Renégat
