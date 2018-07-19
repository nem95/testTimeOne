-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 juil. 2018 à 21:34
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timeonesalaries`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `salaries_id` int(10) UNSIGNED NOT NULL,
  `acquis` tinyint(4) NOT NULL COMMENT 'Nombre de jour de cong?s disponible pour l''ann?e en cours',
  `pris` tinyint(4) NOT NULL COMMENT 'Nombre de jour de cong?s pris sur l''ann?e en cours',
  UNIQUE KEY `salaries_id` (`salaries_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`salaries_id`, `acquis`, `pris`) VALUES
(1, 35, 16),
(2, 25, 6),
(3, 10, 2),
(4, 8, 0),
(14, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salaries`
--

INSERT INTO `salaries` (`id`, `firstName`, `lastName`, `address`, `dateBegin`, `dateEnd`, `isDeleted`) VALUES
(1, 'Anne', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '0000-00-00', 1),
(2, 'Alexandre', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '0000-00-00', 0),
(3, 'Jeanne', 'Lacombe', '138 avenue G?n?ral de Gaulle', '2013-01-06', '0000-00-00', 1),
(4, 'Patrick', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '1988-10-11', 0),
(14, 'deded', 'deded', 'dededd', '2015-12-12', '2015-12-12', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
