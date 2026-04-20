-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 avr. 2026 à 06:21
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
-- Base de données : `lagonjobs`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE `candidatures` (
  `Id` int(11) NOT NULL,
  `MessageMotivation` text NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Courriel` varchar(50) NOT NULL,
  `Adresse` varchar(150) NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `Tel` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidatures`
--

INSERT INTO `candidatures` (`Id`, `MessageMotivation`, `Nom`, `Prenom`, `Courriel`, `Adresse`, `CodePostal`, `Tel`) VALUES
(1, 'dghffghfgfjjggfjfg', 'MAHAVITENY', 'Azaly', 'azaly@gmail.com', '5 Rue Château rouge', 97600, 639521476);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `Id` int(11) NOT NULL,
  `NomCategorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id`, `NomCategorie`) VALUES
(1, 'Informatique'),
(2, 'Automobile');

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `Id` int(11) NOT NULL,
  `TypeContrat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`Id`, `TypeContrat`) VALUES
(1, 'Stage'),
(2, 'CDD'),
(3, 'CDI');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sujet` varchar(50) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`Id`, `Nom`, `Prenom`, `Email`, `Sujet`, `Message`) VALUES
(1, 'ABDOU', 'Rahama', 'abrahama@gmail.com', 'Beug sur une offre.', 'uhuediugvuhiu jdfujdgh dgdgdhg dghdgh.'),
(2, 'Pou', 'Tou', 'pouou@gmail.com', 'Connexion ', 'Je n\'arrive pas à me connecter sur le site.');

-- --------------------------------------------------------

--
-- Structure de la table `modetravail`
--

CREATE TABLE `modetravail` (
  `Id` int(11) NOT NULL,
  `NomModeTravail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modetravail`
--

INSERT INTO `modetravail` (`Id`, `NomModeTravail`) VALUES
(1, 'Bureau'),
(2, 'Télétravail');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Profil` varchar(100) NOT NULL,
  `Missions` varchar(100) NOT NULL,
  `Id_Ville` int(11) NOT NULL,
  `Id_Categorie` int(11) NOT NULL,
  `Id_Contrats` int(11) NOT NULL,
  `Id_ModeTravail` int(11) NOT NULL,
  `Id_Statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`Id`, `Titre`, `Description`, `Profil`, `Missions`, `Id_Ville`, `Id_Categorie`, `Id_Contrats`, `Id_ModeTravail`, `Id_Statut`) VALUES
(7, 'Développeur Web Junior', 'Participation au développement de sites web modernes.', 'Motivé, curieux, bases en HTML/CSS/JS.', 'Développer, corriger, améliorer des fonctionnalités.', 1, 1, 2, 1, 1),
(8, 'Assistant RH', 'Support administratif et gestion du personnel.', 'Organisé, à l’aise avec les outils bureautiques.', 'Gestion des dossiers, suivi des recrutements.', 2, 1, 1, 2, 1),
(9, 'Commercial Terrain', 'Prospection et fidélisation clients.', 'Bon relationnel, autonome.', 'Visites clients, reporting, négociation.', 1, 1, 3, 1, 1),
(10, 'Graphiste', 'Création de visuels pour supports digitaux et print.', 'Créatif, maîtrise de Photoshop/Illustrator.', 'Création d’affiches, logos, bannières.', 2, 1, 1, 2, 1),
(11, 'Technicien Support', 'Assistance informatique niveau 1 et 2.', 'Calme, logique, bonnes bases réseau.', 'Résolution incidents, installation matériel.', 1, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `NomRole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id`, `NomRole`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `Id` int(11) NOT NULL,
  `NomStatut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`Id`, `NomStatut`) VALUES
(1, 'Publiéé'),
(2, 'Brouillon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Id_Role` int(11) NOT NULL,
  `Bloque` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id`, `Nom`, `Prenom`, `Mail`, `Password`, `Id_Role`, `Bloque`) VALUES
(50, 'MAha', 'Azaly', 'azaly@gmail.com', '$2y$10$q7eO7IOXFfCfkVOmzhVh8.Dl4MRn1TZCHicTyNOxW5pBrUUy/SvJi', 1, 0),
(51, 'ABdou', 'Alane', 'alane@gmail.com', '$2y$10$mkBMmi/IHx5yqhXrPBIfr.nZyBFr8FzmzdqGM6KVX5AWQddF5CNMO', 2, 0),
(52, 'Fayadhui', 'Nassur', 'nassur@gmail.com', '$2y$10$u.vL8WJfblST2YKoFxlOv.Y9GeraBunEFge0NG8EJJgODwXuhwCxW', 2, 0),
(53, 'Starco', 'dzibui', 'dzibui@gmail.com', '$2y$10$OVrGe2.TGSeYxVmw7AOFh.ioC1BlyRJbKFl3.WcGrD9nP9LiuE9Xi', 0, 0),
(54, 'Starco', 'dzibui', 'dzibui@gmail.com', '$2y$10$c/l05paDiDlUfKH/NB8.s.f2tI9K2V9C1uxXlb5/lifTtorF7RwWu', 0, 0),
(55, 'Starco', 'dzibui', 'dzibui@gmail.com', '$2y$10$L4s2VB7r/fJJHOPTT7316upf08bexemGngVj/lH/9hYsC8qylfk9.', 0, 0),
(56, 'Starco', 'dzibui', 'dzibui@gmail.com', '$2y$10$5Fr0ZpwMNcbc9pKYE6tR9O.NZ3y.MY3ZwrMNxLJNOBRqCbJWw1IYi', 0, 0),
(57, 'Starco', 'dzibui', 'dzibui@gmail.com', '$2y$10$67hmuHfJqZ2TAmosCJ8q8uWV7Sa3kCimQevsOqVt1KaIGXNuGm666', 0, 0),
(58, 'Tomi', 'Gui', 'tomioka@gmail.com', '$2y$10$be4Lkygmdv0FZFi2dFyHbO2tEQnHb0VPY.GUqniDZNqDcSKZF0VsK', 0, 0),
(59, 'luila', 'bv', 'harr@gmail.com', '$2y$10$jbdJ8NrKVA06pSe2tqE.3Oyuc4zMGnZ3UCjl.Mcum1m5SOtgfoS1C', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `Id` int(11) NOT NULL,
  `NomVille` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`Id`, `NomVille`) VALUES
(1, 'Passamainty'),
(2, 'Mtsamboro');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `modetravail`
--
ALTER TABLE `modetravail`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidatures`
--
ALTER TABLE `candidatures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `modetravail`
--
ALTER TABLE `modetravail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
