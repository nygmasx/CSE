-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 mars 2023 à 10:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cse_lsv`
--

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `Id_Droit` int(11) NOT NULL,
  `Libelle_Droit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `Id_Image` int(11) NOT NULL,
  `Nom_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_accueil`
--

CREATE TABLE `info_accueil` (
  `Id_Info_Accueil` int(11) NOT NULL,
  `Num_Tel_Info_Accueil` int(11) NOT NULL,
  `Email_Info_Accueil` varchar(255) NOT NULL,
  `Emplacement_Bureau_Info_Accueil` varchar(255) NOT NULL,
  `Titre_Info_Accueil` varchar(255) NOT NULL,
  `Texte_Info_Accueil` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `Id_Message` int(11) NOT NULL,
  `Nom_Message` varchar(100) NOT NULL,
  `Prenom_Message` varchar(100) NOT NULL,
  `Email_Message` varchar(255) NOT NULL,
  `Contenu_Message` varchar(3000) NOT NULL,
  `Id_Offre` int(11) DEFAULT NULL,
  `Id_Partenaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `Id_Offre` int(11) NOT NULL,
  `Nom_Offre` varchar(255) NOT NULL,
  `Description_Offre` varchar(3000) NOT NULL,
  `Date_Debut_Offre` date NOT NULL,
  `Date_Fin_Offre` date NOT NULL,
  `Nombre_Place_Min_Offre` int(11) NOT NULL,
  `Id_Partenaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre_image`
--

CREATE TABLE `offre_image` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `Id_Partenaire` int(11) NOT NULL,
  `Nom_Partenaire` varchar(255) NOT NULL,
  `Description_Partenaire` varchar(3000) NOT NULL,
  `Lien_Partenaire` varchar(500) NOT NULL,
  `Id_Image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Nom_Utilisateur` varchar(100) NOT NULL,
  `Prenom_Utilisateur` varchar(100) NOT NULL,
  `Email_Utilisateur` varchar(255) NOT NULL,
  `Password_Utilisateur` varchar(255) NOT NULL,
  `Id_Droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`Id_Droit`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Id_Image`);

--
-- Index pour la table `info_accueil`
--
ALTER TABLE `info_accueil`
  ADD PRIMARY KEY (`Id_Info_Accueil`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id_Message`),
  ADD KEY `fk_Id_Offre` (`Id_Offre`),
  ADD KEY `fk_Id_Partenaire2` (`Id_Partenaire`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`Id_Offre`),
  ADD KEY `fk_Id_Partenaire` (`Id_Partenaire`);

--
-- Index pour la table `offre_image`
--
ALTER TABLE `offre_image`
  ADD PRIMARY KEY (`Id_Offre`,`Id_Image`),
  ADD KEY `fk_Id_image2` (`Id_Image`),
  ADD KEY `Id_Offre` (`Id_Offre`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`Id_Partenaire`),
  ADD KEY `fk_Id_Image` (`Id_Image`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD KEY `fk_Id_Droit` (`Id_Droit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `Id_Droit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `Id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_accueil`
--
ALTER TABLE `info_accueil`
  MODIFY `Id_Info_Accueil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `Id_Message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `Id_Offre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `Id_Partenaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_Id_Offre` FOREIGN KEY (`Id_Offre`) REFERENCES `offre` (`Id_Offre`),
  ADD CONSTRAINT `fk_Id_Partenaire2` FOREIGN KEY (`Id_Partenaire`) REFERENCES `partenaire` (`Id_Partenaire`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_Id_Partenaire` FOREIGN KEY (`Id_Partenaire`) REFERENCES `partenaire` (`Id_Partenaire`);

--
-- Contraintes pour la table `offre_image`
--
ALTER TABLE `offre_image`
  ADD CONSTRAINT `fk_Id_Offre2` FOREIGN KEY (`Id_Offre`) REFERENCES `offre` (`Id_Offre`),
  ADD CONSTRAINT `fk_Id_image2` FOREIGN KEY (`Id_Image`) REFERENCES `image` (`Id_Image`);

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `fk_Id_Image` FOREIGN KEY (`Id_Image`) REFERENCES `image` (`Id_Image`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Id_Droit` FOREIGN KEY (`Id_Droit`) REFERENCES `droit` (`Id_Droit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
