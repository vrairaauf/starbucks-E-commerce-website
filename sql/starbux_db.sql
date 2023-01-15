-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 déc. 2022 à 10:26
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `starbux`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `family_name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '2022-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `coffee`
--

CREATE TABLE `coffee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `currency` varchar(5) NOT NULL DEFAULT 'TND'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coffee`
--

INSERT INTO `coffee` (`id`, `name`, `libelle`, `image_name`, `price`, `currency`) VALUES
(7, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'image/starbux4.jpg', 12.3, 'TND'),
(8, 'Lorem ipsum dolor', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat\r\n  ', 'image/starbux11.jpg', 10, 'TND'),
(9, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux12.jpg', 15.3, 'TND'),
(10, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux15.jpg', 9.75, 'TND'),
(11, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux16.jpg', 12, 'TND'),
(12, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux16.jpg', 10, 'TND'),
(13, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux16.jpg', 10, 'TND'),
(14, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux16.jpg', 10, 'TND'),
(15, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux17.jpg', 16, 'TND'),
(16, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux18.jpg', 15.5, 'TND'),
(17, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux19.jpg', 12.66, 'TND'),
(18, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux20.jpg', 13.3, 'TND'),
(19, 'Lorem ipsum dolor', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'image/starbux21.jpg', 15.6, 'TND');

-- --------------------------------------------------------

--
-- Structure de la table `coffee_per_commande`
--

CREATE TABLE `coffee_per_commande` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `coffee_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coffee_per_commande`
--

INSERT INTO `coffee_per_commande` (`id`, `quantity`, `coffee_id`, `commande_id`) VALUES
(11, 2, 8, 6),
(12, 1, 11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `delivred` varchar(5) NOT NULL DEFAULT 'non',
  `delivred_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `delivred_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `customer_id`, `price`, `delivred`, `delivred_by`, `created_at`, `delivred_at`) VALUES
(6, 1, 32, 'oui', 1, '2022-12-20 10:12:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `family_name`, `email`, `password`, `city`, `adress`, `zip_code`, `created_at`) VALUES
(1, 'raouf', 'abidi', 'raoufabidi@gmail.com', 'azerty1234', 'manouba', 'manouba manouba tunis', '12345', '2022-12-19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coffee_per_commande`
--
ALTER TABLE `coffee_per_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coffee_id` (`coffee_id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `delivred_by` (`delivred_by`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `coffee_per_commande`
--
ALTER TABLE `coffee_per_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coffee_per_commande`
--
ALTER TABLE `coffee_per_commande`
  ADD CONSTRAINT `coffee_per_commande_ibfk_1` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`id`),
  ADD CONSTRAINT `coffee_per_commande_ibfk_2` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`delivred_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
