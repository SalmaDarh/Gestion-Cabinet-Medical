use cabinetmedical;

CREATE TABLE "compte_rendu" (
  `compte_rendu_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `compte_rendu_date` varchar(255) NOT NULL,
  `compte_rendu_contenu` longtext NOT NULL,
  PRIMARY KEY (`compte_rendu_id`)
)