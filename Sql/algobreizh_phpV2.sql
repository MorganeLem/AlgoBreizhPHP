-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 29 nov. 2018 à 10:24
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
  `familly` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `price`, `familly`) VALUES
(1, 'Soupe de topinambours aux algues', 5, 'wakamé'),
(2, 'Salade de wakamé au tofu', 7, 'wakamé'),
(3, 'Spaghetti de mer à la sauce tomate', 6, 'Spaghetti de mer'),
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
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `customer_code`, `email`, `password`) VALUES
(1, 'Morgane', 'Lemarchand', 'mlmalgob', 'morgane.lemarchand@outlook.fr', 'passmlm'),
(2, 'Mat', 'Lope', '1234', 'morgane.lemarchand-90@laposte.net', NULL),
(3, NULL, NULL, '789', NULL, NULL),
(11, 'Quentin', 'Laduree', '2', 'qladuree@gmail.com', 'testmdp'),
(12, 'Stéphanie', 'Le Fort', 'C0002', 'slf1307@gmail.com', 'stephanie15');

-- --------------------------------------------------------

--
-- Structure de la table `saleslines`
--

CREATE TABLE `saleslines` (
  `id` smallint(6) NOT NULL,
  `id_sale` smallint(6) NOT NULL,
  `id_article` smallint(6) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `Prix_Ligne` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `saleslines`
--

INSERT INTO `saleslines` (`id`, `id_sale`, `id_article`, `quantity`, `Prix_Ligne`) VALUES
(1, 220, 3, 10, 0),
(2, 220, 2, 25, 0);

-- --------------------------------------------------------

--
-- Structure de la table `salestable`
--

CREATE TABLE `salestable` (
  `id` smallint(6) NOT NULL,
  `id_customer` smallint(6) NOT NULL,
  `traitement` enum('Non','Oui') NOT NULL DEFAULT 'Non',
  `etats` enum('Commande','Facture') NOT NULL DEFAULT 'Commande',
  `date_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salestable`
--

INSERT INTO `salestable` (`id`, `id_customer`, `traitement`, `etats`, `date_purchase`) VALUES
(1, 1, 'Non', 'Commande', '2018-11-12 21:19:19'),
(2, 1, 'Oui', 'Commande', '2018-11-28 15:06:35'),
(3, 1, 'Non', 'Commande', '2018-11-28 15:06:38'),
(200, 1, 'Oui', 'Facture', '2018-11-28 16:04:29'),
(201, 11, 'Non', 'Commande', '2018-11-28 16:07:39'),
(202, 1, 'Non', 'Commande', '2018-11-28 16:20:57'),
(203, 1, 'Non', 'Commande', '2018-11-28 16:20:57'),
(204, 1, 'Non', 'Commande', '2018-11-28 16:20:59'),
(205, 1, 'Non', 'Commande', '2018-11-28 16:20:59'),
(206, 1, 'Non', 'Commande', '2018-11-28 16:22:07'),
(207, 1, 'Non', 'Commande', '2018-11-28 16:22:09'),
(208, 1, 'Non', 'Commande', '2018-11-28 16:22:18'),
(209, 1, 'Non', 'Commande', '2018-11-28 16:22:21'),
(210, 1, 'Non', 'Commande', '2018-11-28 16:22:38'),
(211, 1, 'Non', 'Commande', '2018-11-28 16:22:42'),
(212, 1, 'Non', 'Commande', '2018-11-28 16:23:10'),
(213, 1, 'Non', 'Commande', '2018-11-28 16:23:15'),
(214, 1, 'Non', 'Commande', '2018-11-28 16:23:20'),
(215, 1, 'Non', 'Commande', '2018-11-28 16:23:22'),
(216, 1, 'Non', 'Commande', '2018-11-28 16:23:24'),
(217, 1, 'Non', 'Commande', '2018-11-28 16:23:26'),
(218, 1, 'Non', 'Commande', '2018-11-28 16:23:28'),
(219, 1, 'Non', 'Commande', '2018-11-28 16:23:30'),
(220, 1, 'Non', 'Commande', '2018-11-28 16:23:32');

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
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `saleslines`
--
ALTER TABLE `saleslines`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salestable`
--
ALTER TABLE `salestable`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

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
