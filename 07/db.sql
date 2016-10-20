-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.13 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.3.0.5107
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы b3.blog: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
REPLACE INTO `blog` (`ID`, `title`, `descr`, `text`) VALUES
	(3, 'jhj hj h!!!!!', 'Б++++++раузер Internet Explorer до седьмой версии включительно не поддерживает свойство border-spacing, поэтому в этом браузере для таблиц будет применяться значение cellspacing заданное по умолчанию. Обычно оно равно 2 пиксела.\r\n\r\nПри добавлении к селектору TABLE свойства border-collapse со значением collapse, атрибут cellspacing игнорируется, а значение border-spacing обнуляется.', 'gfg gfdg fdg fdg dfg dfg dfg fdg ');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Дамп структуры для таблица b3.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `pass` text,
  `speciality` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='для хранения инфо про users';

-- Дамп данных таблицы b3.users: ~24 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`ID`, `user_name`, `pass`, `speciality`) VALUES
	(5, 'Петя', NULL, NULL),
	(14, 'DDDFDFDF', '46565565', NULL),
	(16, 'Петя', '46565565', NULL),
	(17, 'Петя', '46565565', NULL),
	(18, 'GFGFG', '46565565', NULL),
	(19, 'Петя', '46565565', NULL),
	(38, 'Лена', '54546', 'dfdfdfdff'),
	(39, 'Лена', '54546', 'dfdfdfdff'),
	(40, 'Лена', '54546', 'dfdfdfdff222222222222'),
	(41, 'Лена', '54546', '59895959595959'),
	(42, 'Лена', '54546', '59895959595959'),
	(43, 'Лена', '54546', '59895959595959'),
	(44, 'Лена', '54546', '59895959595959'),
	(45, 'Лена', '54546', '59895959595959'),
	(46, 'Лена', '54546', '59895959595959'),
	(47, 'Лена', '54546', '59895959595959'),
	(48, 'Лена', '54546', '59895959595959'),
	(49, 'Серега', 'ывывы ывы в ы', NULL),
	(50, 'Лена', '54546', '59895959595959'),
	(51, 'shturnev', '123', NULL),
	(52, 'ярик', '1223', 'авава'),
	(53, 'ярик', '1223', 'авава'),
	(54, 'ярик', '1223', 'авава'),
	(55, 'shturnev', '123', NULL),
	(85, 'shturnev', '45454545', NULL),
	(86, '0101029552', '45454545', NULL);
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
