-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 déc. 2017 à 19:24
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--
CREATE DATABASE IF NOT EXISTS `projetphp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetphp`;

-- --------------------------------------------------------

--
-- Structure de la table `hastasks`
--

DROP TABLE IF EXISTS `hastasks`;
CREATE TABLE IF NOT EXISTS `hastasks` (
  `listID` int(11) DEFAULT NULL,
  `taskID` int(11) DEFAULT NULL,
  KEY `listID` (`listID`),
  KEY `taskID` (`taskID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hastasks`
--

INSERT INTO `hastasks` (`listID`, `taskID`) VALUES
(2, 5),
(2, 6),
(2, 8),
(1, 2),
(2, 35),
(1, 37),
(1, 38),
(1, 39);

-- --------------------------------------------------------

--
-- Structure de la table `listoftasks`
--

DROP TABLE IF EXISTS `listoftasks`;
CREATE TABLE IF NOT EXISTS `listoftasks` (
  `userID` int(11) DEFAULT NULL,
  `listID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `isPublic` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`listID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listoftasks`
--

INSERT INTO `listoftasks` (`userID`, `listID`, `title`, `date`, `isPublic`) VALUES
(1, 1, 'Ikea', '2017-12-17', '1'),
(NULL, 2, 'Course', '2012-12-17', '1'),
(1, 37, 'Valentin', '1997-04-22', '0'),
(1, 38, 'du pipi de chat', '1997-04-22', '0');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `taskID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `isComplete` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`taskID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`taskID`, `date`, `content`, `isComplete`) VALUES
(1, '2017-12-05', 'Manger du Kiri', '1'),
(2, '2012-12-17', 'Commode', '1'),
(5, '2012-03-17', 'Granola', '1'),
(6, '2012-03-17', 'Riz', '0'),
(7, '2012-03-17', 'Kiri', '1'),
(8, '2012-03-17', 'Pates', '0'),
(35, '1997-04-22', 'Patates', '0'),
(37, '2017-12-19', 'Njutnjutnjutdisc', '1'),
(38, '1997-04-22', 'le dernier njut njut', '0'),
(39, '1997-04-22', 'njut\'njut\' coucou', '0');

-- --------------------------------------------------------

--
-- Structure de la table `taskuser`
--

DROP TABLE IF EXISTS `taskuser`;
CREATE TABLE IF NOT EXISTS `taskuser` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taskuser`
--

INSERT INTO `taskuser` (`userID`, `name`, `password`) VALUES
(1, 'valentin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'louis', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Structure de la table `trace`
--

DROP TABLE IF EXISTS `trace`;
CREATE TABLE IF NOT EXISTS `trace` (
  `dumbby` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trace`
--

INSERT INTO `trace` (`dumbby`) VALUES
('valentin1'),
('caca'),
('prout');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hastasks`
--
ALTER TABLE `hastasks`
  ADD CONSTRAINT `HasTasks_ibfk_1` FOREIGN KEY (`listID`) REFERENCES `listoftasks` (`listID`),
  ADD CONSTRAINT `HasTasks_ibfk_2` FOREIGN KEY (`taskID`) REFERENCES `task` (`taskID`);

--
-- Contraintes pour la table `listoftasks`
--
ALTER TABLE `listoftasks`
  ADD CONSTRAINT `ListOfTasks_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `taskuser` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
