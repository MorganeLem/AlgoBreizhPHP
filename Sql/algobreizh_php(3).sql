-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 déc. 2018 à 08:42
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `algobreizh_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` smallint(6) NOT NULL,
  `family` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `price`, `family`) VALUES
(1, 'Soupe de topinambours aux algues', 5, 'wakamé'),
(2, 'Salade de wakamé au tofu', 7, 'wakamé'),
(3, 'Nouilles, spaghettis de mer, carottes', 6, 'Spaghetti de mer'),
(4, 'Purée à la dulse', 4, 'dulse'),
(5, 'Cake au citron à la laitue de mer', 10, 'laitue de mer'),
(6, 'Chips de kelp', 7, 'kelp');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `customer_code` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_code` (`customer_code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `customer_code`, `email`, `password`) VALUES
(1, 'Morgane', 'Lemarchand', 'mlmalgob', 'morgane.lemarchand@outlook.fr', 'passmlm'),
(2, 'Mat', 'Lope', '1234', 'morgane.lemarchand-90@laposte.net', NULL),
(3, 'Mat', 'Lope', '789', 'mat@lope.fr', '78799'),
(11, 'Quentin', 'Laduree', '2', 'qladuree@gmail.com', 'testmdp'),
(12, 'Stéphanie', 'Le Fort', 'C0002', 'slf1307@gmail.com', 'stephanie15'),
(13, 'Laurent', 'Fouques', '123456', 'lolo@gmail.com', '53712');

-- --------------------------------------------------------

--
-- Structure de la table `saleslines`
--

DROP TABLE IF EXISTS `saleslines`;
CREATE TABLE IF NOT EXISTS `saleslines` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_sale` smallint(6) NOT NULL,
  `id_article` smallint(6) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `Prix_Ligne` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  KEY `id_sale` (`id_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `saleslines`
--

INSERT INTO `saleslines` (`id`, `id_sale`, `id_article`, `quantity`, `Prix_Ligne`) VALUES
(1, 1, 1, 200, 1000),
(2, 1, 2, 2, 14),
(3, 1, 3, 8, 48),
(4, 2, 1, 150, 750),
(5, 2, 2, 65, 455),
(6, 2, 3, 28, 168),
(7, 6, 2, 2, 14),
(8, 7, 2, 2, 14),
(9, 8, 2, 2, 14),
(10, 9, 2, 5, 35),
(11, 10, 2, 5, 35),
(12, 11, 1, 1, 5),
(13, 11, 3, 1, 6),
(14, 12, 3, 1, 6),
(15, 13, 2, 1, 7),
(16, 14, 2, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `salestable`
--

DROP TABLE IF EXISTS `salestable`;
CREATE TABLE IF NOT EXISTS `salestable` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_customer` smallint(6) NOT NULL,
  `traitement` enum('Non','Oui') NOT NULL DEFAULT 'Non',
  `price` int(11) NOT NULL,
  `etats` enum('Commande','Facture') NOT NULL DEFAULT 'Commande',
  `date_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salestable`
--

INSERT INTO `salestable` (`id`, `id_customer`, `traitement`, `price`, `etats`, `date_purchase`) VALUES
(1, 1, 'Non', 1062, 'Commande', '2018-12-05 18:57:07'),
(2, 1, 'Non', 1373, 'Commande', '2018-12-05 19:00:11'),
(3, 1, 'Non', 0, 'Commande', '2018-12-05 19:05:53'),
(4, 1, 'Non', 0, 'Commande', '2018-12-05 19:06:59'),
(5, 1, 'Non', 0, 'Commande', '2018-12-05 19:10:13'),
(6, 1, 'Non', 14, 'Commande', '2018-12-05 19:23:53'),
(7, 1, 'Non', 14, 'Commande', '2018-12-05 19:25:07'),
(8, 1, 'Non', 14, 'Commande', '2018-12-05 19:25:11'),
(9, 1, 'Non', 35, 'Commande', '2018-12-05 19:27:16'),
(10, 1, 'Non', 35, 'Commande', '2018-12-05 19:28:57'),
(11, 1, 'Non', 11, 'Commande', '2018-12-05 20:01:53'),
(12, 1, 'Non', 6, 'Commande', '2018-12-05 20:22:41'),
(13, 1, 'Non', 7, 'Commande', '2018-12-05 20:26:08'),
(14, 1, 'Non', 7, 'Commande', '2018-12-05 20:27:43'),
(15, 1, 'Non', 0, 'Commande', '2018-12-05 20:30:05');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `saleslines`
--
ALTER TABLE `saleslines`
  ADD CONSTRAINT `saleslines_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `saleslines_ibfk_2` FOREIGN KEY (`id_sale`) REFERENCES `salestable` (`id`);

--
-- Contraintes pour la table `salestable`
--
ALTER TABLE `salestable`
  ADD CONSTRAINT `salestable_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
