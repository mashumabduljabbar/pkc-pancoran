-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pkc-pancoran.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pkc-pancoran.jabatan: ~2 rows (approximately)
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
	(1, 'Admin');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
	(2, 'Perawat');

-- Dumping structure for table pkc-pancoran.lokasi
CREATE TABLE IF NOT EXISTS `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pkc-pancoran.lokasi: ~2 rows (approximately)
INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
	(1, 'Puskesmas Kecamatan Pancoran');
INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
	(2, 'Puskesmas Kelurahan Duren Tiga');

-- Dumping structure for table pkc-pancoran.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_lokasi_kerja` int(11) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pegawai`),
  KEY `FK_jabatan` (`id_jabatan`),
  KEY `FK_lokasi` (`id_lokasi_kerja`),
  CONSTRAINT `FK_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_lokasi` FOREIGN KEY (`id_lokasi_kerja`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pkc-pancoran.pegawai: ~3 rows (approximately)
INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `alamat`, `hp`, `id_jabatan`, `id_lokasi_kerja`, `createdAt`, `updatedAt`) VALUES
	(1, '101111405', 'Arif Rahman', 'Jl. Sawo No. 14', '08123475974', 1, 1, '2023-08-10 02:46:53', '2023-08-10 02:47:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
