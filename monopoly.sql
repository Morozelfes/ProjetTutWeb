-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mai 2016 à 14:31
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monopoly`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id_quartier` int(11) NOT NULL,
  PRIMARY KEY (`id_adresse`),
  UNIQUE KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `nom`, `id_quartier`) VALUES
(1, 'Bd de Belleville', 1),
(2, 'Rue Lecourbe', 1),
(3, 'Rue de Vaugirard', 2),
(4, 'Rue de Courcelles', 2),
(5, 'Avenue de la Republique', 2),
(6, 'Bd de la Villette', 3),
(7, 'Avenue de Neuilly', 3),
(8, 'Rue de Paradis', 3),
(9, 'Avenue Mozard', 4),
(10, 'Bd Saint-Michel', 4),
(11, 'Place Pigalle', 4),
(12, 'Avenue Matignon', 5),
(13, 'Bd Malesherbes', 5),
(14, 'Avenue Henri-Martin', 5),
(15, 'Faubourg Sait-Honore', 6),
(16, 'Place de la Bourse', 6),
(17, 'Rue la Fayette', 6),
(18, 'Avenue de Breteuil', 7),
(19, 'Avenue Foch', 7),
(20, 'Bd des Capucines', 7),
(21, 'Champs-Elisees', 8),
(22, 'Rue de la Paix', 8);

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `id_carte` int(11) NOT NULL AUTO_INCREMENT,
  `id_adresse` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id_carte`),
  UNIQUE KEY `id_carte` (`id_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(25) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `id_membre` (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` int(11) NOT NULL AUTO_INCREMENT,
  `couleur` varchar(10) CHARACTER SET utf8 NOT NULL,
  `taille` int(11) NOT NULL,
  PRIMARY KEY (`id_quartier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `quartier`
--

INSERT INTO `quartier` (`id_quartier`, `couleur`, `taille`) VALUES
(1, 'violet', 2),
(2, 'turquoise', 3),
(3, 'fushia', 3),
(4, 'orange', 3),
(5, 'rouge', 3),
(6, 'jaune', 3),
(7, 'vert', 3),
(8, 'bleu', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
