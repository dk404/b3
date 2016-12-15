-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.13 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица maket1.fortest
CREATE TABLE IF NOT EXISTS `fortest` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` bigint(12) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='для урока';

-- Дамп данных таблицы maket1.fortest: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `fortest` DISABLE KEYS */;
INSERT IGNORE INTO `fortest` (`ID`, `title`, `date`) VALUES
	(1, 'первая запись', 1481824211),
	(2, 'вторая запись', 1481824211),
	(3, 'третья запись', 1481824211);
/*!40000 ALTER TABLE `fortest` ENABLE KEYS */;


-- Дамп структуры для таблица maket1.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `pass` varchar(255) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '0',
  `confirm_email` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1 - admin; ',
  `date` bigint(15) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы maket1.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`ID`, `email`, `pass`, `token`, `confirm_email`, `status`, `date`) VALUES
	(4, 'svetlana_p_88@mail.ru', '$2y$10$RAhzbJpdkh54N/we5GItQ.qNHwZ4LDmZ5ZZ8etG0uniU1x74uQl2e', '2229cc270d81690ea836a8637a0e1cf3', 1, 1, 1480438708);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
