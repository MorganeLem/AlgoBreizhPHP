-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 jan. 2019 à 11:24
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

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

CREATE TABLE `articles` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` smallint(6) NOT NULL,
  `family` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `customers` (
  `id` smallint(6) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `customer_code` varchar(50) NOT NULL,
  `Statut` enum('Clients','Téléprospecteur') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `customer_code`, `Statut`, `email`, `password`) VALUES
(1, 'Morgane', 'Lemarchand', 'mlmalgob', 'Clients', 'morgane.lemarchand@outlook.fr', 'passmlm'),
(2, 'Mat', 'Lope', '1234', 'Clients', 'morgane.lemarchand-90@laposte.net', NULL),
(3, 'Mat', 'Lope', '789', 'Clients', 'mat@lope.fr', '78799'),
(11, 'Quentin', 'Laduree', '2', 'Téléprospecteur', 'qladuree@gmail.com', 'testmdp'),
(12, 'Stéphanie', 'Le Fort', 'C0002', 'Clients', 'slf1307@gmail.com', 'stephanie15'),
(13, 'Laurent', 'Fouques', '123456', 'Clients', 'lolo@gmail.com', '53712');

-- --------------------------------------------------------

--
-- Structure de la table `saleslines`
--

CREATE TABLE `saleslines` (
  `id` smallint(6) NOT NULL,
  `id_sale` smallint(6) NOT NULL,
  `id_article` smallint(6) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `Prix_Ligne` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(16, 14, 2, 1, 7),
(17, 16, 1, 6, 30),
(18, 16, 2, 2, 14),
(19, 16, 6, 2, 14),
(20, 17, 2, 5, 35),
(21, 17, 4, 25, 100),
(22, 17, 6, 10, 70),
(23, 18, 1, 1, 5),
(24, 19, 3, 1, 6),
(25, 20, 5, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `salestable`
--

CREATE TABLE `salestable` (
  `id` smallint(6) NOT NULL,
  `id_customer` smallint(6) NOT NULL,
  `traitement` enum('Non','Oui') NOT NULL DEFAULT 'Non',
  `price` int(11) NOT NULL,
  `etats` enum('Commande','Facture') NOT NULL DEFAULT 'Commande',
  `date_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salestable`
--

INSERT INTO `salestable` (`id`, `id_customer`, `traitement`, `price`, `etats`, `date_purchase`) VALUES
(1, 1, 'Non', 1062, 'Commande', '2018-12-05 18:57:07'),
(2, 1, 'Non', 1373, 'Commande', '2018-12-05 19:00:11'),
(3, 1, 'Non', 0, 'Commande', '2018-12-05 19:05:53'),
(4, 1, 'Non', 0, 'Commande', '2018-12-05 19:06:59'),
(5, 1, 'Non', 0, 'Facture', '2018-12-05 19:10:13'),
(6, 1, 'Non', 14, 'Facture', '2018-12-05 19:23:53'),
(7, 1, 'Non', 14, 'Facture', '2018-12-05 19:25:07'),
(8, 1, 'Non', 14, 'Facture', '2018-12-05 19:25:11'),
(9, 1, 'Non', 35, 'Facture', '2018-12-05 19:27:16'),
(10, 1, 'Non', 35, 'Facture', '2018-12-05 19:28:57'),
(11, 1, 'Non', 11, 'Facture', '2018-12-05 20:01:53'),
(12, 1, 'Non', 6, 'Facture', '2018-12-05 20:22:41'),
(13, 1, 'Non', 7, 'Facture', '2018-12-05 20:26:08'),
(14, 1, 'Non', 7, 'Facture', '2018-12-05 20:27:43'),
(15, 1, 'Non', 0, 'Facture', '2018-12-05 20:30:05'),
(16, 1, 'Non', 58, 'Facture', '2018-12-21 14:07:50'),
(17, 1, 'Non', 205, 'Facture', '2018-12-24 15:29:02'),
(18, 11, 'Non', 5, 'Commande', '2019-01-10 12:09:02'),
(19, 11, 'Non', 6, 'Facture', '2019-01-10 12:09:05'),
(20, 11, 'Non', 10, 'Facture', '2019-01-10 12:09:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_code` (`customer_code`);

--
-- Index pour la table `saleslines`
--
ALTER TABLE `saleslines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_sale` (`id_sale`);

--
-- Index pour la table `salestable`
--
ALTER TABLE `salestable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `saleslines`
--
ALTER TABLE `saleslines`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `salestable`
--
ALTER TABLE `salestable`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
