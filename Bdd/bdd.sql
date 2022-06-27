-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forum`;

-- Listage de la structure de la table forum. posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '0',
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.posts : ~4 rows (environ)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
	(10, 3, 'Boinjour', 'Tous le monde va bien ?', '2022-06-22 09:27:41'),
	(12, 2, 'Mon premier post', 'si je ne le delete pas :)', '2022-06-22 13:32:31'),
	(13, 2, 'Salut &agrave; tous', 'Bonjour tous le monde il fait beau', '2022-06-23 15:22:52'),
	(14, 2, 'Voici un de mes posts', 'Ce post sert strictement juste &agrave; voir le message_post !!!!', '2022-06-24 13:51:35'),
	(15, 2, 'Look', 'Just for see if this still working', '2022-06-27 07:56:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Listage de la structure de la table forum. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
	(2, 'Nicolas99', 'Nicolas99@gmail.com', '$2y$10$VzhIZGnkixrVMaf7XkWsFOMya3sthcU4VxBwHbtprY0JyOADJ3geO', '2022-06-20 10:49:53'),
	(3, 'Kevin068', 'Kevin068@sfr.com', '$2y$10$c0pDVIYVcgv3GEtOCavbsOiaYVuCdjL692m.giEjpdSRGse5gLVwq', '2022-06-20 16:45:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
