-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 jan. 2025 à 08:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mariesol`
--
CREATE DATABASE IF NOT EXISTS `mariesol` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mariesol`;

-- --------------------------------------------------------

--
-- Structure de la table `accorder`
--

DROP TABLE IF EXISTS `accorder`;
CREATE TABLE IF NOT EXISTS `accorder` (
  `CODE_INST` int NOT NULL,
  `CODE_ACCORDEUR` int NOT NULL,
  `DATE_INTERVENTION` date DEFAULT NULL,
  PRIMARY KEY (`CODE_INST`,`CODE_ACCORDEUR`),
  KEY `I_FK_ACCORDER_INSTRUMENT` (`CODE_INST`),
  KEY `I_FK_ACCORDER_ACCORDEUR` (`CODE_ACCORDEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `accorder`
--

INSERT INTO `accorder` (`CODE_INST`, `CODE_ACCORDEUR`, `DATE_INTERVENTION`) VALUES
(1, 1, '2024-04-09'),
(1, 2, '2024-04-21'),
(2, 2, '2024-03-08'),
(3, 3, '2024-03-29');

-- --------------------------------------------------------

--
-- Structure de la table `accordeur`
--

DROP TABLE IF EXISTS `accordeur`;
CREATE TABLE IF NOT EXISTS `accordeur` (
  `CODE_ACCORDEUR` int NOT NULL,
  `NOM_ACCORDEUR` char(32) DEFAULT NULL,
  `PRENOM_ACCORDEUR` char(32) DEFAULT NULL,
  `ADR1_ACCORDEUR` char(32) DEFAULT NULL,
  `ADR2_ACCORDEUR` char(32) DEFAULT NULL,
  `CP_ACCORDEUR` char(5) DEFAULT NULL,
  `VILLE_ACCORDEUR` char(32) DEFAULT NULL,
  `TEL_ACCORDEUR` char(10) DEFAULT NULL,
  PRIMARY KEY (`CODE_ACCORDEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `accordeur`
--

INSERT INTO `accordeur` (`CODE_ACCORDEUR`, `NOM_ACCORDEUR`, `PRENOM_ACCORDEUR`, `ADR1_ACCORDEUR`, `ADR2_ACCORDEUR`, `CP_ACCORDEUR`, `VILLE_ACCORDEUR`, `TEL_ACCORDEUR`) VALUES
(1, 'CORDIER', 'Michel', 'Rue des notes', 'Bâtiment 2', '83000', 'TOULON', NULL),
(2, 'FONTE', 'Pierre', 'Rue de la musique', NULL, '83000', 'TOULON', NULL),
(3, 'CLASSE', 'Nicolas', 'Avenue de l\'univers', NULL, '83500', 'LA SEYNE SUR MER', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `CODE_COULEUR` int NOT NULL,
  `NOM_COULEUR` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_COULEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`CODE_COULEUR`, `NOM_COULEUR`) VALUES
(1, 'Noir'),
(2, 'Blanc'),
(3, 'Noir silver'),
(4, 'Aucune');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `CODE_COURS` bigint NOT NULL,
  `CODE_ELEVE` int NOT NULL,
  `CODE_PROF` int NOT NULL,
  `CODE_SALLE` int NOT NULL,
  `JOUR_SEMAINE` char(8) DEFAULT NULL,
  `HEURE_COURS` time DEFAULT NULL,
  PRIMARY KEY (`CODE_COURS`),
  KEY `I_FK_COURS_ELEVE` (`CODE_ELEVE`),
  KEY `I_FK_COURS_PROFESSEUR` (`CODE_PROF`),
  KEY `I_FK_COURS_SALLE_COURS` (`CODE_SALLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`CODE_COURS`, `CODE_ELEVE`, `CODE_PROF`, `CODE_SALLE`, `JOUR_SEMAINE`, `HEURE_COURS`) VALUES
(1, 1, 20, 1, 'lundi', '00:00:16'),
(2, 2, 20, 1, 'lundi', '00:00:17'),
(3, 3, 21, 2, 'lundi', '00:00:16'),
(4, 7, 50, 5, 'mardi', '10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

DROP TABLE IF EXISTS `discipline`;
CREATE TABLE IF NOT EXISTS `discipline` (
  `CODE_DISCIPLINE` int NOT NULL,
  `NOM_DISCIPLINE` char(20) DEFAULT NULL,
  PRIMARY KEY (`CODE_DISCIPLINE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `discipline`
--

INSERT INTO `discipline` (`CODE_DISCIPLINE`, `NOM_DISCIPLINE`) VALUES
(10, 'Pratique piano'),
(11, 'Pratique Batterie'),
(12, 'Pratique trompette'),
(13, 'Pratique guitare'),
(14, 'Solfège'),
(15, 'guitare electrique');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `CODE_ELEVE` int NOT NULL,
  `NOM_ELEVE` char(20) DEFAULT NULL,
  `PRENOM_ELEVE` char(20) DEFAULT NULL,
  `DATE_NAISS` date DEFAULT NULL,
  `ADR1_ELEVE` char(32) DEFAULT NULL,
  `ADR2_ELEVE` char(32) DEFAULT NULL,
  `CP_ELEVE` char(5) DEFAULT NULL,
  `VILLE_ELEVE` char(32) DEFAULT NULL,
  `TEL_ELEVE` bigint DEFAULT NULL,
  PRIMARY KEY (`CODE_ELEVE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`CODE_ELEVE`, `NOM_ELEVE`, `PRENOM_ELEVE`, `DATE_NAISS`, `ADR1_ELEVE`, `ADR2_ELEVE`, `CP_ELEVE`, `VILLE_ELEVE`, `TEL_ELEVE`) VALUES
(1, 'CONCERTO', 'Marie', '1994-02-28', 'Rue des fleurs', NULL, '83140', 'Six fours les plages', 494000001),
(2, 'TOLOSA', 'Lisa', '1996-11-02', 'Rue de la volonté', NULL, '83140', 'Six fours les plages', 494000002),
(3, 'JOUEUR', 'Marc', '1999-10-09', 'Avenue des étoiles', NULL, '83140', 'Six fours les plages', 494000003),
(4, 'DURAND', 'Emilie', '2001-01-09', 'Chemin des arbres', NULL, '83300', 'Draguignan', NULL),
(5, 'CAPO', 'Anne', '1985-03-03', 'Rue de la paix', NULL, '83300', 'Toulon', NULL),
(6, 'DUPONT', 'Lise', '1999-08-01', 'Rue des lapins', NULL, '83000', 'Toulon', 120245722),
(7, 'PAPO', 'Ulysse', '0000-00-00', 'Rue des fleurs', '12 rue des lilas', NULL, NULL, NULL),
(8, 'Lopez', 'Lucy', '2024-05-08', '132 Rue du puits', NULL, '83600', 'frejus', 654235685),
(17, 'dupuis', 'laurent', '2024-10-16', 'rue de la paix', NULL, '06000', 'Nice', 64251852);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `CODE_INST` int NOT NULL,
  `CODE_SALLE` int NOT NULL,
  `CODE_COULEUR` int NOT NULL,
  `CODE_TYPE_INST` int NOT NULL,
  `NOM_INST` char(32) DEFAULT NULL,
  `MARQUE_INST` char(32) DEFAULT NULL,
  `DATE_FAB` date DEFAULT NULL,
  `DATE_ACHAT` char(32) DEFAULT NULL,
  `NUM_SERIE` int DEFAULT NULL,
  PRIMARY KEY (`CODE_INST`),
  KEY `I_FK_INSTRUMENT_SALLE_COURS` (`CODE_SALLE`),
  KEY `I_FK_INSTRUMENT_COULEUR` (`CODE_COULEUR`),
  KEY `I_FK_INSTRUMENT_TYPE_INSTRUMENT` (`CODE_TYPE_INST`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`CODE_INST`, `CODE_SALLE`, `CODE_COULEUR`, `CODE_TYPE_INST`, `NOM_INST`, `MARQUE_INST`, `DATE_FAB`, `DATE_ACHAT`, `NUM_SERIE`) VALUES
(1, 1, 1, 1, 'Piano', 'Kawai', '1990-08-01', '2008-05-15', 123456),
(2, 2, 2, 1, 'Piano', 'Nordiska', '2000-01-17', '2000-03-26', 654321),
(3, 3, 1, 2, 'Piano', 'Yamaha', '1981-10-20', '1999-09-11', 789123),
(4, 4, 1, 3, 'Piano', 'Kawai', '1996-11-16', '1998-07-27', 456789),
(5, 5, 1, 4, 'Piano numérique', 'Yamaha', '2003-05-20', '2004-07-26', 987654),
(6, 7, 3, 6, 'Batterie acoustique', 'TAMA imperial', '2007-03-26', '2009-01-30', 345123),
(7, 6, 4, 5, 'Trompette', 'Stag', '2006-01-28', '2008-07-09', 234567);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `CODE_PROF` int NOT NULL,
  `CODE_DISCIPLINE` int NOT NULL,
  `NOM_PROF` char(32) DEFAULT NULL,
  `PRENOM_PROF` char(32) DEFAULT NULL,
  `TEL_PROF` char(10) DEFAULT NULL,
  `ADR1_PROF` char(32) DEFAULT NULL,
  `ADR2_PROF` char(32) DEFAULT NULL,
  `CP_PROF` char(5) DEFAULT NULL,
  `VILLE_PROF` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_PROF`),
  KEY `I_FK_PROFESSEUR_DISCIPLINE` (`CODE_DISCIPLINE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`CODE_PROF`, `CODE_DISCIPLINE`, `NOM_PROF`, `PRENOM_PROF`, `TEL_PROF`, `ADR1_PROF`, `ADR2_PROF`, `CP_PROF`, `VILLE_PROF`) VALUES
(20, 10, 'ARPEGE', 'Annie', '0628456423', 'rue de la mélodie', NULL, '83140', 'six fours les plages'),
(21, 10, 'GAMME', 'Lydia', '0626586412', 'rue du chant', 'batA', '83500', 'la seyne sur mer'),
(50, 12, 'Dupuis', 'Laurent', '0755565644', '123 rue du soleil', '', '83600', 'Fréjus');

-- --------------------------------------------------------

--
-- Structure de la table `salle_cours`
--

DROP TABLE IF EXISTS `salle_cours`;
CREATE TABLE IF NOT EXISTS `salle_cours` (
  `CODE_SALLE` int NOT NULL,
  `NOM_SALLE` char(32) DEFAULT NULL,
  `SITUATION_SALLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_SALLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle_cours`
--

INSERT INTO `salle_cours` (`CODE_SALLE`, `NOM_SALLE`, `SITUATION_SALLE`) VALUES
(1, 'salle Clémenti', '1er étage'),
(2, 'salle Chopin', 'rdc'),
(3, 'salle concert Schubert', 'rdc'),
(4, 'salle Beethoven', '1er étage'),
(5, 'salle Bach', '2ème étage'),
(6, 'salle Armstrong', 'rdc'),
(7, 'salle Mullen', '2ème étage');

-- --------------------------------------------------------

--
-- Structure de la table `type_instrument`
--

DROP TABLE IF EXISTS `type_instrument`;
CREATE TABLE IF NOT EXISTS `type_instrument` (
  `CODE_TYPE_INST` int NOT NULL,
  `NOM_TYPE_INST` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_TYPE_INST`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_instrument`
--

INSERT INTO `type_instrument` (`CODE_TYPE_INST`, `NOM_TYPE_INST`) VALUES
(1, 'piano droit'),
(2, 'piano demi-queue'),
(3, 'piano à queue'),
(4, 'piano numérique'),
(5, 'cuivre'),
(6, 'percussion');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accorder`
--
ALTER TABLE `accorder`
  ADD CONSTRAINT `accorder_ibfk_1` FOREIGN KEY (`CODE_INST`) REFERENCES `instrument` (`CODE_INST`),
  ADD CONSTRAINT `accorder_ibfk_2` FOREIGN KEY (`CODE_ACCORDEUR`) REFERENCES `accordeur` (`CODE_ACCORDEUR`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`CODE_ELEVE`) REFERENCES `eleve` (`CODE_ELEVE`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`CODE_PROF`) REFERENCES `professeur` (`CODE_PROF`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`CODE_SALLE`) REFERENCES `salle_cours` (`CODE_SALLE`);

--
-- Contraintes pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `instrument_ibfk_1` FOREIGN KEY (`CODE_SALLE`) REFERENCES `salle_cours` (`CODE_SALLE`),
  ADD CONSTRAINT `instrument_ibfk_2` FOREIGN KEY (`CODE_COULEUR`) REFERENCES `couleur` (`CODE_COULEUR`),
  ADD CONSTRAINT `instrument_ibfk_3` FOREIGN KEY (`CODE_TYPE_INST`) REFERENCES `type_instrument` (`CODE_TYPE_INST`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`CODE_DISCIPLINE`) REFERENCES `discipline` (`CODE_DISCIPLINE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
