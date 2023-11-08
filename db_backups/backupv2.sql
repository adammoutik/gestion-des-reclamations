-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 08 nov. 2023 à 22:28
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `did` int(11) NOT NULL COMMENT 'Numéro du département',
  `dname` text DEFAULT NULL COMMENT 'Nom du département',
  `chefid` int(11) DEFAULT NULL COMMENT 'Numéro du chef du département'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`did`, `dname`, `chefid`) VALUES
(1, 'Finance', NULL),
(2, 'Marketing', NULL),
(3, 'Human Resources', NULL),
(4, 'Operations', NULL),
(5, 'IT', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL COMMENT 'Numéro de l''employée',
  `efname` text DEFAULT NULL COMMENT 'Prénom de l''employée',
  `elname` text DEFAULT NULL COMMENT 'Nom de l''employée',
  `departmentId` int(11) DEFAULT NULL COMMENT 'Numéro du département',
  `eposte` text DEFAULT NULL COMMENT 'Poste de l''employée',
  `managerid` int(11) DEFAULT NULL COMMENT 'Numéro du gérant de l''employée'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reclamatio`
--

CREATE TABLE `reclamatio` (
  `id` int(11) NOT NULL COMMENT 'Numéro du réclamation',
  `titre` text DEFAULT NULL COMMENT 'Titre du réclamation',
  `departmentId` int(11) DEFAULT NULL COMMENT 'Numéro du département',
  `description` text DEFAULT NULL COMMENT 'Description du réclamation',
  `etat` text DEFAULT 'En cours' COMMENT 'Etat du reclamation (Done, En Cours, Echec)',
  `eid` int(11) DEFAULT NULL COMMENT 'Numéro de l''employée responsable du réclamation',
  `date_ouvert` timestamp NULL DEFAULT current_timestamp() COMMENT 'Date création du réclamation',
  `date_ferm` timestamp NULL DEFAULT NULL COMMENT 'Date de fermeture du réclamation',
  `priorite` text DEFAULT NULL COMMENT 'Priorité du réclamation',
  `review` text DEFAULT NULL COMMENT 'Commentaire du employée responsable  à la résolution du réclamation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamatio`
--

INSERT INTO `reclamatio` (`id`, `titre`, `departmentId`, `description`, `etat`, `eid`, `date_ouvert`, `date_ferm`, `priorite`, `review`) VALUES
(24, 'Imprimante n\'primante pas', 3, 'DESCRIPTION ........ et LIEUUUU ............', 'En cours', 11, '2023-11-08 19:04:13', '2023-11-08 19:40:23', 'low', ''),
(25, 'Accès au système   ', 3, 'Impossible de se connecter au système HR', 'En cours', NULL, '2023-11-08 19:15:38', NULL, 'medium', NULL),
(26, 'Besoin de logiciels ', 3, 'Demande d\'installation de logiciels spécifiques ', 'En cours', NULL, '2023-11-08 19:16:30', NULL, 'low', NULL),
(27, 'Problème de messagerie    ', 3, 'Impossible de recevoir des e-mails', 'En cours', NULL, '2023-11-08 19:17:07', NULL, 'high', NULL),
(28, 'Problème d\'impression', 4, ' L\'imprimante dans le bureau Operations est bloquée  ', 'Êchec', 4, '2023-11-08 19:18:18', '2023-11-08 19:53:40', 'low', 'Intervention externe obligatoire'),
(29, 'Problème de réseau ', 4, 'Perte de connexion Internet au bureau principal  ', 'En cours', NULL, '2023-11-08 19:18:55', NULL, 'low', NULL),
(31, 'Imprimante ne fonctionne pas ', 1, 'Problème d\'impression sur l\'imprimante au 2ème étage ', 'En cours', NULL, '2023-11-08 19:48:50', NULL, 'low', NULL),
(32, 'Problème d\'e-mail ', 1, 'Impossible d\'envoyer des e-mails.', 'Done', 4, '2023-11-08 19:49:24', '2023-11-08 19:53:55', 'low', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL COMMENT 'Numéro d''utilisateur',
  `fname` text NOT NULL COMMENT 'Prénom de l''utilisateur',
  `lname` text NOT NULL COMMENT 'Nom de l''utilisateur',
  `eid` int(11) DEFAULT NULL COMMENT 'Numéro de l''employée propriétaire du compte',
  `username` text NOT NULL COMMENT 'nom d’utilisateur',
  `pwd` varchar(200) NOT NULL,
  `departmentId` int(11) DEFAULT NULL COMMENT 'Numéro du département',
  `role` text DEFAULT NULL COMMENT 'Poste de l''employée',
  `registration_date` date DEFAULT current_timestamp() COMMENT 'Date création du compte',
  `completedRecs` int(11) DEFAULT 0 COMMENT 'Nombre de réclamations résout par l''employée',
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'L''état d''activation du compte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `eid`, `username`, `pwd`, `departmentId`, `role`, `registration_date`, `completedRecs`, `active`) VALUES
(4, 'Adam', 'Moutik', 2, 'mtk', '$2y$10$4RyHAq4bxwWXN5VoMwnV9.kmCg08I/0psNiviZb2Kq/v8kbAnO6P2', 5, 'manager', '2023-06-21', 17, 1),
(5, 'admin', 'admin', NULL, 'admin', '$2y$10$4RyHAq4bxwWXN5VoMwnV9.kmCg08I/0psNiviZb2Kq/v8kbAnO6P2', 0, 'chef', '2023-06-21', 0, 1),
(7, 'dounia', 'abid', 3, 'dounia', '$2y$10$Zw0RJeN/X1r/QaMx.7NgE.APcD0PEvHxd2xz1WeFeyPv0dFLPRq4K', 1, 'chef', '2023-06-28', 0, 1),
(11, 'ilyas', 'mezough', NULL, 'ilyas', '$2y$10$FeKwfkGcrnPyWo0E7ncGxuIfZttmXoFglsDTgH7KRr4ofoFUYYbWa', 5, 'manager', '2023-08-25', 0, 1),
(16, 'Adam', 'Moutik', 5, 'Adam2004', '$2y$10$4RyHAq4bxwWXN5VoMwnV9.kmCg08I/0psNiviZb2Kq/v8kbAnO6P2', 5, 'chef', '2023-08-25', 4, 1),
(20, 'ahmed', 'kotbi', NULL, 'ahmed', '$2y$10$ZABcguy8UYCb3ha/9G88DeJZ3B6asRjVVQ.b1SUqTHqtQBa5nC/A2', 3, 'employee', '2023-10-08', 0, 1),
(21, 'Ahmed', 'Rafiq', NULL, 'Ahmed1', '$2y$10$sQkiTzdJQPLJWKogtBNT1OhABsZbWQoV0LfViPRuCI1eiERbDcGo2', 4, 'employee', '2023-11-08', 0, 1),
(22, 'karim', 'lotfi', NULL, 'karim', '$2y$10$/K3TpevFi/OvF2I1WjiRu.rPDj4w0FbhASYVX0vhD4s2a3ecDOJGG', 3, 'manager', '2023-11-08', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `dname` (`dname`) USING HASH,
  ADD KEY `fr_d` (`chefid`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `fr_e` (`managerid`);

--
-- Index pour la table `reclamatio`
--
ALTER TABLE `reclamatio`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique` (`username`) USING HASH;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reclamatio`
--
ALTER TABLE `reclamatio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numéro du réclamation', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numéro d''utilisateur', AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `fr_d` FOREIGN KEY (`chefid`) REFERENCES `employee` (`eid`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fr_e` FOREIGN KEY (`managerid`) REFERENCES `employee` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
