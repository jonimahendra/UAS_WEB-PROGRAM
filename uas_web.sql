-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for uas_web
CREATE DATABASE IF NOT EXISTS `uas_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `uas_web`;

-- Dumping structure for table uas_web.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.tb_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id_user`, `username`, `password`) VALUES
	(1, 'wira', '$2y$10$11ozkSKlDUurVR2e3bvdGurGWv2uqrxClGApj8t0pBnnE9ULWxNcy'),
	(2, 'admin', '$2y$10$15w5WEl0gVtM1/JDAKmySek88wK4T1wrIIkHOhyUYZkV10dvfr1o2'),
	(3, 'administrator', '$2y$10$BSdwXZrvkYvxaTBhbzhMleLfAi7PzoLOLD8Z9IuoB.UZ.lpcsjf42');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- Dumping structure for table uas_web.tb_zakat
CREATE TABLE IF NOT EXISTS `tb_zakat` (
  `id_zakat` int(5) NOT NULL AUTO_INCREMENT,
  `kode_zakat` char(5) NOT NULL,
  `jenis_zakat` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL DEFAULT 0,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_hp` varchar(100) DEFAULT NULL,
  `email` varchar(15) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rek` varchar(50) NOT NULL,
  PRIMARY KEY (`id_zakat`),
  KEY `kode_zakat` (`kode_zakat`),
  CONSTRAINT `zakat` FOREIGN KEY (`kode_zakat`) REFERENCES `zakat` (`kode_zakat`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.tb_zakat: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_zakat` DISABLE KEYS */;
REPLACE INTO `tb_zakat` (`id_zakat`, `kode_zakat`, `jenis_zakat`, `nominal`, `nama_lengkap`, `nomor_hp`, `email`, `nama_bank`, `nomor_rek`) VALUES
	(4, 'ZF', 'Zakat Fitrah', 23000, 'SARIAH', '085644442222', 'TEST@YMAIL.COM', 'BCA', '2340000987'),
	(9, 'ZM', 'Zakat Maal', 214000, 'ibnu peeee', '08567847333', 'game.onlen91@gm', 'mandiri', '123000045678'),
	(10, 'ZM', 'Zakat Maal', 545000, 'ibnu', '0811234345', 'test@mail.com', 'BCA', '45234666'),
	(11, 'ZF', 'Zakat Fitrah', 125000, 'SARIAH', '085644442222', '931.arman@gmail', 'BRI', '12345430000'),
	(12, 'ZP', 'Zakat Penghasilan', 545000, 'rifa', '08567847333', '931.arman@gmail', 'BCA', '12345430000'),
	(13, 'ZP', 'Zakat Penghasilan', 23000, 'kevin', '0811234345', '931.arman@gmail', 'mandiri', '1234543000'),
	(21, 'ZM', 'Zakat Maal', 125000, 'KAMPRET', '08567847333', 'kapan@ymail.com', 'MEGA', '45234666');
/*!40000 ALTER TABLE `tb_zakat` ENABLE KEYS */;

-- Dumping structure for table uas_web.zakat
CREATE TABLE IF NOT EXISTS `zakat` (
  `kode_zakat` char(5) NOT NULL,
  `nama_zakat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_zakat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.zakat: ~2 rows (approximately)
/*!40000 ALTER TABLE `zakat` DISABLE KEYS */;
REPLACE INTO `zakat` (`kode_zakat`, `nama_zakat`) VALUES
	('ZF', 'Zakat Fitrah'),
	('ZM', 'Zakat Maal'),
	('ZP', 'Zakat Penghasilan');
/*!40000 ALTER TABLE `zakat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
