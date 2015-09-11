/* EFFACEMENT DE LA BASE DE DONNÉES */
DROP DATABASE IF EXISTS personnages;

/* CREATION DE LA BASE DE DONNÉES */
CREATE DATABASE personnages DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/* SÉLÉCTION DE LA BASE DE DONNÉES */
USE personnages;

/* CRÉATION DE LA TABLE PERSONNAGES */
CREATE TABLE personnages
(
    idPerso SMALLINT(4) UNSIGNED AUTO_INCREMENT,
    nomPerso VARCHAR(25) NOT NULL,
    forcePerso TINYINT(2) NOT NULL DEFAULT 1,
    degatsPerso TINYINT(3) NOT NULL DEFAULT 0,
    niveauPerso TINYINT(2) NOT NULL DEFAULT 1,
    experiencePerso TINYINT(2) NOT NULL DEFAULT 0,
    CONSTRAINT pk_perso PRIMARY KEY(idPerso),
    CONSTRAINT perso_unique UNIQUE(nomPerso)
);

/* INSERT DONNÉES PERSONNAGES */
INSERT INTO personnages (idPerso, nomPerso, forcePerso, degatsPerso, niveauPerso, experiencePerso) VALUES
(1, 'Kira', 1, 0, 1, 0);
