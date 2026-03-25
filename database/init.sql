USE trackloader;

-- Suppression des tables dans l'ordre pour éviter les conflits de FK
DROP TABLE IF EXISTS panier;
DROP TABLE IF EXISTS historique_achat;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS album;

-- Recréation des tables
CREATE TABLE album (
    id_album INT AUTO_INCREMENT,
    name VARCHAR(50),
    cover VARCHAR(255),
    style VARCHAR(50),
    tracklist TEXT,
    release_date DATE,
    price INT,
    author_name VARCHAR(50),
    author_image_url VARCHAR(255),
    PRIMARY KEY(id_album)
);

CREATE TABLE user (
    id_user INT AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_user)
);

CREATE TABLE historique_achat (
    id_historique_achat INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_album INT NOT NULL,
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_historique_achat),
    FOREIGN KEY(id_user) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY(id_album) REFERENCES album(id_album) ON DELETE CASCADE
);

CREATE TABLE panier (
    id_panier INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_album INT NOT NULL,
    PRIMARY KEY(id_panier),
    UNIQUE(id_user, id_album),
    FOREIGN KEY(id_user) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY(id_album) REFERENCES album(id_album) ON DELETE CASCADE
);