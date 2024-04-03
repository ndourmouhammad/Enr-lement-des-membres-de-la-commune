-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 03 avr. 2024 à 18:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `commune`
--

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE `quartier` (
  `id` int(11) NOT NULL,
  `libelle_q` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quartier`
--

INSERT INTO `quartier` (`id`, `libelle_q`) VALUES
(1, 'cité Keur Damel'),
(2, 'cité Keur Gorgui'),
(3, 'cité Mixta'),
(4, 'Résidence de la Paix'),
(5, 'Village Grand Médine'),
(6, 'cité de la Patte d\'Oie'),
(7, 'cité des Impôts et de Domaines'),
(8, ' Patte d\'oie Builders'),
(9, 'cité Al Amal'),
(10, 'cité Bceao'),
(11, 'cité Soprim'),
(12, 'cité Soprim-Extension');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `quartier`
--
ALTER TABLE `quartier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
