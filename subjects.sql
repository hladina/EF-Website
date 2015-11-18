-- This file is to fill the subject Table in the EF_Website_DB --
USE EF_Website_Database;

DROP TABLE subject;

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO subject (name)
VALUES ("Englisch");

INSERT INTO subject (name)
VALUES ("Deutsch");

INSERT INTO subject (name)
VALUES ("Franzoesisch");

INSERT INTO subject (name)
VALUES ("Algebra");

INSERT INTO subject (name)
VALUES ("Geometrie");

INSERT INTO subject (name)
VALUES ("Mathematik");

INSERT INTO subject (name)
VALUES ("Schwerpunktfach");

INSERT INTO subject (name)
VALUES ("Latein");

INSERT INTO subject (name)
VALUES ("Wirtschaft");

INSERT INTO subject (name)
VALUES ("Religonswissenschaft");








