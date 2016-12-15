-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.7.13 - MySQL Community Server (GPL)
-- ОС сервера:                   Win64
-- HeidiSQL Версія:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for таблиця maket1.for_test
CREATE TABLE IF NOT EXISTS `for_test` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) DEFAULT '0',
  `DATE` bigint(12) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table maket1.for_test: ~3 rows (приблизно)
/*!40000 ALTER TABLE `for_test` DISABLE KEYS */;
INSERT IGNORE INTO `for_test` (`ID`, `TITLE`, `DATE`) VALUES
	(23, 'УУУУУ', 1481824247),
	(24, 'РРРРРР', 1481824247),
	(25, 'ПППППП', 1481824247);
/*!40000 ALTER TABLE `for_test` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
