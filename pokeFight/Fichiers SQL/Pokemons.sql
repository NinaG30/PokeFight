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
-- Structure de la table `Pokemons`
--

CREATE TABLE `Pokemons` (
  `id_pokemon` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `PV` int NOT NULL,
  `PC` int NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Pokemons`
--

INSERT INTO `Pokemons` (`id_pokemon`, `nom`, `PV`, `PC`, `Type`) VALUES
(1, 'Pikachu', 40, 10, 'ELECTRIK'),
(2, 'Carapuce', 40, 10, 'EAU'),
(3, 'Salameche', 40, 10, 'FEU'),
(4, 'Bulbizarre', 40, 10, 'PLANTE'),
(5, 'Goupix', 100, 15, 'FEU'),
(6, 'Mystherbe', 60, 25, 'PLANTE'),
(7, 'Psykokwak', 120, 10, 'EAU'),
(8, 'Caninos', 150, 15, 'FEU'),
(9, 'Ptitard', 80, 30, 'EAU'),
(10, 'Chétiflor', 60, 10, 'PLANTE'),
(11, 'Ponyta', 70, 15, 'FEU'),
(12, 'Ramoloss', 140, 10, 'EAU'),
(13, 'Lamantine', 40, 50, 'EAU'),
(14, 'Pyroli', 90, 15, 'FEU'),
(15, 'Rafflesia', 180, 10, 'PLANTE'),
(16, 'Noeunoeuf', 230, 5, 'PLANTE'),
(17, 'Electhor', 130, 15, 'ELECTRIK'),
(18, 'Voltali', 80, 20, 'ELECTRIK'),
(19, 'Élektek', 70, 20, 'ELECTRIK'),
(20, 'Electrode', 45, 35, 'ELECTRIK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Pokemons`
--
ALTER TABLE `Pokemons`
  ADD PRIMARY KEY (`id_pokemon`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Pokemons`
--
ALTER TABLE `Pokemons`
  MODIFY `id_pokemon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
