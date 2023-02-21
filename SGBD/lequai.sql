-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 fév. 2023 à 17:02
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lequai`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_formules`
--

DROP TABLE IF EXISTS `tbl_formules`;
CREATE TABLE IF NOT EXISTS `tbl_formules` (
  `id_formule` int(11) NOT NULL AUTO_INCREMENT,
  `title_formule` varchar(250) NOT NULL,
  `periode_formule` mediumtext NOT NULL,
  `content_formule` varchar(250) NOT NULL,
  `price_formule` decimal(2,0) NOT NULL,
  PRIMARY KEY (`id_formule`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_formules`
--

INSERT INTO `tbl_formules` (`id_formule`, `title_formule`, `periode_formule`, `content_formule`, `price_formule`) VALUES
(3, 'Formule Week-End', 'Vendredi SOIR - Samedi MIDI - Samedi SOIR', 'Plat + Dessert', '25'),
(14, 'Formule des amis', 'Toute l\'annÃ©e - MIDI', 'Plat', '11'),
(15, 'Formule du gourmet', 'Samedi MIDI et Dimanche MIDI', 'Composition du chef (EntrÃ©e + Plat)', '23');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_horaires`
--

DROP TABLE IF EXISTS `tbl_horaires`;
CREATE TABLE IF NOT EXISTS `tbl_horaires` (
  `id_horaire` int(11) NOT NULL AUTO_INCREMENT,
  `jour_horaire` varchar(8) NOT NULL,
  `hour_deb_m` time NOT NULL DEFAULT '10:00:00',
  `hour_end_m` time NOT NULL DEFAULT '15:00:00',
  `open_m` varchar(1) NOT NULL DEFAULT 'O',
  `hour_deb_s` time NOT NULL DEFAULT '17:00:00',
  `hour_end_s` time NOT NULL DEFAULT '23:00:00',
  `open_s` varchar(1) NOT NULL DEFAULT 'O',
  PRIMARY KEY (`id_horaire`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_horaires`
--

INSERT INTO `tbl_horaires` (`id_horaire`, `jour_horaire`, `hour_deb_m`, `hour_end_m`, `open_m`, `hour_deb_s`, `hour_end_s`, `open_s`) VALUES
(1, 'LUNDI', '11:30:00', '14:00:00', 'N', '18:30:00', '22:00:00', 'O'),
(4, 'MARDI', '12:00:00', '14:00:00', 'O', '18:30:00', '22:00:00', 'O'),
(5, 'MERCREDI', '12:00:00', '14:00:00', 'O', '18:30:00', '22:00:00', 'O'),
(6, 'JEUDI', '11:00:00', '14:00:00', 'O', '18:00:00', '22:00:00', 'O'),
(7, 'VENDREDI', '12:00:00', '14:00:00', 'O', '19:00:00', '22:00:00', 'O'),
(8, 'SAMEDI', '12:00:00', '14:00:00', 'N', '19:00:00', '23:00:00', 'O'),
(9, 'DIMANCHE', '12:00:00', '14:00:00', 'O', '17:00:00', '23:00:00', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_menus`
--

DROP TABLE IF EXISTS `tbl_menus`;
CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(250) NOT NULL,
  `accueil` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id_menu`, `intitule`, `accueil`) VALUES
(20, 'MENU SEMAINE', 'O'),
(19, 'MENU GASTRONOME', 'N'),
(14, 'MENU DES MILLE ET UNE NUITS', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_menusformules`
--

DROP TABLE IF EXISTS `tbl_menusformules`;
CREATE TABLE IF NOT EXISTS `tbl_menusformules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_formule` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_menusformules`
--

INSERT INTO `tbl_menusformules` (`id`, `id_menu`, `id_formule`) VALUES
(60, 14, 15),
(61, 8, 14),
(49, 14, 14),
(58, 19, 15),
(55, 20, 14),
(41, 14, 11),
(39, 12, 6),
(40, 14, 6),
(36, 19, 3),
(57, 8, 14),
(59, 19, 14),
(25, 12, 3),
(54, 14, 3),
(29, 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_mets`
--

DROP TABLE IF EXISTS `tbl_mets`;
CREATE TABLE IF NOT EXISTS `tbl_mets` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `genre` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `categorie` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `photo_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `to_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `en_ligne` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tbl_mets`
--

INSERT INTO `tbl_mets` (`id_photo`, `name`, `genre`, `categorie`, `description`, `price`, `photo_name`, `to_create`, `en_ligne`) VALUES
(1, 'crudites', 'ENTREE', '1', 'crudites', '8.90', 'ENTREE1.jpg', '2023-02-20 08:34:24', 'O'),
(2, 'cuisse de canard', 'PLAT', '2', 'cuisse de canard', '12.80', 'PLAT2.jpg', '2023-02-20 08:35:19', 'O'),
(3, 'ile flottante', 'DESSERT', '3', 'ile flottante', '7.80', 'DESSERT3.jpg', '2023-02-20 08:36:09', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_nbrcouvert`
--

DROP TABLE IF EXISTS `tbl_nbrcouvert`;
CREATE TABLE IF NOT EXISTS `tbl_nbrcouvert` (
  `id_nbcouv` int(11) NOT NULL AUTO_INCREMENT,
  `nbr_couvert` decimal(3,0) DEFAULT NULL,
  UNIQUE KEY `id_nbcouv` (`id_nbcouv`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_nbrcouvert`
--

INSERT INTO `tbl_nbrcouvert` (`id_nbcouv`, `nbr_couvert`) VALUES
(1, '20');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_resa`
--

DROP TABLE IF EXISTS `tbl_resa`;
CREATE TABLE IF NOT EXISTS `tbl_resa` (
  `id_resa` int(11) NOT NULL AUTO_INCREMENT,
  `name_resa` varchar(250) NOT NULL,
  `phone_client_resa` varchar(10) NOT NULL,
  `email_client_resa` varchar(250) NOT NULL,
  `date_resa` date NOT NULL,
  `hour_resa` time NOT NULL,
  `nbr_couvert_resa` decimal(3,0) NOT NULL,
  `coment_resa` mediumtext NOT NULL,
  PRIMARY KEY (`id_resa`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_resa`
--

INSERT INTO `tbl_resa` (`id_resa`, `name_resa`, `phone_client_resa`, `email_client_resa`, `date_resa`, `hour_resa`, `nbr_couvert_resa`, `coment_resa`) VALUES
(20, 'renÃ© d\'anjour', '0607332274', 'dg@gmail.com', '2023-03-18', '20:00:00', '1', 'RAS'),
(23, 'le groupe', '0607332274', 'dg@gmail.com', '2023-03-04', '20:30:00', '5', 'aucune'),
(24, 'didje', '0607', 'dg@gmail.com', '2023-03-09', '12:00:00', '4', 'RAS'),
(31, ' sylvie marmote', '0607546501', 'sylvie@gmail.com', '2023-02-18', '20:00:00', '2', 'allergie aux crustacÃ©s'),
(47, 'dgC', '0607332274', 'dgC@gmail.com', '2023-02-20', '19:00:00', '2', 'allergie aux moules'),
(48, 'sylvie ', '0603020107', 'sylvie@gmail.com', '2023-02-21', '12:00:00', '2', 'au gluten'),
(49, 'didier', '0607332274', 'dgogneaux@gmail.com', '2023-02-22', '19:00:00', '2', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) DEFAULT NULL,
  `passw` varchar(255) NOT NULL,
  `tel_client` varchar(10) DEFAULT NULL,
  `mail` varchar(250) NOT NULL,
  `comment_client` longtext DEFAULT NULL,
  `nbr_couvert_client` decimal(2,0) DEFAULT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `identifiant`, `passw`, `tel_client`, `mail`, `comment_client`, `nbr_couvert_client`, `role`) VALUES
(1, 'dgA', '$2y$10$n7BuHtZ718KQNHNPxydpRujwaWr18UahjAYNyfNAQ9O0K9LSzs1UG', NULL, 'dgA@gmail.com', NULL, NULL, 'A'),
(2, 'dgC', '$2y$10$HmBNVebGxqY2WbDvlf23OOOiz9H01clhyYiVzL3ARHDkhhA19AX0W', '0607332274', 'dgC@gmail.com', 'allergie aux moules', '2', 'C'),
(3, 'sylvie ', '$2y$10$Xyf52i.bSxcr69rkLvPfUO4JSkiHQgoEjyGZ7duiJ21Jx/NX9LJXS', '0603020107', 'sylvie@gmail.com', 'au gluten', '2', 'C'),
(4, 'ESSAI Final', '$2y$10$/0ulPEdVKGDYngR2Y2OmMep5R2iT4gn/lug6durFGITnfdx0iZ78K', '0607332274', 'dgogneaux@gmail.com', 'allergie au sucre', '2', 'C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
