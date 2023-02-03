-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 mars 2021 à 08:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `porjetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idcom` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` text COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `idlivre` text COLLATE utf8_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`idcom`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcom`, `nomUtilisateur`, `message`, `idlivre`) VALUES
(25, 'Billy NGUEDJIO', 'merci', '9781982139131'),
(24, 'Billy NGUEDJIO', 'je vous le recommande Ã  100%', '9781982139131'),
(23, 'Youness SRHIR', 'Magnifique ce livre', '9781982139131'),
(22, 'Youness SRHIR', 'Rien Ã  dire juste parfait', '9781982139131'),
(21, 'Billy NGUEDJIO', 'Vous allez aimer le livre', '9781982139131'),
(20, 'Billy NGUEDJIO', 'Le scenario est juste magique', '9781982139131');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `adresseMail` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `motdepasse` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`adresseMail`, `motdepasse`, `id`, `nom`) VALUES
('nguedjiobilly@gmail.com', '13085a63a2b3e4beb7ab10ee395aefe4', 5, 'Billy NGUEDJIO'),
('Youness@gmail.com', 'cdaa6716746fb685734abde87f1b08ad', 6, 'Youness SRHIR');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
