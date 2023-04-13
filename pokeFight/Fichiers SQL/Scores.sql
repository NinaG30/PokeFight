-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 12 avr. 2023 à 14:08
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tutoseu`
--

-- --------------------------------------------------------

--
-- Structure de la table `Scores`
--

CREATE TABLE `Scores` (
  `id_score` int NOT NULL,
  `id_joueur` int NOT NULL,
  `id_pokemon` int NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Scores`
--

INSERT INTO `Scores` (`id_score`, `id_joueur`, `id_pokemon`, `score`) VALUES
(8, 10, 3, 0),
(9, 10, 1, 3),
(10, 10, 1, 0),
(11, 10, 1, 3),
(12, 10, 8, 0),
(13, 10, 18, 0),
(14, 12, 14, 3),
(15, 12, 13, 3),
(16, 11, 17, 0),
(17, 10, 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Scores`
--
ALTER TABLE `Scores`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `idJ` (`id_joueur`),
  ADD KEY `idP` (`id_pokemon`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Scores`
--
ALTER TABLE `Scores`
  MODIFY `id_score` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
