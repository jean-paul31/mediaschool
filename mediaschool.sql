-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 avr. 2022 à 12:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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

DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `childName` varchar(150) NOT NULL,
  `childSurname` varchar(150) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CHILDREN_CLASS_FK` (`class_id`),
  KEY `CHILDREN_USERS0_FK` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `children`
--

INSERT INTO `children` (`id`, `childName`, `childSurname`, `class_id`, `user_id`) VALUES
(6, 'andrei', 'bastien', 3, 1),
(7, 'andrei', 'clemence', 11, 1),
(8, 'andrei', 'bébé', 10, 1),
(9, 'andrei', 'balou', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `c_texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `COMMENTS_USERS_FK` (`user_id`),
  KEY `COMMENTS_MESSAGES0_FK` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`c_id`, `createdAt`, `c_texte`, `user_id`, `message_id`) VALUES
(10, '2020-08-25 20:04:55', 'un commentaire', 3, 25),
(11, '2020-08-25 20:05:11', 'coucou petit bonhomme', 3, 27),
(12, '2020-08-25 20:05:32', 'coucou papa', 4, 25),
(14, '2020-08-25 20:09:09', 'un commentaire d\'un autre utilisateur', 1, 34),
(15, '2020-08-25 20:41:23', 'coucou', 1, 25),
(16, '2020-08-25 20:42:27', 'coucou', 1, 27),
(17, '2020-10-22 10:26:43', 'bla bla', 1, 25),
(18, '2021-12-05 16:15:40', 'et oui', 1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `texte` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `MESSAGES_USERS_FK` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`m_id`, `createdAt`, `title`, `texte`, `user_id`) VALUES
(25, '2020-08-25 20:00:46', 'un premier message', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 1),
(26, '2020-08-25 20:01:07', 'un deuxième message de teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 1),
(27, '2020-08-25 20:01:30', 'un coucou de bastien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 2),
(28, '2020-08-25 20:01:43', 'et encore un', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 2),
(29, '2020-08-25 20:02:42', 'un bonjour de ma fille', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 4),
(30, '2020-08-25 20:03:04', 'et ça, ça marche?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 4),
(31, '2020-08-25 20:03:43', 'un salut de Momberon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 3),
(32, '2020-08-25 20:03:59', 'Rémi vous passe le bonjour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 3),
(33, '2020-08-25 20:04:39', 'encore un autre test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 3),
(34, '2020-08-25 20:08:19', 'voici un titre de démo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis quam, sodales sed quam nec, ultrices varius sem. Nulla pulvinar nunc ac mi mollis finibus. Phasellus in laoreet quam. Nunc lobortis faucibus leo, eu sagittis nibh tincidunt nec. Aenean tristique fringilla luctus. Phasellus interdum elit metus, ac finibus nunc consequat eu. Suspendisse vel orci ut nunc luctus mattis a vitae lorem. In lacinia ac turpis eget tincidunt. Nulla efficitur efficitur purus, a pharetra justo ullamcorper eu. Vivamus faucibus vel purus in bibendum. Etiam ac turpis efficitur, tincidunt dolor eleifend, bibendum leo. Morbi sed eros fringilla, ultrices diam eget, eleifend lorem. Vestibulum a congue orci, ac aliquam neque. Suspendisse in magna metus. In hendrerit enim ac cursus pellentesque.', 12),
(35, '2020-10-22 10:26:59', 'un titre', 'blabla', 1),
(36, '2020-10-22 10:27:59', 'un autre titre', 'blabla', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

DROP TABLE IF EXISTS `tchat`;
CREATE TABLE IF NOT EXISTS `tchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_receiver` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USERS_SENDER_FK` (`id_sender`) USING BTREE,
  UNIQUE KEY `USERS_RECEIVER_FK` (`id_receiver`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `mail`, `mdp`, `avatar`, `admin`) VALUES
(1, 'Andrei', 'Jean Paul', 'andrei.jpaul@gmail.com', 'MTIzNGF6ZXI=', '1.jpg', 1),
(2, 'Andrei', 'Bastien', 'bastien@andrei.fr', 'MTIzNGF6ZXI=', '2.jpg', 0),
(3, 'Diaz ', 'Remi', 'remi@diaz.fr', 'MTIzNGF6ZXI=', '3.jpg', 0),
(4, 'Andréï', 'Clémence', 'clem@andrei.fr', 'MTIzNGF6ZXI=', '4.jpg', 0),
(12, 'polNum', 'adrar', 'polNum@adrar.fr', 'MTIzNGF6ZXI=', 'default.png', 0),
(16, 'tonton', 'jp', 'tonton@jp.fr', 'MTIzNGF6ZXI=', 'default.png', 0);

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
  ADD CONSTRAINT `MESSAGES_USERS_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
