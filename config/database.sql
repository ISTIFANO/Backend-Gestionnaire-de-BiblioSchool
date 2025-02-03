CREATE DATABASE BiblioSchools;

USE BiblioSchools;
CREATE TABLE Categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE Etat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    statut VARCHAR(50) NOT NULL
);

CREATE TABLE Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Type VARCHAR(50) NOT NULL,
    Description TEXT
);

CREATE TABLE Utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Lastname VARCHAR(100) NOT NULL,
        Photo VARCHAR(100) NOT NULL,

    Email VARCHAR(100) UNIQUE NOT NULL,
    Phone VARCHAR(20),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Role(id)
);

CREATE TABLE Livres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Titre VARCHAR(255) NOT NULL,
            Photo VARCHAR(100) NOT NULL,

    Auteur VARCHAR(100) NOT NULL,
    Disponibilite BOOLEAN DEFAULT TRUE,
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES Categories(id)
);

CREATE TABLE Livres_Tags (
    livre_id INT,
    tag_id INT,
    PRIMARY KEY (livre_id, tag_id),
    FOREIGN KEY (livre_id) REFERENCES Livres(id),
    FOREIGN KEY (tag_id) REFERENCES Tags(id)
);

CREATE TABLE Reservation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    id_livre INT,
    Date_Reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    etat_id INT,
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id),
    FOREIGN KEY (id_livre) REFERENCES Livres(id),
    FOREIGN KEY (etat_id) REFERENCES Etat(id)
);