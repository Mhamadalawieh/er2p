-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2023 at 08:37 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `er2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualities`
--

DROP TABLE IF EXISTS `actualities`;
CREATE TABLE IF NOT EXISTS `actualities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `path` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actualities`
--

INSERT INTO `actualities` (`id`, `title`, `description`, `path`, `updated_at`, `created_at`) VALUES
(4, 'Refonte des documents de vente et de la caisse', 'Révision graphique et ergonomique complète\r\nLes nouveaux documents vous permettront de lorem ipsum est, en imprimerie, une suite de mots sans', 'upload/62489de1051b562489de1051b6.jpg', '2022-04-02 21:02:57', '2022-02-23 00:00:00'),
(5, 'Nouveau résumé d\'un article', 'Nouvelle page pour visualiser un article ication utilisée à titre provisoire pour calibrer une mise enication utilisée à titre provisoire pour calibrer une mise', 'upload/62489f4999ffd62489f4999ffe.jpg', '2022-04-02 21:08:57', '2022-03-23 00:00:00'),
(6, 'Nouveaux liens Dilicom', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès', 'upload/62489f5de0c7362489f5de0c74.jpg', '2022-04-02 21:09:17', '2022-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `label` text NOT NULL,
  `page` text NOT NULL,
  `path` text,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `label`, `page`, `path`, `updated_at`, `created_at`) VALUES
(22, 'mainLogo', 'Logo principal', 'global', 'upload/623cd84b91aa9623cd84b91aaa.png', '2022-03-24 21:44:59', '2022-03-20 17:26:20'),
(25, 'mapFrance', 'Carte des clients', 'accueil', 'upload/623e0da5e6cfb623e0da5e6cfc.png', '2022-03-25 19:44:53', '2022-03-25 19:44:53'),
(24, 'background', 'Fond principal', 'accueil', 'upload/623e2b5718b0c623e2b5718b0d.jpg', '2022-03-25 21:51:35', '2022-03-23 19:07:27'),
(26, 'background', 'Fond du menu', 'global', 'upload/623f75f50e2e7623f75f50e2e8.jpg', '2022-03-26 21:22:13', '2022-03-26 21:05:50'),
(27, 'favicon', 'Favicon png', 'global', 'upload/62405a04194da62405a04194db.png', '2022-03-27 14:35:16', '2022-03-27 14:29:06'),
(28, 'aboutUs', 'À propos de nous', 'accueil', 'upload/6248a6704b7456248a6704b746.png', '2022-04-02 21:39:28', '2022-04-02 21:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `last_update`) VALUES
(1, 'id', 'admin', '2022-03-20 14:05:32'),
(2, 'password', '$2y$10$hVDDdxtQXOah3611pVzSFeP8weXUroMxHO1sDzS2A4yApZ2E.7W8S', '2022-03-20 14:05:32'),
(3, 'email', 'spyller37@gmail.com', '2022-03-27 14:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

DROP TABLE IF EXISTS `texts`;
CREATE TABLE IF NOT EXISTS `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `label` text NOT NULL,
  `page` text NOT NULL,
  `content` text,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `name`, `label`, `page`, `content`, `updated_at`, `created_at`) VALUES
(16, 'middleTitle', 'Titre du bloc de texte', 'accueil', 'Lorem Ipsum is simply dummy text', '2022-03-23 23:16:36', '2022-03-23 23:16:36'),
(15, 'subtitle', 'Sous titre principal', 'accueil', 'De l\'édition, à la vente, ER2P vous propose des solutions adaptées', '2022-03-24 00:05:09', '2022-03-23 20:26:24'),
(14, 'title', 'Titre principal', 'accueil', 'Le monde numérique du livre', '2022-03-23 20:25:24', '2022-03-23 20:25:24'),
(17, 'middleText', 'Bloc de texte', 'accueil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2022-03-25 20:03:50', '2022-03-23 23:17:08'),
(18, 'titleMap', 'Titre de la carte', 'accueil', 'Ils nous font confiance depuis 2005', '2022-03-25 19:52:08', '2022-03-25 19:52:08'),
(19, 'textMap', 'Description de la carte', 'accueil', 'Actuellement, le terme « Mésopotamie » est généralement utilisé en référence à l\'histoire antique de cette région, pour la civilisation.\nAyant occupé cet espace jusqu\'aux premiers siècles de notre ère. La civilisation mésopotamienne est considérée comme une des matrices des civilisations historiques', '2022-03-25 20:04:16', '2022-03-25 19:52:34'),
(20, 'formTitle', 'Titre du formulaire de contact', 'contact', 'Envoyez nous un message', '2022-03-27 14:46:24', '2022-03-27 14:46:24'),
(21, 'infosTitle', 'Titre des informations des locaux', 'contact', 'Plus d\'informations', '2022-03-27 14:48:47', '2022-03-27 14:46:48'),
(22, 'address', 'Adresse', 'contact', '6 rue de Verdun\r\n37400 Amboise\r\nFRANCE', '2022-03-27 15:08:39', '2022-03-27 15:08:39'),
(23, 'contact', 'Moyen de contact', 'contact', 'Email : contact@er2p.com\r\nTél : 02 90 920 500', '2022-03-27 15:12:54', '2022-03-27 15:12:54'),
(24, 'hourly', 'Horaires', 'contact', 'Le matin :\r\nDu lundi au vendredi de 9h à 12h30\r\n\r\nL\'après midi :\r\nDu lundi au jeudi de 13h30 à 17h30\r\nLe vendredi de 13h30 à 16h', '2022-03-27 15:14:20', '2022-03-27 15:14:20'),
(25, 'mapTitle', 'Titre de la carte', 'contact', 'Nos locaux', '2022-04-02 14:19:47', '2022-03-27 15:16:43'),
(50, 'footPlaceText', 'Texte de la colonne de l\'adresse dans le pied', 'global', '6 rue de Verdun\r\n37400 Amboise\r\nFRANCE', '2022-04-03 14:06:12', '2022-04-03 14:06:12'),
(49, 'footPlaceTitle', 'Titre de la colonne de l\'adresse dans le pied', 'global', 'Nos locaux', '2022-04-03 14:07:42', '2022-04-03 14:04:49'),
(51, 'footEmail', 'Email du pied', 'global', 'contact@er2p.com', '2022-04-03 14:08:44', '2022-04-03 14:08:44'),
(47, 'aboutUsTitle', 'Titre \"à propos d\'ER2P\"', 'accueil', 'Pourquoi nous ?', '2022-04-02 21:38:13', '2022-04-02 21:38:13'),
(48, 'aboutUsText', 'Texte \"à propos d\'ER2P\"', 'accueil', 'Actuellement, le terme « Mésopotamie » est généralement utilisé en référence à l\'histoire antique de cette région, pour la civilisation.\r\nAyant occupé cet espace jusqu\'aux premiers siècles de notre ère. La civilisation mésopotamienne est considérée comme une des matrices des civilisations historiques', '2022-04-02 21:38:29', '2022-04-02 21:38:29'),
(31, 'greenDescription', 'Description verte', 'accueil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum has been the', '2022-03-28 00:35:47', '2022-03-28 00:35:59'),
(32, 'blueDescription', 'Description bleue', 'accueil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum has been the', '2022-03-28 00:35:48', '2022-03-28 00:35:48'),
(33, 'redDescription', 'Description rouge', 'accueil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum has been the', '2022-03-28 00:35:50', '2022-03-28 00:35:46'),
(34, 'yellowDescription', 'Description jaune', 'accueil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text. Lorem Ipsum has been the', '2022-03-28 00:35:52', '2022-03-28 00:35:52'),
(39, 'solution3', 'Produit 3', 'global', 'Mona', '2022-03-28 00:38:19', '2022-03-28 00:38:19'),
(38, 'solution2', 'Produit 2', 'global', 'Leonardo', '2022-03-28 00:39:34', '2022-03-28 00:38:05'),
(37, 'solution1', 'Produit 1', 'global', 'Lisa', '2022-03-28 00:39:33', '2022-03-28 00:38:04'),
(40, 'solution4', 'Produit 4', 'global', 'Codex', '2022-03-28 00:38:31', '2022-03-28 00:38:31'),
(41, 'firstTitle', 'Premier titre', 'qui-sommes-nous', 'Comment en somme-nous arrivé là ?', '2022-04-02 14:09:42', '2022-04-02 14:09:42'),
(42, 'firstText', 'Premier paragraphe', 'qui-sommes-nous', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \n\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-02 14:19:12', '2022-04-02 14:13:01'),
(44, 'secondTitle', 'Deuxième titre', 'qui-sommes-nous', 'Pourquoi ER2P ?', '2022-04-02 14:13:48', '2022-04-02 14:13:48'),
(53, 'title1', 'Titre produit 1', 'produits', 'Solution libraires', '2022-04-03 23:18:34', '2022-04-03 23:18:34'),
(54, 'description1', 'Description produit 1', 'produits', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte\n\nDès qu\'il est prêt ou que la mise en page est achevée. \n- lorem\n- ispum\n\nGénéralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2022-04-03 23:24:27', '2022-04-03 23:18:52'),
(55, 'title2', 'Titre produit 2', 'produits', 'Solution distributeur', '2022-04-03 23:30:43', '2022-04-03 23:26:00'),
(56, 'description2', 'Description produit 2', 'produits', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte\r\n\r\nDès qu\'il est prêt ou que la mise en page est achevée. \r\n- lorem\r\n- ispum\r\n\r\nGénéralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2022-04-03 23:26:00', '2022-04-03 23:26:00'),
(57, 'title3', 'Titre produit 3', 'produits', 'Solution éditeur', '2022-04-03 23:30:44', '2022-04-03 23:27:00'),
(52, 'footPhone', 'Téléphone du pied', 'global', '+33 2 90 920 500', '2022-04-03 14:09:19', '2022-04-03 14:09:19'),
(46, 'secondText', 'Deuxième texte', 'qui-sommes-nous', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-02 14:19:01', '2022-04-02 14:19:01'),
(58, 'description3', 'Description produit 3', 'produits', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte\r\n\r\nDès qu\'il est prêt ou que la mise en page est achevée. \r\n- lorem\r\n- ispum\r\n\r\nGénéralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2022-04-03 23:28:00', '2022-04-03 23:28:00'),
(59, 'title4', 'Titre produit 4', 'produits', 'Solution auteur', '2022-04-03 23:30:49', '2022-04-03 23:29:00'),
(60, 'description4', 'Description produit 4', 'produits', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte\r\n\r\nDès qu\'il est prêt ou que la mise en page est achevée. \r\n- lorem\r\n- ispum\r\n\r\nGénéralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2022-04-03 23:30:00', '2022-04-03 23:30:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
