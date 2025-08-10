-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 août 2025 à 22:34
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nocibe_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `email`, `password`, `token`) VALUES
(1, 'Maurel', 'logbomaurel@gmail.com', '$2y$10$5tU4dGuwkYCJ9IDE/ADE6.m7VbIASJwSksYir61AIVa4JNYPZvV52', 'ebbabe24bc9e763512c9c63be6f9d561d311bc6cf5e7f6c700f7b071f2905c9c29672c300b08499738a066827f549d44613bdbee5c91dfc51146ccd9ecb1e27f'),
(2, 'Admin', 'admin@nocibe.com', '$2y$10$9d7LnA7/GUIlkvl1lK9t4exiDAHsnEc9zcYhorPsq/8peqP0C/F1C', '7ae884b133f03d2f56afd2a6392ce34c10c9426bb01b7bb93a0a31e91277543c29555d1653bbeb62f24ecae6ac45f9f751b44173d11d5d71d7dafcab63a0b18c'),
(11, 'Administrateur Principal', 'admin2@nocibe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(50) NOT NULL,
  `nom_dep` varchar(255) NOT NULL,
  `date_enregistrement` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom_dep`, `date_enregistrement`) VALUES
(1, 'sdfghj', '2025-08-09'),
(2, 'sdfghj', '2025-08-09'),
(3, 'sdfghj', '2025-08-09'),
(4, 'GEI', '2025-08-10'),
(5, 'Génie Civil', '2025-08-10'),
(6, 'Génie Electrique', '2025-08-10'),
(9, 'logbo', '2025-08-10'),
(10, 'logbo', '2025-08-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `droit` varchar(255) NOT NULL,
  `date_enregistrement` date NOT NULL DEFAULT current_timestamp(),
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom_complet`, `email`, `password`, `departement`, `poste`, `droit`, `date_enregistrement`, `heure`) VALUES
(1, 'KONNON Abel', 'dondiegue21@gmail.com', '', 'Génie Electrique', 'Directeur Général', 'validation', '2025-08-10', '21:16:15'),
(2, 'KONNON Abel', 'dondiegue21@gmail.com', '', 'Génie Electrique', 'Directeur Général', 'edite', '2025-08-10', '21:17:27'),
(3, 'HOUNDOKINNOU Diègue', 'dondiegue21@gmail.com', '', 'GEI', 'PDG', 'tous', '2025-08-10', '21:21:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
