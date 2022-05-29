-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `kwitter`;
CREATE DATABASE `kwitter` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci */;
USE `kwitter`;

DROP TABLE IF EXISTS `chat_log`;
CREATE TABLE `chat_log` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_swedish_ci NOT NULL,
  `m_created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `delete_on_user_destruction` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


DROP TABLE IF EXISTS `m_likes`;
CREATE TABLE `m_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `m_id` int(10) unsigned DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_m_id` (`user_id`,`m_id`),
  KEY `delete_likes_on_message_delete` (`m_id`),
  CONSTRAINT `delete_likes_on_message_delete` FOREIGN KEY (`m_id`) REFERENCES `chat_log` (`m_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


DROP TABLE IF EXISTS `r_likes`;
CREATE TABLE `r_likes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `r_id` int(10) unsigned DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_r_id` (`user_id`,`r_id`),
  KEY `delete_likes_on_reply_delete` (`r_id`),
  CONSTRAINT `delete_likes_on_reply_delete` FOREIGN KEY (`r_id`) REFERENCES `replies` (`r_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `bio` varchar(1000) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


-- 2022-05-29 21:46:42