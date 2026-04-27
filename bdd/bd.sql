-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 27 avr. 2026 à 14:08
-- Version du serveur : 11.4.2-MariaDB
-- Version de PHP : 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_projet-osc-abdm`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_ordinateurs`
--

CREATE TABLE `info_ordinateurs` (
  `id_ordinateur` int(11) NOT NULL,
  `nom_poste` varchar(20) NOT NULL,
  `OS` varchar(20) NOT NULL,
  `Ram` int(11) NOT NULL,
  `Stockage` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `info_ordinateurs`
--

INSERT INTO `info_ordinateurs` (`id_ordinateur`, `nom_poste`, `OS`, `Ram`, `Stockage`, `Role`) VALUES
(1, 'B1-DEBIAN', 'Debian 13', 4, 15, 'Client'),
(2, 'B1-W7', 'Windows 7', 8, 30, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `login`, `mdp`) VALUES
(1, 'A', 'Baptiste', 'baptiste@idk.com', 'le-b', 'baba');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info_ordinateurs`
--
ALTER TABLE `info_ordinateurs`
  ADD PRIMARY KEY (`id_ordinateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info_ordinateurs`
--
ALTER TABLE `info_ordinateurs`
  MODIFY `id_ordinateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
