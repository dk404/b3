-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.13 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.3.0.5114
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица b3.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `descr` text,
  `text` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы b3.blog: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT IGNORE INTO `blog` (`ID`, `title`, `descr`, `text`) VALUES
	(3, 'jhj hj h!!!!!', 'Б++++++раузер Internet Explorer до седьмой версии включительно не поддерживает свойство border-spacing, поэтому в этом браузере для таблиц будет применяться значение cellspacing заданное по умолчанию. Обычно оно равно 2 пиксела.\r\n\r\nПри добавлении к селектору TABLE свойства border-collapse со значением collapse, атрибут cellspacing игнорируется, а значение border-spacing обнуляется.', 'gfg gfdg fdg fdg dfg dfg dfg fdg '),
	(5, '&lt;h1&gt;sdsdsd///&#039;&#039;;;;;;‘‘‘‘‘‘&lt;/h1&gt;&lt;/ul&gt;', '<iframe src="http://php.net/manual/ru/function.trim.php" width="100%" height="100"></iframe>', '');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Дамп структуры для таблица b3.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `pass` text,
  `speciality` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='для хранения инфо про users';

-- Дамп данных таблицы b3.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`ID`, `user_name`, `pass`, `speciality`) VALUES
	(1, 'петя', NULL, NULL),
	(5, 'shturnev', '$2y$10$Pws5opoiWpGx6jk8QZLvbuGKWA1.xWX6SvlchnrfVAPliRYB03fZy', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица b3.users2
CREATE TABLE IF NOT EXISTS `users2` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `pass` text,
  `speciality` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='для хранения инфо про users';

-- Дамп данных таблицы b3.users2: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
