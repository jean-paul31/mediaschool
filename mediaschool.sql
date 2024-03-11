-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 fév. 2024 à 15:11
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
-- Base de données : `mediaschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `childName` varchar(150) NOT NULL,
  `childSurname` varchar(150) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `children`
--

INSERT INTO `children` (`id`, `childName`, `childSurname`, `class_id`, `user_id`) VALUES
(6, 'andrei', 'bastien', 3, 1),
(7, 'andrei', 'clemence', 11, 1),
(8, 'andrei', 'bébé', 10, 1),
(9, 'andrei', 'balou', 15, 1),
(10, 'andrei', 'Carambar', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `className` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id`, `className`) VALUES
(1, 'PSA'),
(2, 'PSB'),
(3, 'MSA'),
(4, 'MSB'),
(5, 'GSA'),
(6, 'GSB'),
(7, 'CPA'),
(8, 'CPB'),
(9, 'CE1A'),
(10, 'CE1B'),
(11, 'CE2A'),
(12, 'CE2B'),
(13, 'CM1A'),
(14, 'CM1B'),
(15, 'CM2A'),
(16, 'CM2B');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `c_texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`c_id`, `createdAt`, `c_texte`, `user_id`, `message_id`) VALUES
(21, '2024-02-21 23:14:37', 'hello', 1, 29);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`m_id`, `createdAt`, `title`, `content`, `id_sender`, `id_receiver`) VALUES
(29, '2020-08-25 20:02:42', 'un bonjour de ma fille', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE `tchat` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_receiver` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tchat`
--

INSERT INTO `tchat` (`id`, `id_sender`, `content`, `id_receiver`) VALUES
(2, 1, 'hello', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `mail`, `mdp`, `avatar`, `admin`) VALUES
(1, 'Andrei', 'Jean Paul', 'andrei.jpaul@gmail.com', 'MTIzNGF6ZXI=', '1.jpg', 1),
(2, 'Andrei', 'Bastien', 'bastien@andrei.fr', 'MTIzNGF6ZXI=', '2.jpg', 0),
(3, 'Diaz ', 'Remi', 'remi@diaz.fr', 'MTIzNGF6ZXI=', '3.jpg', 0),
(4, 'Andréï', 'Clémence', 'clem@andrei.fr', 'MTIzNGF6ZXI=', '4.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CHILDREN_CLASS_FK` (`class_id`),
  ADD KEY `CHILDREN_USERS0_FK` (`user_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `COMMENTS_USERS_FK` (`user_id`),
  ADD KEY `COMMENTS_MESSAGES0_FK` (`message_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `id_receiver` (`id_receiver`),
  ADD KEY `id_sender` (`id_sender`) USING BTREE;

--
-- Index pour la table `tchat`
--
ALTER TABLE `tchat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USERS_SENDER_FK` (`id_sender`) USING BTREE,
  ADD UNIQUE KEY `USERS_RECEIVER_FK` (`id_receiver`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `tchat`
--
ALTER TABLE `tchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `CHILDREN_CLASS_FK` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `CHILDREN_USERS0_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `COMMENTS_MESSAGES0_FK` FOREIGN KEY (`message_id`) REFERENCES `messages` (`m_id`),
  ADD CONSTRAINT `COMMENTS_USERS_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `MESSAGES_USERS_FK` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
