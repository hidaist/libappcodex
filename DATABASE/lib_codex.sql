-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_perpustakaan.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `kd_barang` varchar(6) NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.stok: 0 rows
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;

-- Dumping structure for table db_perpustakaan.tb_lib_buku
CREATE TABLE IF NOT EXISTS `tb_lib_buku` (
  `kd_buku` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `isbn` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `judul_buku` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `penulis` varchar(100) NOT NULL DEFAULT '0',
  `penerbit` varchar(100) NOT NULL DEFAULT '0',
  `tahun_terbit` varchar(100) NOT NULL DEFAULT '0',
  `stok` int NOT NULL DEFAULT '0',
  `kd_rak` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `keterangan_buku` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `filegambar` varchar(500) NOT NULL,
  `harga_buku` int NOT NULL,
  `sumber` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`kd_buku`) USING BTREE,
  KEY `Index 2` (`judul_buku`),
  KEY `FK_tb_lib_buku_tb_lib_rak_buku` (`kd_rak`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.tb_lib_buku: 7 rows
/*!40000 ALTER TABLE `tb_lib_buku` DISABLE KEYS */;
INSERT INTO `tb_lib_buku` (`kd_buku`, `isbn`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `kd_rak`, `keterangan_buku`, `filegambar`, `harga_buku`, `sumber`) VALUES
	('INV-668544fbca5a5', '132-254-333', 'Firasat', 'Imam Fakhruddin Ar-Razi', 'Turos', '2024', 12, 'KRB-68a9a5d5add5d', 'Mengenal Karakter Diri ', '68b163f8d543e.jpg', 150000, 'Dana Bos'),
	('INV-6720fbfa12b6e', '198-852-465', 'Ihiya Ulumudin jilid 1', 'Imam Al Ghozali', 'Republika', '2022', 2, 'KRB-68a9a5d5add5d', 'Ilmu dan Keyakinan', '68b163a38ac2b.jpg', 85000, 'Apalah'),
	('INV-67219a72305b3', '354-856-123', 'Ihiya Ulumudin jilid 2', 'Imam Al Ghozali', 'Republika', '2022', 15, 'KRB-68a9a5d5add5d', 'Rahasia Ibadah', '68b163ade7a6b.jpg', 0, 'Bantuan Negara'),
	('INV-67219acbc05a5', '1123665', 'Ihiya Ulumudin jilid 3', 'Imam Al Ghozali', 'Republika', '2022', 0, 'KRB-68a9a5d5add5d', 'Akhlak dan Keseharian', '68b163c116f95.jpg', 100000, 'Hibah'),
	('INV-67219f8f76301', '558641', 'Ihiya Ulumudin jilid 4', 'Imam Al Ghozali', 'Republika', '2022', 4, 'KRG-6720984fb1b5d', ' Keajaiban Kalbu', '68b163e2e00db.jpg', 87000, 'Mandiri'),
	('INV-6721abbf22f72', '556824', 'Ihiya Ulumudin jilid 5', 'Imam Al Ghozali', 'Republika', '2022', 8, 'KRG-6720984fb1b5d', ' ', '6721abdcb761d.jpg', 125000, 'Dana Bos'),
	('INV-6739c246dff10', '9786237327912', 'Ihiya Ulumudin jilid 6', 'Imam Al Ghozali', 'Republika', '2022', 0, 'KRG-6720984fb1b5d', ' Dunia dan Segala godaannya', '6739c260b93a3.jpg', 130000, 'Hibah');
/*!40000 ALTER TABLE `tb_lib_buku` ENABLE KEYS */;

-- Dumping structure for table db_perpustakaan.tb_lib_denda
CREATE TABLE IF NOT EXISTS `tb_lib_denda` (
  `kd_denda` varchar(50) DEFAULT NULL,
  `kd_kembali` varchar(50) DEFAULT NULL,
  `jumlah_hari` varchar(50) DEFAULT NULL,
  `tarif` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_perpustakaan.tb_lib_denda: ~0 rows (approximately)

-- Dumping structure for table db_perpustakaan.tb_lib_peminjaman
CREATE TABLE IF NOT EXISTS `tb_lib_peminjaman` (
  `kd_pinjam` varchar(20) NOT NULL,
  `kd_buku` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kd_user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_pinjam` date NOT NULL,
  `keterangan_pinjam` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_pinjam`),
  KEY `FK_tb_lib_peminjaman_tb_lib_buku` (`kd_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.tb_lib_peminjaman: 9 rows
/*!40000 ALTER TABLE `tb_lib_peminjaman` DISABLE KEYS */;
INSERT INTO `tb_lib_peminjaman` (`kd_pinjam`, `kd_buku`, `kd_user`, `date_pinjam`, `keterangan_pinjam`) VALUES
	('PJB-66855354b097f', 'INV-668544fbca5a5', 'USR-667ba6ceafa37', '2024-07-03', 'buat maen'),
	('PJB-672ac6f58a9c1', 'INV-67219acbc05a5', 'IDU-68ab1b40df0c0', '2024-11-06', 'TES KD_BARANG'),
	('PJB-672ac6f58a9c2', 'INV-67219acbc05a5', 'IDU-68ab1b40df0c0', '2024-11-06', 'tes join'),
	('PJB-68ae7ecdd97b9', 'INV-668544fbca5a5', 'USR-667ba6ceafa37', '2025-08-27', ' '),
	('PJB-68ae83bca5e29', 'INV-668544fbca5a5', 'IDU-68ae826a168eb', '2025-08-27', ' '),
	('PJB-68aff911c83fd', 'INV-6739c246dff10', 'IDU-68ae826a168eb', '2025-08-28', ' '),
	('PJB-68b0073669fa7', 'INV-67219acbc05a5', 'USR-667ba6ceafa37', '2025-08-28', ' '),
	('PJB-68b087faa1e35', 'INV-67219f8f76301', 'IDU-68ab1b40df0c0', '2025-08-28', ' '),
	('PJB-68b0882b9177c', 'INV-67219f8f76301', 'USR-667ba6ceafa37', '2025-08-28', ' ');
/*!40000 ALTER TABLE `tb_lib_peminjaman` ENABLE KEYS */;

-- Dumping structure for table db_perpustakaan.tb_lib_pengembalian
CREATE TABLE IF NOT EXISTS `tb_lib_pengembalian` (
  `kd_kembali` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kd_pinjam` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kd_buku` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_kembali` date NOT NULL,
  PRIMARY KEY (`kd_kembali`),
  KEY `FK_tb_lib_pengembalian_tb_lib_buku` (`kd_buku`),
  KEY `FK_tb_lib_pengembalian_tb_lib_peminjaman` (`kd_pinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.tb_lib_pengembalian: 3 rows
/*!40000 ALTER TABLE `tb_lib_pengembalian` DISABLE KEYS */;
INSERT INTO `tb_lib_pengembalian` (`kd_kembali`, `kd_pinjam`, `kd_buku`, `date_kembali`) VALUES
	('KJB-668555f19b610', 'PJB-66855354b097f', 'INV-668544fbca5a5', '2024-07-03'),
	('KJB-672c06dfc709c', 'PJB-672ac6f58a9c1', 'INV-6721abbf22f72', '2024-11-07'),
	('KPB-68afd3c1115a1', 'PJB-672ac6f58a9c2', 'Ihiya Ulumudin jilid 3', '2025-08-28');
/*!40000 ALTER TABLE `tb_lib_pengembalian` ENABLE KEYS */;

-- Dumping structure for table db_perpustakaan.tb_lib_rak_buku
CREATE TABLE IF NOT EXISTS `tb_lib_rak_buku` (
  `kd_rak` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nm_rak` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detail_rak` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`kd_rak`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.tb_lib_rak_buku: 2 rows
/*!40000 ALTER TABLE `tb_lib_rak_buku` DISABLE KEYS */;
INSERT INTO `tb_lib_rak_buku` (`kd_rak`, `nm_rak`, `detail_rak`) VALUES
	('KRB-68a9a5d5add5d', 'RAK-Sosial', 'apalah\r\n'),
	('KRG-6720984fb1b5d', 'RAK-Agama', 'Ruang Atas 1');
/*!40000 ALTER TABLE `tb_lib_rak_buku` ENABLE KEYS */;

-- Dumping structure for table db_perpustakaan.tb_lib_users
CREATE TABLE IF NOT EXISTS `tb_lib_users` (
  `kd_user` varchar(50) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `nama` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(500) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `attemp` int DEFAULT NULL,
  `last_attemp` datetime DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kd_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_perpustakaan.tb_lib_users: 3 rows
/*!40000 ALTER TABLE `tb_lib_users` DISABLE KEYS */;
INSERT INTO `tb_lib_users` (`kd_user`, `id`, `nama`, `username`, `email`, `password`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl`, `foto`, `level`, `status`, `attemp`, `last_attemp`, `create_at`) VALUES
	('USR-667ba6ceafa37', '121213', 'Muhammad Admin Administrator', 'admin', 'roki@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Laki-laki', 'Jalan-jalan Pagi\r\n', 'Bantul', '2024-06-26', '68ab0ca86fe48.jpg', 'admin', 'Aktif', 0, NULL, '2025-08-18 04:57:14'),
	('IDU-68ab1b40df0c0', '20251154', 'Muhammad Ardinanta', 'coba', 'ms@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Laki-laki', 'puriss', 'Yogyakarta', '2025-08-05', '68ab1d654b9c2.jpg', 'anggota', 'aktif', 0, NULL, '2025-08-24 14:10:45'),
	('IDU-68ae826a168eb', '2025050887', 'Mas D', 'dhais', 'reds_cloud@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Laki-laki', 'asdf', 'Bantul', '1987-08-05', '68ae82d1e8b3f.jpg', 'admin', 'Aktif', NULL, '2025-08-29 08:46:06', '2025-08-27 04:00:18');
/*!40000 ALTER TABLE `tb_lib_users` ENABLE KEYS */;

-- Dumping structure for trigger db_perpustakaan.deletpinjambarang
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `deletpinjambarang` AFTER DELETE ON `tb_lib_peminjaman` FOR EACH ROW UPDATE tb_lib_buku
    SET stok = stok + 1
    WHERE kd_buku = OLD.kd_buku//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_perpustakaan.pengembalianBuku
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pengembalianBuku` AFTER INSERT ON `tb_lib_pengembalian` FOR EACH ROW UPDATE tb_lib_buku
    SET stok = stok + 1
    WHERE kd_buku = NEW.kd_buku//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_perpustakaan.pinjamBuku
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pinjamBuku` AFTER INSERT ON `tb_lib_peminjaman` FOR EACH ROW UPDATE tb_lib_buku
    SET stok = stok - 1
    WHERE kd_buku = NEW.kd_buku//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
