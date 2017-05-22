GRANT ALL ON prescom . * TO 'prescom'@'localhost' IDENTIFIED BY 'secret';

DROP TABLE IF EXISTS `membre`;

CREATE TABLE membre (
id varchar (10) NOT NULL, 
nom_utilisateur varchar (30) NOT NULL,
nom varchar (50) NOT NULL,
prenom varchar (50) NOT NULL,
email varchar (50) NOT NULL,
satut varchar (20) NOT NULL,
mdp varchar (50) NOT NULL, 
PRIMARY KEY (id)
) ENGINE=INNODB ;

INSERT INTO membre VALUES ('1', 'mlatayan','Mary Kate', 'Latayan', 'm.k.latayan@gmail.com', 'administrateur', 'mlatayan') ;
INSERT INTO membre VALUES ('2', 'croussel','Chloé', 'Roussel', 'chloe.roussel28@orange.fr', 'utilisateur', 'croussel') ;