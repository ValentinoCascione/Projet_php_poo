-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `health` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `weapon` char(255) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_id` (`roles_id`),
  CONSTRAINT `characters_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `characters` (`id`, `name`, `health`, `power`, `weapon`, `roles_id`) VALUES
(1,	'Jonny',	1000,	105,	'Magic Spell',	1),
(16,	'Easy',	50,	100,	'Hook',	1),
(17,	'Zezette',	32,	21,	'ww',	1);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_roles` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name_roles`) VALUES
(1,	'Warrior'),
(2,	'Mage'),
(3,	'Thief'),
(4,	'Archer'),
(5,	'Priest');

-- 2019-09-26 09:47:52
