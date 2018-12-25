-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table suryajaya.master_barang
DROP TABLE IF EXISTS `master_barang`;
CREATE TABLE IF NOT EXISTS `master_barang` (
  `kode_barang` char(10) NOT NULL,
  `nama_barang` char(100) DEFAULT NULL,
  `part_number` char(100) DEFAULT NULL,
  `nama_satuan` char(20) DEFAULT NULL,
  `min_qty` decimal(10,2) DEFAULT NULL,
  `qty_perset` decimal(10,2) DEFAULT NULL,
  `no_rak` char(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_barang: ~5 rows (approximately)
/*!40000 ALTER TABLE `master_barang` DISABLE KEYS */;
INSERT INTO `master_barang` (`kode_barang`, `nama_barang`, `part_number`, `nama_satuan`, `min_qty`, `qty_perset`, `no_rak`, `updated_at`, `created_at`) VALUES
	('BRG0001', 'Barang A', '123456', 'Pcs', 1.00, 4.00, '1A', '2018-12-16 05:16:38', '2018-12-16 05:16:38'),
	('BRG0002', 'Barang B', '987652', 'Pcs', 1.00, 6.00, '1B', NULL, NULL),
	('BRG0003', 'Barang C', '987652', 'Pcs', 1.00, 6.00, '1B', NULL, NULL),
	('BRG0004', 'Barang D', '987652', 'Pcs', 1.00, 6.00, '1D', NULL, NULL),
	('BRG0005', 'Barang E', '456789', 'Pcs', 1.00, 4.00, '1E', NULL, NULL);
/*!40000 ALTER TABLE `master_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_biaya_driver
DROP TABLE IF EXISTS `master_biaya_driver`;
CREATE TABLE IF NOT EXISTS `master_biaya_driver` (
  `kode_biaya_driver` char(10) NOT NULL,
  `ket_biaya_driver` text,
  `nom_biaya_driver` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`kode_biaya_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_biaya_driver: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_biaya_driver` DISABLE KEYS */;
INSERT INTO `master_biaya_driver` (`kode_biaya_driver`, `ket_biaya_driver`, `nom_biaya_driver`) VALUES
	('BDR0001', 'Biaya Jkt -> Sby', 2000000.00),
	('BDR0002', 'Biaya Sby -> Jkt', 1000000.00);
/*!40000 ALTER TABLE `master_biaya_driver` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_customer
DROP TABLE IF EXISTS `master_customer`;
CREATE TABLE IF NOT EXISTS `master_customer` (
  `kode_customer` char(10) NOT NULL,
  `nama_customer` char(100) DEFAULT NULL,
  `alamat_customer` varchar(1024) DEFAULT NULL,
  `kota_customer` char(100) DEFAULT NULL,
  `jenis_customer` char(10) DEFAULT NULL,
  `tlp_customer` char(20) DEFAULT NULL,
  PRIMARY KEY (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_customer: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_customer` DISABLE KEYS */;
INSERT INTO `master_customer` (`kode_customer`, `nama_customer`, `alamat_customer`, `kota_customer`, `jenis_customer`, `tlp_customer`) VALUES
	('CUST0001', 'Jono', 'Semampir Barat No.4', 'Surabaya', 'Customer', '081234234242'),
	('CUST0002', 'Boni', 'Semolowaru Timur No.8', 'Surabaya', 'Customer', '085242242424');
/*!40000 ALTER TABLE `master_customer` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_driver
DROP TABLE IF EXISTS `master_driver`;
CREATE TABLE IF NOT EXISTS `master_driver` (
  `kode_driver` char(10) NOT NULL,
  `nama_driver` char(100) DEFAULT NULL,
  `alamat_driver` varchar(1024) DEFAULT NULL,
  `kota_driver` char(100) DEFAULT NULL,
  `tlp_driver` char(20) DEFAULT NULL,
  `jenis_driver` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_driver: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_driver` DISABLE KEYS */;
INSERT INTO `master_driver` (`kode_driver`, `nama_driver`, `alamat_driver`, `kota_driver`, `tlp_driver`, `jenis_driver`) VALUES
	('DRV0001', 'Sugeng', 'Putat Jaya No.88', 'Surabaya', '085235789172', '0'),
	('DRV0002', 'Mulyadi', 'Lesti No.42', 'Surabaya', '088353678678', '1');
/*!40000 ALTER TABLE `master_driver` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_karyawan
DROP TABLE IF EXISTS `master_karyawan`;
CREATE TABLE IF NOT EXISTS `master_karyawan` (
  `kode_karyawan` char(10) NOT NULL,
  `nama_karyawan` char(100) DEFAULT NULL,
  `alamat_karyawan` varchar(1024) DEFAULT NULL,
  `kota_karyawan` char(100) DEFAULT NULL,
  `tlp_karyawan` char(20) DEFAULT NULL,
  `upah_harian` decimal(10,2) DEFAULT NULL,
  `upah_hari_besar` decimal(10,2) DEFAULT NULL,
  `upah_hari_minggu` decimal(10,2) DEFAULT NULL,
  `min_jam_lembur` decimal(10,2) DEFAULT NULL,
  `upah_lembur` decimal(10,2) DEFAULT NULL,
  `gaji_bulanan` decimal(10,2) DEFAULT NULL,
  `kerja_penuh_6x` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_karyawan: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_karyawan` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_karyawan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_kendaraan
DROP TABLE IF EXISTS `master_kendaraan`;
CREATE TABLE IF NOT EXISTS `master_kendaraan` (
  `kode_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` char(10) NOT NULL,
  `no_mesin` char(100) DEFAULT NULL,
  `no_rangka` char(100) DEFAULT NULL,
  `tipe_kendaraan` char(100) DEFAULT NULL,
  `jenis_kendaraan` char(100) DEFAULT NULL,
  `nama_pemilik` char(100) DEFAULT NULL,
  `thn_pembuatan` char(10) DEFAULT NULL,
  `no_bpkb` char(100) DEFAULT NULL,
  `warna_kendaraan` char(50) DEFAULT NULL,
  `masa_stnk` char(100) DEFAULT NULL,
  `cc_kendaraan` char(100) DEFAULT NULL,
  `sopir_kendaraan` char(100) DEFAULT NULL,
  `kernet_kendaraan` char(100) DEFAULT NULL,
  PRIMARY KEY (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_kendaraan: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_kendaraan` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_kendaraan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_supplier
DROP TABLE IF EXISTS `master_supplier`;
CREATE TABLE IF NOT EXISTS `master_supplier` (
  `kode_supplier` char(10) NOT NULL,
  `nama_supplier` char(100) DEFAULT NULL,
  `alamat_supplier` varchar(1024) DEFAULT NULL,
  `kota_supplier` char(100) DEFAULT NULL,
  `tlp_supplier` char(20) DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_supplier: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_supplier` DISABLE KEYS */;
INSERT INTO `master_supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `tlp_supplier`) VALUES
	('SUP0001', 'Sinar Sahabat', 'Mayjend Sungkono No.42', 'Surabaya', '085235252522'),
	('SUP0002', 'Murni Motor', 'HR Muhammad No.4A-4C', 'Surabaya', '0319878899');
/*!40000 ALTER TABLE `master_supplier` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_tujuan
DROP TABLE IF EXISTS `master_tujuan`;
CREATE TABLE IF NOT EXISTS `master_tujuan` (
  `kode_tujuan` char(10) NOT NULL,
  `ket_tujuan` text,
  PRIMARY KEY (`kode_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_tujuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_tujuan` DISABLE KEYS */;
INSERT INTO `master_tujuan` (`kode_tujuan`, `ket_tujuan`) VALUES
	('DST0001', 'SBY->JKT'),
	('DST0002', 'JKT->SBY');
/*!40000 ALTER TABLE `master_tujuan` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
