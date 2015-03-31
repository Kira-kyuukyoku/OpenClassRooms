/* EFFACEMENT DE LA BASE DE DONNÉES */
DROP DATABASE IF EXISTS test;

/* CREATION DE LA BASE DE DONNÉES */
CREATE DATABASE test DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/* SÉLÉCTION DE LA BASE DE DONNÉES */
USE test;

/* CRÉATION DE LA TABLE */
CREATE TABLE minichat
(
    id_mess SMALLINT(4) UNSIGNED AUTO_INCREMENT,
    pseudo VARCHAR(25) NOT NULL,
    message TEXT NOT NULL,
    date_mess DATETIME NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY(id_mess)
);

/* INSERT DONNÉES */
INSERT INTO minichat (id_mess, pseudo, message, date_mess) VALUES
(1, 'Kira', 'First message', '2010-04-02 16:32:22');