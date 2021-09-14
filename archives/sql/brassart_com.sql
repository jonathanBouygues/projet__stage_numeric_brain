-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 06 août 2020 à 16:57
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `brassart_com`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `acc_id` tinyint(3) UNSIGNED NOT NULL,
  `acc_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_droit` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `acc_prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`acc_id`, `acc_email`, `acc_mdp`, `acc_droit`, `acc_prenom`, `acc_nom`) VALUES
(1, 'p.bocquillon@brassart.fr', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1', 'pascal', 'bocquillon'),
(2, 'p.bocquillon@brassart.fr', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', '2', 'pascal', 'bocquillon');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`acc_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acces`
--
ALTER TABLE `acces`
  MODIFY `acc_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
