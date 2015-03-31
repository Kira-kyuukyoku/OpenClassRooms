/* EFFACEMENT DE LA BASE DE DONNÉES */
DROP DATABASE IF EXISTS test;

/* CREATION DE LA BASE DE DONNÉES */
CREATE DATABASE test DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/* SÉLÉCTION DE LA BASE DE DONNÉES */
USE test;

/* CRÉATION DE LA TABLE billets */
CREATE TABLE billets
(
    id_billet SMALLINT(4) UNSIGNED AUTO_INCREMENT,
    title VARCHAR(25) NOT NULL,
    content TEXT NOT NULL,
    create_date DATETIME NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY(id_billet)
);

/* CRÉATION DE LA TABLE commentaires */
CREATE TABLE comments
(
    id_comment SMALLINT(4) UNSIGNED AUTO_INCREMENT,
    id_billet SMALLINT(4) UNSIGNED,
    author VARCHAR(25) NOT NULL,
    comment TEXT NOT NULL,
    comment_date DATETIME NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY(id_comment),
    CONSTRAINT fk_comment_billet FOREIGN KEY(id_billet) REFERENCES billets(id_billet)
    ON UPDATE CASCADE ON DELETE CASCADE
);

/* INSERT DONNÉES */
INSERT INTO billets (id_billet, title, content, create_date) VALUES
(1, 'First post title', 'Lorem Content.', '2015-04-02 16:32:22'),
(2, 'Another post title', 'Second Lorem Content.', '2015-04-02 16:42:58');

INSERT INTO comments (id_comment, id_billet, author, comment, comment_date) VALUES
(1, 1, 'Kira', 'First Lorem Comment.', '2015-04-02 17:32:22'),
(2, 1, 'Kira', 'Second Lorem Comment.', '2015-04-02 18:00:01');