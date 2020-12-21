-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 21 déc. 2020 à 09:51
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'demo-2', 'test', '2021-01-06 11:00:00', '2021-01-06 12:00:00', 1),
(53, 'a', 'a', '2021-01-04 08:00:00', '2021-01-04 09:00:00', 2),
(54, 'a', 'a', '2021-01-05 08:00:00', '2021-01-05 09:00:00', 2),
(55, 'secret', 'je veux reserver cette salle car je la trouve jolie, vive les mariés je saisd pas quoi écrire', '2021-01-05 13:00:00', '2021-01-05 14:00:00', 2),
(56, 'fdbfsrfhfh', 'gggggggggggggggggggggggggggggggggggggggggggg', '2021-01-05 09:00:00', '2021-01-05 10:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(3, 'Jean', '$2y$10$fNLBvIwLPY2RLrE8768AMus9tRpEdgY0ItSzjhec8M9h9Sr3FzPjq'),
(4, 'Roger', '$2y$10$RNrAgCOPX0EP.6jAHsrkce9PfcFjjcROjMISXtMJcsjHC/Xe3VcS.'),
(5, 'Rafael', '$2y$10$DDOiimaoCLXbXDBBKf.jKOIUyGsJVxVOmFjKpcXHSVTPxPdEEAqAm'),
(6, 'novak', '$2y$10$pnJii5z.Ejtm8u/24eBKmu2sYb6oqj9WHf./MFl8mcXhMSsEQVi3W'),
(7, 'bbbbbbbbbbbbbb', '$2y$10$4KiOu3FUNxku1jNN034lpuBafZoqhqN4SDsvLlafs2fmA9JCcX9DG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
