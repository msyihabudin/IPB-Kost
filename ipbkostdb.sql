-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ipbkostdb.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.ci_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table ipbkostdb.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.kategori: ~3 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`kategori_id`, `name`) VALUES
	(1, 'Kost Pria'),
	(2, 'Kost Wanita'),
	(3, 'Kost Campur');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table ipbkostdb.kategorikost
CREATE TABLE IF NOT EXISTS `kategorikost` (
  `kategorikost_id` int(11) NOT NULL AUTO_INCREMENT,
  `kost_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  PRIMARY KEY (`kategorikost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.kategorikost: ~20 rows (approximately)
/*!40000 ALTER TABLE `kategorikost` DISABLE KEYS */;
INSERT INTO `kategorikost` (`kategorikost_id`, `kost_id`, `kategori_id`) VALUES
	(1, 35, 1),
	(2, 35, 1),
	(3, 35, 1),
	(4, 35, 1),
	(5, 34, 1),
	(6, 34, 3),
	(7, 22, 1),
	(8, 22, 3),
	(9, 31, 1),
	(10, 31, 3),
	(11, 35, 1),
	(12, 36, 1),
	(13, 36, 3),
	(14, 36, 1),
	(15, 36, 3),
	(16, 37, 1),
	(17, 37, 1),
	(18, 38, 3),
	(19, 39, 1),
	(20, 40, 2);
/*!40000 ALTER TABLE `kategorikost` ENABLE KEYS */;

-- Dumping structure for table ipbkostdb.kost
CREATE TABLE IF NOT EXISTS `kost` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` text,
  `photo` varchar(250) DEFAULT NULL,
  `amenities` text,
  `description` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.kost: ~3 rows (approximately)
/*!40000 ALTER TABLE `kost` DISABLE KEYS */;
INSERT INTO `kost` (`ID`, `name`, `price`, `latitude`, `longitude`, `address`, `photo`, `amenities`, `description`) VALUES
	(37, 'Kost Pakde Sukardi', 350000, '-6.611069', '106.810910', 'Belakang restaurant taman seafood', '', 'AC, TV kabel, Telepon, Shower Panas & Dingin, Smooking Area', 'ok oce'),
	(38, 'Jasmine Kos', 600000, '-6.6076999', '106.806285', 'Jl. Riau No. 38, Bogor', '', 'Wifi, Bed, Almari Pakaian, Kursi & Meja Belajar, Dapur, Parkir Motor', 'Tes tes'),
	(39, 'Kost Ibu Lela', 600000, '-6.594648', '106.807431', 'Bogor Tengah', '', 'Bed, Almari Pakaian, Kursi & Meja Belajar, Parkir Motor', 'kost'),
	(40, 'Kost Mas Uki', 700000, '-6.593604', '106.806881', 'Malabar', '', 'Bed, Almari Pakaian, Kursi & Meja Belajar, Parkir Motor', 'Kost');
/*!40000 ALTER TABLE `kost` ENABLE KEYS */;

-- Dumping structure for table ipbkostdb.tokens
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
	(1, '10b1e0084271a40fae12dde64f20ff', 1, '2017-12-01');
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;

-- Dumping structure for table ipbkostdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `role` varchar(10) DEFAULT NULL,
  `last_login` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ipbkostdb.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `fullname`, `username`, `email`, `password`, `role`, `last_login`, `status`) VALUES
	(1, 'Muhamad Syihab', 'admin', 'syehab94@gmail.com', 'sha256:1000:Z66s3iNjWidJ91l+P0I1/S4k4wNpQ36y:jniC50nX92P+IytKBCkq86SxrPsGmVfc', NULL, '2017-12-01 09:33:52 AM', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
