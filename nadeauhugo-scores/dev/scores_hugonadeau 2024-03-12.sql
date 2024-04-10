-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 12 mars 2024 à 19:53
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scores_hugonadeau`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `message_id` int NOT NULL,
  `courriel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`message_id`, `courriel`, `nom`, `sujet`, `message`) VALUES
(1, 'jeanMarc@gmail.com', 'Jean marc', 'Le nom', 'Bonjor j\'aime les patates');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `description`, `icone`) VALUES
(1, 'Jeu A', NULL, 'fa-solid fa-gamepad'),
(2, 'Jeu B', NULL, 'fa-solid fa-hat-wizard'),
(3, 'Jeu C', NULL, 'fa-solid fa-headset');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int NOT NULL,
  `pseudonyme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomfamille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `pseudonyme`, `nomfamille`, `prenom`, `avatar`) VALUES
(1, 'Joueur X', 'Lacasse', 'Toto', NULL),
(2, 'Joueur Y', 'Belhumeur', 'Zoély', NULL),
(3, 'Joueur Z', 'Chouinard', 'Cléo', NULL),
(4, 'Joueur A', 'Gagnon', 'Émilie', NULL),
(5, 'Joueur B', 'Lavoie', 'Louis', NULL),
(6, 'Joueur C', 'Fortin', 'Sophie', NULL),
(7, 'Joueur D', 'Leblanc', 'Antoine', NULL),
(8, 'Joueur E', 'Roy', 'Catherine', NULL),
(9, 'Joueur F', 'Bouchard', 'Maxime', NULL),
(10, 'Joueur G', 'Morin', 'Sarah', NULL),
(11, 'Joueur H', 'Lévesque', 'Gabriel', NULL),
(12, 'Joueur I', 'Bergeron', 'Mélissa', NULL),
(13, 'Joueur J', 'Pelletier', 'Olivier', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `titre` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `h1` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `accroche` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL,
  `texte` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `url`, `titre`, `description`, `h1`, `accroche`, `public`, `texte`, `modification`) VALUES
(1, 'index.php', 'Scores', 'Remise vous permet de gÃ©rer les dates de remise dans vos cours. Vous pouvez y noter votre horaire et vos travaux et examens dans chacun de vos cours.', 'Scores', NULL, 1, '', '2024-02-18 00:00:00'),
(2, 'a-propos.php', 'à-Propos', 'la page qui explique le système de maintient des scores', 'À-propos', NULL, 2, 'Bonjour', '2024-03-06 17:55:00'),
(3, 'calendrier.php', 'Calendrier', 'Calendrier des événements', 'Calendrier', NULL, 1, 'Contenu du calendrier ici', '2024-03-06 17:55:00'),
(4, 'contact.php', 'Contact', 'Page de contact', 'Contact', NULL, 1, 'Contenu de la page de contact ici', '2024-03-06 17:55:00'),
(5, 'details-score.php\n', 'Détails du Score', 'Page de détails des scores', 'Détails du Score', NULL, 1, 'Contenu des détails des scores ici', '2024-03-06 17:55:00'),
(6, 'formulaire-contact.php ', 'Formulaire de Contact', 'Page du formulaire de contact', 'Formulaire de Contact', NULL, 1, 'Contenu du formulaire de contact ici', '2024-03-06 17:55:00');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE `scores` (
  `id` int NOT NULL,
  `joueur_id` int NOT NULL,
  `jeu_id` int NOT NULL,
  `points` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `scores`
--

INSERT INTO `scores` (`id`, `joueur_id`, `jeu_id`, `points`, `message`) VALUES
(1, 1, 1, 1000, 'amusant'),
(2, 2, 2, 987, 'bon'),
(3, 3, 3, 836, NULL),
(4, 4, 3, 750, NULL),
(5, 5, 3, 890, NULL),
(6, 6, 3, 620, NULL),
(7, 7, 3, 1050, 'meilleur'),
(8, 8, 3, 920, 'tu n\'est pas assez bon'),
(9, 9, 3, 780, NULL),
(10, 10, 3, 850, NULL),
(11, 11, 3, 930, 'gg'),
(12, 12, 3, 800, NULL),
(13, 13, 3, 720, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dateajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`, `dateajout`) VALUES
(1, 'clair', '2023-03-02 15:15:00'),
(2, 'sombre', '2023-03-03 09:00:00'),
(3, 'éclaté', '2023-02-24 16:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scores_joueurs` (`joueur_id`),
  ADD KEY `fk_scores_jeux` (`jeu_id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_scores_jeux` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `fk_scores_joueurs` FOREIGN KEY (`joueur_id`) REFERENCES `joueurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
