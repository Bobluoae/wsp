-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kwitter
CREATE DATABASE IF NOT EXISTS `kwitter` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci */;
USE `kwitter`;

-- Dumping structure for table kwitter.chat_log
CREATE TABLE IF NOT EXISTS `chat_log` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_swedish_ci NOT NULL,
  `m_created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `delete_on_user_destruction` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kwitter.m_likes
CREATE TABLE IF NOT EXISTS `m_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `m_id` int(10) unsigned DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_m_id` (`user_id`,`m_id`),
  KEY `delete_likes_on_message_delete` (`m_id`),
  CONSTRAINT `delete_likes_on_message_delete` FOREIGN KEY (`m_id`) REFERENCES `chat_log` (`m_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=569 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kwitter.replies
CREATE TABLE IF NOT EXISTS `replies` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `m_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `reply` varchar(1000) COLLATE utf8mb4_swedish_ci NOT NULL,
  `r_created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`),
  KEY `m_id` (`m_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `delete_chat_log_on_reply_destruction` FOREIGN KEY (`m_id`) REFERENCES `chat_log` (`m_id`) ON DELETE CASCADE,
  CONSTRAINT `replies_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2061 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kwitter.r_likes
CREATE TABLE IF NOT EXISTS `r_likes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `r_id` int(10) unsigned DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_r_id` (`user_id`,`r_id`),
  KEY `delete_likes_on_reply_delete` (`r_id`),
  CONSTRAINT `delete_likes_on_reply_delete` FOREIGN KEY (`r_id`) REFERENCES `replies` (`r_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table kwitter.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `bio` varchar(1000) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
