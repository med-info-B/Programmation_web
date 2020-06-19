-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 12 mars 2020 à 20:50
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `freelancers`
--

CREATE TABLE `freelancers` (
  `fid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `freelancers`
--

INSERT INTO `freelancers` (`fid`, `uid`, `prenom`, `nom`, `tel`, `adress`, `pays`, `ville`) VALUES
(1, 3, 'Dupont', 'Jean', '010203040506', 'créteil', 'fr', 'paris'),
(2, 4, 'Fermi', 'Enrico', '07225451832', '', 'fr', 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `login`, `mdp`, `role`) VALUES
(1, 'admin', '$2y$10$WUXmfWOTO3gf.QIwxuHH0ecG51cmEsgW5YmHbQaAHcYL6wV11GgOm', 'admin'),
(2, 'test', '$2y$10$rwE2jgPjPrw1i8DBi5xgY.aZuqV..6w9ZEFQmiYAy1G3slnJpKFVy', 'admin'),
(3, 'jdupont', '$2y$10$lyEiQXexGfSd.7YMzpHkMurB6ghYnSQqFWAr97FxDxPJPC3aZZyC6', 'user'),
(4, 'efermi', '$2y$10$YRrjhKVaaV39aZrXm2nRiuSioSKbgWrpETY33jRELIoGo/OQjh0cu', 'user'),
(5, 'rdescartes', '$2y$10$2YNN8a.4ojBUR4NPPUi4uuGkbe/Ka3gFGEa/HWClQcRFjpnELR26K', 'user'),
(6, 'bpascal', '$2y$10$/Ef1yfTzrQPRZglkw2Epl.ZuLubilM3JU0WzNvTSv81pDkI1itHRC', 'user'),
(7, 'dknuth', '$2y$10$TLsBum/NSyJwX/vxAEKJeeE20arY3ILNIHEkC3.sckNUVNtvVz5kS', 'user'),
(8, 'test2', '$2y$10$t812JaGkKeUGSPW2O217lOQ8JbzRg65U7nYH17bO.cAmC8jFf2he2', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`fid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
