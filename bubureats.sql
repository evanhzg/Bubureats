-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 23 jan. 2021 à 11:03
-- Version du serveur :  10.1.38-MariaDB
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
-- Base de données :  `bubureats`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`) VALUES
(1, 'homepage', 'BUBUR Eats - Miam-Miam', 'Page d\'accueil'),
(2, 'homepage', 'BUBUR Eats - Miam-Miam', 'Page d\'accueil'),
(3, '', '', NULL),
(4, 'restaurants', 'BUBUR Eats - Liste des restaurants', 'Liste des restaurants selon les tags choisis'),
(5, '', '', NULL),
(6, 'restaurants', 'BUBUR Eats - Liste des restaurants', 'Liste des restaurants selon les tags choisis'),
(7, 'restaurant', 'BUBUR Eats - Page du restaurant', 'Menu du restaurant'),
(8, 'restaurant', 'BUBUR Eats - Page du restaurant', 'Menu du restaurant');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) NOT NULL,
  `photo` varchar(254) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `tags` text,
  `id_restaurant` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `photo`, `prix`, `tags`, `id_restaurant`) VALUES
(1, 'Pâtes carbonara', NULL, 10, 'italien,pâtes', 1),
(2, 'Pâtes bolognaise', NULL, 12, 'italien,pâtes', 1),
(3, 'Burger végétarien', NULL, 9, 'fast-food,traditionnel', 2),
(4, 'Tapas', NULL, 11, 'tex-mex,fast-food,mexicain', 3),
(5, 'Quiche lorraine', NULL, 8, 'Traditionnel,lorrain', 4),
(6, 'Pizza ananas et huitres', NULL, 12, 'italien,dégueu', 4);

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(3) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `logo` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tags` text,
  `description` text,
  `ville` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`id`, `nom`, `logo`, `email`, `tags`, `description`, `ville`) VALUES
(1, 'Le rat-goûtu', NULL, 'ratgoutu@wanadoo.fr', 'exotique, traditionnel', NULL, 'Rouen'),
(2, 'Chez Mimile', NULL, 'mimile@gmail.com', 'burgers, rapide', NULL, 'Déville'),
(3, 'La taverne', NULL, 'contact@lataverne.fr', 'traditionnel', NULL, 'Rouen'),
(4, 'La marmite', NULL, 'marmite@miam.fr', 'burgers,tapas', NULL, 'Sotteville-lès-Rouen');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
