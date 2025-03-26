-- Suppression et création de la base de données
DROP DATABASE IF EXISTS chasseAuxSorcieres;
CREATE DATABASE chasseAuxSorcieres;
USE chasseAuxSorcieres;


-- Table des utilisateurs
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    isMj BOOLEAN DEFAULT 0,
    inscriptionDate DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des parties
CREATE TABLE game (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gameMode ENUM('standard', 'composition cachée', 'quartier résidentiel') NOT NULL,
    status ENUM('inscription', 'en cours', 'terminée') DEFAULT 'inscription',
    mjId INT NOT NULL,
    creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (mjId) REFERENCES user(id) ON DELETE CASCADE
);

-- Table des rôles
CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    camp ENUM('villageois', 'sorcieres', 'independant') NOT NULL,
    description TEXT NOT NULL
);

-- Table des joueurs dans une partie
CREATE TABLE player (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT NOT NULL,
    gameId INT NOT NULL,
    roleId INT NOT NULL,
    isAlive BOOLEAN DEFAULT 1,
    FOREIGN KEY (userId) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (gameId) REFERENCES game(id) ON DELETE CASCADE,
    FOREIGN KEY (roleId) REFERENCES role(id) ON DELETE CASCADE
);

-- Table des compositions de partie
CREATE TABLE composition (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gameId INT NOT NULL,
    roleId INT NOT NULL,
    FOREIGN KEY (gameId) REFERENCES game(id) ON DELETE CASCADE,
    FOREIGN KEY (roleId) REFERENCES role(id) ON DELETE CASCADE
);


-- Insertion de différents utilisateurs pour tester
INSERT INTO user (username, password) VALUES ('admin', 'admin');
INSERT INTO user (username, password) VALUES ('joueur1', 'mdp1');
INSERT INTO user (username, password) VALUES ('joueur2', 'mdp2');
INSERT INTO user (username, password) VALUES ('joueur3', 'mdp3');

-- Insertion des modes de jeu
INSERT INTO game (gameMode, status, mjId) VALUES
('standard', 'inscription', 1),
('composition cachée', 'inscription', 1),
('quartier résidentiel', 'inscription', 1);

-- Insertion des rôles
INSERT INTO role (name, camp, description) VALUES
('Paysan', 'villageois', "Un simple villageois sans pouvoir particulier."),
('Sorcière', 'sorcieres', "Peut empoisonner un joueur chaque nuit."),
('Chasseur', 'villageois', "Lorsqu’il meurt, il peut tuer un joueur."),
('Gardienne des secrets', 'sorcieres', "Maîtresse des confidences, elle connaît des vérités cachées."),
('Manipulatrice de destin', 'sorcieres', "Influence subtilement le cours des événements."),
('Reine des sorcieres', 'sorcieres', "Dirige le coven d’une main de fer."),
('Sage de l\'urne', 'sorcieres', "Prédit les issues funestes grâce à des rituels anciens."),
('Joueur maléfique', 'sorcieres', "Amuse et trompe, semant le chaos."),
('Postier fou', 'villageois', "Dépose des lettres mystérieuses aux villageois."),
('Papy le fermier', 'villageois', "Un ancien sage qui connaît bien les histoires du village."),
('Guet', 'villageois', "Veille la nuit pour protéger le village des dangers."),
('Occultiste', 'villageois', "Cherche à comprendre les forces obscures."),
('Diseuse de bonnes aventures', 'villageois', "Peut prédire des fragments d\'avenir."),
('Miroitier', 'villageois', "Ses miroirs révèlent des vérités cachées."),
('Pendu', 'independant', "Revient d\'entre les morts pour se venger."),
('Ombre sans visage', 'independant', "Change d’identité pour tromper son monde."),
('Chasseur de primes', 'independant', "Ne sert que son propre intérêt en traquant ses cibles."),
('Inquisiteur', 'independant', "Débusque les imposteurs et les sorcieres."),
('Roi des mouches', 'independant', "Rassemble une armée de créatures pour prendre le pouvoir."),
('Voleur', 'independant', "Peut voler les capacités des autres rôles.");
