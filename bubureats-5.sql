-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 28 jan. 2021 à 23:58
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
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(254) NOT NULL DEFAULT 'publiee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `id_client`, `id_restaurant`, `message`, `date_publication`, `statut`) VALUES
(1, 19, 4, 'Super bon lac pizza ananas huîtres nn jrigole.', '2021-01-28 14:36:48', 'publiee');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `plats` text NOT NULL,
  `nombre_plats` int(11) NOT NULL,
  `total_ht` float NOT NULL,
  `montant_commission` float DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `plats`, `nombre_plats`, `total_ht`, `montant_commission`, `id_client`, `id_restaurant`, `date_commande`, `statut`) VALUES
(1, '{\"3\":{\"id\":\"3\",\"nom\":\"Burger v\\u00e9g\\u00e9tarien\",\"photo\":\"img\\/burger.jpg\",\"prix\":\"9\",\"tags\":\"fast-food,traditionnel\",\"id_restaurant\":\"2\",\"quantite\":2}}', 2, 18, 2.5, 19, 2, '2021-01-27 18:55:54', 'terminee'),
(2, '{\"2\":{\"id\":\"2\",\"nom\":\"P\\u00e2tes bolognaise\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"12\",\"tags\":\"italien,p\\u00e2tes\",\"id_restaurant\":\"1\",\"quantite\":\"1\"}}', 1, 12, 2.5, 19, 1, '2021-01-27 18:58:47', 'terminee'),
(3, '{\"4\":{\"id\":\"4\",\"nom\":\"Tapas\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"11\",\"tags\":\"tex-mex,fast-food,mexicain\",\"id_restaurant\":\"3\",\"quantite\":4}}', 4, 44, 2.5, 19, 3, '2021-01-27 19:25:07', 'enlivraison'),
(4, '{\"7\":{\"id\":\"7\",\"nom\":\"P\\u00e2tes carbonara\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"10\",\"tags\":\"italien,p\\u00e2tes\",\"id_restaurant\":\"4\",\"quantite\":\"1\"},\"8\":{\"id\":\"8\",\"nom\":\"Burger v\\u00e9g\\u00e9tarien\",\"photo\":\"img\\/burger.jpg\",\"prix\":\"9\",\"tags\":\"fast-food,traditionnel\",\"id_restaurant\":\"4\",\"quantite\":\"1\"}}', 2, 19, 2.5, 19, 4, '2021-01-27 19:44:44', 'enpreparation'),
(5, '{\"2\":{\"id\":\"2\",\"nom\":\"P\\u00e2tes bolognaise\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"12\",\"tags\":\"italien,p\\u00e2tes\",\"id_restaurant\":\"1\",\"quantite\":\"1\"}}', 1, 12, 2.5, 19, 1, '2021-01-27 20:23:15', 'atraiter'),
(6, '{\"7\":{\"id\":\"7\",\"nom\":\"P\\u00e2tes carbonara\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"10\",\"tags\":\"italien,p\\u00e2tes\",\"id_restaurant\":\"4\",\"nb_votes\":\"546\",\"cumul_notes\":\"876\",\"quantite\":3}}', 3, 30, 4.65, 108, 4, '2021-01-28 14:50:26', 'atraiter'),
(7, '{\"6\":{\"id\":\"6\",\"nom\":\"Pizza ananas et huitres\",\"photo\":\"img\\/pizza.jpg\",\"prix\":\"12\",\"tags\":\"italien,d\\u00e9gueu\",\"id_restaurant\":\"4\",\"nb_votes\":\"7\",\"cumul_notes\":\"7\",\"quantite\":2},\"9\":{\"id\":\"9\",\"nom\":\"P\\u00e2tes bolognaise\",\"photo\":\"img\\/pates.jpg\",\"prix\":\"12\",\"tags\":\"italien,p\\u00e2tes\",\"id_restaurant\":\"4\",\"nb_votes\":\"8888\",\"cumul_notes\":\"40000\",\"quantite\":\"1\"}}', 3, 36, 3, 19, 4, '2021-01-28 17:27:04', 'atraiter');

-- --------------------------------------------------------

--
-- Structure de la table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `temps_livraison` int(3) NOT NULL DEFAULT '60',
  `montant_commission` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `configuration`
--

INSERT INTO `configuration` (`id`, `temps_livraison`, `montant_commission`) VALUES
(1, 192, 3);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(254) CHARACTER SET utf8 NOT NULL,
  `motdepasse` text NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `solde` float NOT NULL,
  `role` varchar(254) NOT NULL,
  `id_restaurant` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `mail`, `motdepasse`, `adresse`, `solde`, `role`, `id_restaurant`) VALUES
(19, 'Restaurateur', 'Restaurateur', 'restaurateur@bubureats.fr', '53895e49bfaadb9e6648eaf7da328ad6863a77b7', '1 rue du restaurant, 76000 Rouen', 864, 'restaurateur', NULL),
(20, 'Hoizey', 'Evan', 'evan@fleury-michon.fr', '11aa6adc773482bc4b95bffb2e9372fbc6310419', '1B rue de la Gare 76250 Déville-les-Rouen', 18.78, 'admin', NULL),
(103, 'Ratatata', 'Ritah', 'jeandujardin@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'paris. plage', 8800, 'restaurateur', NULL),
(106, 'bonjour', 'bonjour', 'tt@mail.fr', 'a', 'bojnou', 567, 'restaurateur', NULL),
(107, 'ezf', 'aef', 'rr@rr.rr', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'adresse, 90888 ville', 0, 'restaurateur', NULL),
(108, 'Client', 'Client', 'client@bubureats.fr', 'd2a04d71301a8915217dd5faf81d12cffd6cd958', '1 rue du client, 76000 Rouen', 0.25, 'client', NULL),
(109, 'DuGuesclin', 'Anselme', 'adg@test.fr', '395a7d33bec8475c9b83b7d440f141bcbd994aa5', '10 rue de l\'avenue, 56045 Gredinville', 0, 'restaurateur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `id_plat` int(5) NOT NULL,
  `id_client` int(5) NOT NULL,
  `note` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `id_plat`, `id_client`, `note`) VALUES
(13, 7, 108, 2);

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
  `prix` float DEFAULT NULL,
  `tags` text,
  `id_restaurant` int(3) NOT NULL,
  `nb_votes` int(5) NOT NULL DEFAULT '0',
  `cumul_notes` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `photo`, `prix`, `tags`, `id_restaurant`, `nb_votes`, `cumul_notes`) VALUES
(2, 'Pâtes bolognaise', 'img/pates.jpg', 12, 'italien,pâtes', 1, 0, 0),
(3, 'Burger végétarien', 'img/burger.jpg', 9, 'fast-food,traditionnel', 2, 0, 0),
(4, 'Tapas', 'img/pates.jpg', 11, 'tex-mex,fast-food,mexicain', 3, 0, 0),
(5, 'Quiche lorraine', 'img/pizza.jpg', 8, 'Traditionnel,lorrain', 4, 5, 18),
(6, 'Pizza ananas et huitres', 'img/pizza.jpg', 12, 'italien,dégueu', 4, 7, 7),
(7, 'Pâtes carbonara', 'img/pates.jpg', 10, 'italien,pâtes', 4, 551, 887),
(8, 'Burger végétarien', 'img/burger.jpg', 9, 'fast-food,traditionnel', 4, 2, 10),
(9, 'Pâtes bolognaise', 'img/pates.jpg', 12, 'italien,pâtes', 4, 8888, 40000),
(12, 'Pomme', NULL, 45, 'pomme, poire', 2, 0, 0),
(17, 'Tapas', 'img/pates.jpg', 11, 'tex-mex,fast-food,mexicain', 1, 0, 0),
(18, 'bonjoures', NULL, 12, 'paratate', 1, 0, 0),
(21, 'oui', NULL, 2, 'pachr', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(3) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `photo` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tags` text,
  `description` text,
  `ville` varchar(254) DEFAULT NULL,
  `id_restaurateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`id`, `nom`, `photo`, `email`, `tags`, `description`, `ville`, `id_restaurateur`) VALUES
(1, 'Le rat-goûtu', 'img/re01.jpg', 'ratgoutu@wanadoo.fr', 'exotique, traditionnel', 'bonjour', 'Rouen', 19),
(2, 'Chez Mimile', 'img/re02.jpg', 'mimile@gmail.com', 'burgers, rapide', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, dolorem quia! Voluptatibus totam repudiandae atque tenetur sint nulla impedit vitae obcaecati quam necessitatibus quis ducimus quidem unde, id dolores adipisci.', 'Déville', NULL),
(3, 'La taverne', 'img/re03.jpg', 'contact@lataverne.fr', 'traditionnel', NULL, 'Rouen', NULL),
(4, 'La marmite', 'img/re01.jpg', 'marmite@miam.fr', 'burgers,tapas', NULL, 'Sotteville-lès-Rouen', NULL),
(6, 'Bonjour', 'diagonale.jpg', 'restaurateur@bubureats.fr', 'pomme, poire', 'je suis le restaurant magique', 'Beynes', 19),
(9, 'Hoizey sto', NULL, 'hoizey.e@gmail.com', '', '', '', 109);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
