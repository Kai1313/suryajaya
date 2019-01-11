-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table suryajaya.master_ban
DROP TABLE IF EXISTS `master_ban`;
CREATE TABLE IF NOT EXISTS `master_ban` (
  `kode_ban` char(10) NOT NULL,
  `nama_ban` char(100) DEFAULT NULL,
  `jenis_ban` char(1) DEFAULT NULL,
  `merk_ban` char(100) DEFAULT NULL,
  `ukuran_ban` char(200) DEFAULT NULL,
  `stok_baru` decimal(10,2) DEFAULT NULL,
  `stok_bekas` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_ban: ~3 rows (approximately)
/*!40000 ALTER TABLE `master_ban` DISABLE KEYS */;
INSERT INTO `master_ban` (`kode_ban`, `nama_ban`, `jenis_ban`, `merk_ban`, `ukuran_ban`, `stok_baru`, `stok_bekas`, `data_sts`) VALUES
	('BAN0001', 'Ban A', '1', 'Dunlop', '900-200', 2.00, 0.00, '1'),
	('BAN0002', 'Ban B', '0', 'Federal', '900-250', 0.00, 0.00, '1'),
	('BAN0003', 'Ban C', '2', 'IRC', '800-300', 0.00, 0.00, '1');
/*!40000 ALTER TABLE `master_ban` ENABLE KEYS */;

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
  `stok_barang` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_barang: ~5 rows (approximately)
/*!40000 ALTER TABLE `master_barang` DISABLE KEYS */;
INSERT INTO `master_barang` (`kode_barang`, `nama_barang`, `part_number`, `nama_satuan`, `min_qty`, `qty_perset`, `no_rak`, `stok_barang`, `data_sts`, `updated_at`, `created_at`) VALUES
	('BRG0001', 'Barang A', '123456', 'Pcs', 1.00, 4.00, '1A', 4.00, '1', '2018-12-16 05:16:38', '2018-12-16 05:16:38'),
	('BRG0002', 'Barang B', '987652', 'Pcs', 1.00, 6.00, '1B', 15.00, '1', NULL, NULL),
	('BRG0003', 'Barang C', '987652', 'Pcs', 1.00, 6.00, '1B', 6.00, '1', NULL, NULL),
	('BRG0004', 'Barang D', '987652', 'Pcs', 1.00, 6.00, '1D', 0.00, '1', NULL, NULL),
	('BRG0005', 'Barang E', '456789', 'Pcs', 1.00, 4.00, '1E', 6.00, '1', NULL, NULL);
/*!40000 ALTER TABLE `master_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_biaya_driver
DROP TABLE IF EXISTS `master_biaya_driver`;
CREATE TABLE IF NOT EXISTS `master_biaya_driver` (
  `kode_biaya_driver` char(10) NOT NULL,
  `ket_biaya_driver` text,
  `nom_biaya_driver` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_biaya_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_biaya_driver: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_biaya_driver` DISABLE KEYS */;
INSERT INTO `master_biaya_driver` (`kode_biaya_driver`, `ket_biaya_driver`, `nom_biaya_driver`, `data_sts`) VALUES
	('BDR0001', 'Biaya Jkt -> Sby', 2000000.00, '1'),
	('BDR0002', 'Biaya Sby -> Jkt', 1000000.00, '1');
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
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_customer: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_customer` DISABLE KEYS */;
INSERT INTO `master_customer` (`kode_customer`, `nama_customer`, `alamat_customer`, `kota_customer`, `jenis_customer`, `tlp_customer`, `data_sts`) VALUES
	('CUST0001', 'Jono', 'Semampir Barat No.4', 'Surabaya', 'Customer', '081234234242', '1'),
	('CUST0002', 'Boni', 'Semolowaru Timur No.8', 'Surabaya', 'Customer', '085242242424', '1');
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
  `jml_bon` decimal(10,2) DEFAULT NULL,
  `jml_klaim` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_driver: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_driver` DISABLE KEYS */;
INSERT INTO `master_driver` (`kode_driver`, `nama_driver`, `alamat_driver`, `kota_driver`, `tlp_driver`, `jenis_driver`, `jml_bon`, `jml_klaim`, `data_sts`) VALUES
	('DRV0001', 'Sugeng', 'Putat Jaya No.88', 'Surabaya', '085235789172', '0', 0.00, 0.00, '1'),
	('DRV0002', 'Mulyadi', 'Lesti No.42', 'Surabaya', '088353678678', '1', 0.00, 0.00, '1');
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
  `jml_bon` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_karyawan: ~1 rows (approximately)
/*!40000 ALTER TABLE `master_karyawan` DISABLE KEYS */;
INSERT INTO `master_karyawan` (`kode_karyawan`, `nama_karyawan`, `alamat_karyawan`, `kota_karyawan`, `tlp_karyawan`, `upah_harian`, `upah_hari_besar`, `upah_hari_minggu`, `min_jam_lembur`, `upah_lembur`, `gaji_bulanan`, `kerja_penuh_6x`, `jml_bon`, `data_sts`) VALUES
	('KRY00001', 'Hendro', 'Semolowaru Utara No.42, Sukolilo', 'Surabaya', '083335335627', 100000.00, 150000.00, 120000.00, 2.00, 50000.00, 3000000.00, 500000.00, 0.00, '1');
/*!40000 ALTER TABLE `master_karyawan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_kendaraan
DROP TABLE IF EXISTS `master_kendaraan`;
CREATE TABLE IF NOT EXISTS `master_kendaraan` (
  `kode_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` char(10) NOT NULL,
  `sopir_kendaraan` char(10) DEFAULT NULL,
  `kernet_kendaraan` char(10) DEFAULT NULL,
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
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_kendaraan: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_kendaraan` DISABLE KEYS */;
INSERT INTO `master_kendaraan` (`kode_kendaraan`, `nopol`, `sopir_kendaraan`, `kernet_kendaraan`, `no_mesin`, `no_rangka`, `tipe_kendaraan`, `jenis_kendaraan`, `nama_pemilik`, `thn_pembuatan`, `no_bpkb`, `warna_kendaraan`, `masa_stnk`, `cc_kendaraan`, `data_sts`) VALUES
	(1, 'P3251ZS', 'DRV0001', 'DRV0002', '12831991', '10230301', 'Honda', 'Pick Up', 'Joko', '2000', '12023391', 'Hitam', '2020', '2500', '1'),
	(2, 'B2345XS', 'DRV0001', 'DRV0002', '01010291', '29304813', 'Dino', 'Dump Truck', 'Kuri', '2012', '4944505', 'Kuning', '2020', '5000', '1');
/*!40000 ALTER TABLE `master_kendaraan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_supplier
DROP TABLE IF EXISTS `master_supplier`;
CREATE TABLE IF NOT EXISTS `master_supplier` (
  `kode_supplier` char(10) NOT NULL,
  `nama_supplier` char(100) DEFAULT NULL,
  `alamat_supplier` varchar(1024) DEFAULT NULL,
  `kota_supplier` char(100) DEFAULT NULL,
  `tlp_supplier` char(20) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_supplier: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_supplier` DISABLE KEYS */;
INSERT INTO `master_supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `tlp_supplier`, `data_sts`) VALUES
	('SUP0001', 'Sinar Sahabat', 'Mayjend Sungkono No.42', 'Surabaya', '085235252522', '1'),
	('SUP0002', 'Murni Motor', 'HR Muhammad No.4A-4C', 'Surabaya', '0319878899', '1');
/*!40000 ALTER TABLE `master_supplier` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_tujuan
DROP TABLE IF EXISTS `master_tujuan`;
CREATE TABLE IF NOT EXISTS `master_tujuan` (
  `kode_tujuan` char(10) NOT NULL,
  `ket_tujuan` text,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_tujuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_tujuan` DISABLE KEYS */;
INSERT INTO `master_tujuan` (`kode_tujuan`, `ket_tujuan`, `data_sts`) VALUES
	('DST0001', 'SBY->JKT', '1'),
	('DST0002', 'JKT->SBY', '1');
/*!40000 ALTER TABLE `master_tujuan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_beli_ban
DROP TABLE IF EXISTS `trx_beli_ban`;
CREATE TABLE IF NOT EXISTS `trx_beli_ban` (
  `no_pembelian` char(20) NOT NULL,
  `kode_supplier` char(10) DEFAULT NULL,
  `nota_toko` char(50) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_pembelian`),
  KEY `FK_trx_beli_ban_master_supplier` (`kode_supplier`),
  CONSTRAINT `FK_trx_beli_ban_master_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `master_supplier` (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_ban: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_ban` DISABLE KEYS */;
INSERT INTO `trx_beli_ban` (`no_pembelian`, `kode_supplier`, `nota_toko`, `tgl_pembelian`, `grand_total`, `data_sts`) VALUES
	('BL1901-000001', NULL, NULL, '2019-01-06', NULL, '0'),
	('BL1901-000002', 'SUP0001', 'SH12345', '2019-01-06', 2000000.00, '1');
/*!40000 ALTER TABLE `trx_beli_ban` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_beli_ban_det
DROP TABLE IF EXISTS `trx_beli_ban_det`;
CREATE TABLE IF NOT EXISTS `trx_beli_ban_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pembelian` char(20) DEFAULT NULL,
  `kode_ban` char(10) DEFAULT NULL,
  `qty_beli` decimal(10,2) DEFAULT NULL,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_beli_ban_det_trx_beli_ban` (`no_pembelian`),
  KEY `FK_trx_beli_ban_det_master_ban` (`kode_ban`),
  CONSTRAINT `FK_trx_beli_ban_det_master_ban` FOREIGN KEY (`kode_ban`) REFERENCES `master_ban` (`kode_ban`),
  CONSTRAINT `FK_trx_beli_ban_det_trx_beli_ban` FOREIGN KEY (`no_pembelian`) REFERENCES `trx_beli_ban` (`no_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_ban_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_ban_det` DISABLE KEYS */;
INSERT INTO `trx_beli_ban_det` (`det_id`, `no_pembelian`, `kode_ban`, `qty_beli`, `harga_satuan`, `jumlah`) VALUES
	(2, 'BL1901-000002', 'BAN0001', 2.00, 1000000.00, 2000000.00),
	(3, NULL, NULL, NULL, NULL, 0.00);
/*!40000 ALTER TABLE `trx_beli_ban_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_beli_barang
DROP TABLE IF EXISTS `trx_beli_barang`;
CREATE TABLE IF NOT EXISTS `trx_beli_barang` (
  `no_nota` char(20) NOT NULL,
  `kode_supplier` char(10) DEFAULT NULL,
  `nota_toko` char(50) DEFAULT NULL,
  `tgl_nota` date DEFAULT NULL,
  `diskon` decimal(10,2) DEFAULT NULL,
  `nom_diskon` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_nota`),
  KEY `FK_trx_beli_barang_master_supplier` (`kode_supplier`),
  CONSTRAINT `FK_trx_beli_barang_master_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `master_supplier` (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_barang` DISABLE KEYS */;
INSERT INTO `trx_beli_barang` (`no_nota`, `kode_supplier`, `nota_toko`, `tgl_nota`, `diskon`, `nom_diskon`, `grand_total`, `data_sts`) VALUES
	('SK1901-000001', NULL, NULL, '2019-01-04', NULL, NULL, NULL, '0'),
	('SK1901-000002', 'SUP0002', 'SJ12345', '2019-01-01', 0.00, 0.00, 520000.00, '1'),
	('SK1901-000003', NULL, NULL, '2019-01-05', NULL, NULL, NULL, '0');
/*!40000 ALTER TABLE `trx_beli_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_beli_barang_det
DROP TABLE IF EXISTS `trx_beli_barang_det`;
CREATE TABLE IF NOT EXISTS `trx_beli_barang_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_nota` char(20) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `qty_beli` decimal(10,2) DEFAULT NULL,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_beli_barang_det_trx_beli_barang` (`no_nota`),
  KEY `FK_trx_beli_barang_det_master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_beli_barang_det_master_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_beli_barang_det_trx_beli_barang` FOREIGN KEY (`no_nota`) REFERENCES `trx_beli_barang` (`no_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_barang_det: ~5 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_barang_det` DISABLE KEYS */;
INSERT INTO `trx_beli_barang_det` (`det_id`, `no_nota`, `kode_barang`, `qty_beli`, `harga_satuan`, `jumlah`) VALUES
	(1, 'SK1901-000001', 'BRG0001', 4.00, 200000.00, 800000.00),
	(2, 'SK1901-000002', 'BRG0002', 2.00, 200000.00, 400000.00),
	(3, 'SK1901-000002', 'BRG0002', 3.00, 20000.00, 60000.00),
	(4, 'SK1901-000002', 'BRG0003', 2.00, 20000.00, 40000.00),
	(5, 'SK1901-000002', 'BRG0005', 2.00, 10000.00, 20000.00);
/*!40000 ALTER TABLE `trx_beli_barang_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_biaya_kendaraan
DROP TABLE IF EXISTS `trx_biaya_kendaraan`;
CREATE TABLE IF NOT EXISTS `trx_biaya_kendaraan` (
  `no_biaya` char(20) NOT NULL,
  `kode_karyawan` char(10) DEFAULT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `sopir_kendaraan` char(10) DEFAULT NULL,
  `kernet_kendaraan` char(10) DEFAULT NULL,
  `tgl_biaya` date DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_biaya`),
  KEY `FK_trx_biaya_kendaraan_master_karyawan` (`kode_karyawan`),
  KEY `FK_trx_biaya_kendaraan_master_kendaraan` (`kode_kendaraan`),
  KEY `FK_trx_biaya_kendaraan_master_driver` (`sopir_kendaraan`),
  KEY `FK_trx_biaya_kendaraan_master_driver_2` (`kernet_kendaraan`),
  CONSTRAINT `FK_trx_biaya_kendaraan_master_driver` FOREIGN KEY (`sopir_kendaraan`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_biaya_kendaraan_master_driver_2` FOREIGN KEY (`kernet_kendaraan`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_biaya_kendaraan_master_karyawan` FOREIGN KEY (`kode_karyawan`) REFERENCES `master_karyawan` (`kode_karyawan`),
  CONSTRAINT `FK_trx_biaya_kendaraan_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_biaya_kendaraan: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_biaya_kendaraan` DISABLE KEYS */;
INSERT INTO `trx_biaya_kendaraan` (`no_biaya`, `kode_karyawan`, `kode_kendaraan`, `sopir_kendaraan`, `kernet_kendaraan`, `tgl_biaya`, `grand_total`, `data_sts`) VALUES
	('BY1901-000001', 'KRY00001', 1, 'DRV0001', 'DRV0002', '2019-01-08', 100000.00, '1'),
	('BY1901-000002', 'KRY00001', 1, 'DRV0001', 'DRV0002', '2019-01-08', 1000000.00, '0');
/*!40000 ALTER TABLE `trx_biaya_kendaraan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_biaya_kendaraan_det
DROP TABLE IF EXISTS `trx_biaya_kendaraan_det`;
CREATE TABLE IF NOT EXISTS `trx_biaya_kendaraan_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_biaya` char(20) DEFAULT NULL,
  `keterangan` text,
  `jumlah` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_biaya_kendaraan_det_trx_biaya_kendaraan` (`no_biaya`),
  CONSTRAINT `FK_trx_biaya_kendaraan_det_trx_biaya_kendaraan` FOREIGN KEY (`no_biaya`) REFERENCES `trx_biaya_kendaraan` (`no_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_biaya_kendaraan_det: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_biaya_kendaraan_det` DISABLE KEYS */;
INSERT INTO `trx_biaya_kendaraan_det` (`det_id`, `no_biaya`, `keterangan`, `jumlah`) VALUES
	(1, 'BY1901-000001', 'tes 1', 100000.00),
	(2, 'BY1901-000002', 'tes 2', 1000000.00);
/*!40000 ALTER TABLE `trx_biaya_kendaraan_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_input_bon_karyawan
DROP TABLE IF EXISTS `trx_input_bon_karyawan`;
CREATE TABLE IF NOT EXISTS `trx_input_bon_karyawan` (
  `no_bon` char(20) NOT NULL,
  `kode_karyawan` char(10) DEFAULT NULL,
  `tgl_bon` date DEFAULT NULL,
  `nom_bon` decimal(10,2) DEFAULT NULL,
  `ket_bon` text,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_bon`),
  KEY `FK_trx_input_bon_karyawan_master_karyawan` (`kode_karyawan`),
  CONSTRAINT `FK_trx_input_bon_karyawan_master_karyawan` FOREIGN KEY (`kode_karyawan`) REFERENCES `master_karyawan` (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_input_bon_karyawan: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_input_bon_karyawan` DISABLE KEYS */;
INSERT INTO `trx_input_bon_karyawan` (`no_bon`, `kode_karyawan`, `tgl_bon`, `nom_bon`, `ket_bon`, `data_sts`) VALUES
	('BON1901-000001', 'KRY00001', '2019-01-11', 10000.00, 'Tes Bon', '0');
/*!40000 ALTER TABLE `trx_input_bon_karyawan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_input_bon_sopir
DROP TABLE IF EXISTS `trx_input_bon_sopir`;
CREATE TABLE IF NOT EXISTS `trx_input_bon_sopir` (
  `no_bon` char(20) NOT NULL,
  `kode_driver` char(10) DEFAULT NULL,
  `tgl_bon` date DEFAULT NULL,
  `ket_bon` text,
  `nom_bon` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_bon`),
  KEY `FK_trx_input_bon_sopir_master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_input_bon_sopir_master_driver` FOREIGN KEY (`kode_driver`) REFERENCES `master_driver` (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_input_bon_sopir: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_input_bon_sopir` DISABLE KEYS */;
INSERT INTO `trx_input_bon_sopir` (`no_bon`, `kode_driver`, `tgl_bon`, `ket_bon`, `nom_bon`, `data_sts`) VALUES
	('BONS1901-000001', 'DRV0001', '2019-01-12', 'tes bon sopir', 10000.00, '0'),
	('BONS1901-000002', NULL, '2019-01-12', NULL, NULL, '0');
/*!40000 ALTER TABLE `trx_input_bon_sopir` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_input_kas
DROP TABLE IF EXISTS `trx_input_kas`;
CREATE TABLE IF NOT EXISTS `trx_input_kas` (
  `no_kas` char(20) NOT NULL,
  `tgl_kas` date DEFAULT NULL,
  `debet` decimal(10,2) DEFAULT NULL,
  `kredit` decimal(10,2) DEFAULT NULL,
  `ket_kas` text,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_kas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_input_kas: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_input_kas` DISABLE KEYS */;
INSERT INTO `trx_input_kas` (`no_kas`, `tgl_kas`, `debet`, `kredit`, `ket_kas`, `data_sts`) VALUES
	('KAS1901-000001', '2019-01-11', 100000.00, 0.00, 'tes debet', '1'),
	('KAS1901-000002', '2019-01-11', 0.00, 10000.00, 'tes kredit', '1');
/*!40000 ALTER TABLE `trx_input_kas` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_input_klaim_sopir
DROP TABLE IF EXISTS `trx_input_klaim_sopir`;
CREATE TABLE IF NOT EXISTS `trx_input_klaim_sopir` (
  `no_klaim` char(20) NOT NULL,
  `kode_driver` char(10) DEFAULT NULL,
  `tgl_klaim` date DEFAULT NULL,
  `ket_klaim` text,
  `nom_klaim` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_klaim`),
  KEY `FK_trx_input_klaim_sopir_master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_input_klaim_sopir_master_driver` FOREIGN KEY (`kode_driver`) REFERENCES `master_driver` (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_input_klaim_sopir: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_input_klaim_sopir` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_input_klaim_sopir` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pakai_barang
DROP TABLE IF EXISTS `trx_pakai_barang`;
CREATE TABLE IF NOT EXISTS `trx_pakai_barang` (
  `no_pakai_brg` char(20) NOT NULL,
  `kode_karyawan` char(10) DEFAULT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `kode_sopir` char(10) DEFAULT NULL,
  `kode_kernet` char(10) DEFAULT NULL,
  `tgl_pakai_brg` date DEFAULT NULL,
  `ket_pakai_brg` text,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_pakai_brg`),
  KEY `FK_trx_pakai_barang_master_karyawan` (`kode_karyawan`),
  KEY `FK_trx_pakai_barang_master_kendaraan` (`kode_kendaraan`),
  KEY `FK_trx_pakai_barang_master_driver` (`kode_sopir`),
  KEY `FK_trx_pakai_barang_master_driver_2` (`kode_kernet`),
  CONSTRAINT `FK_trx_pakai_barang_master_driver` FOREIGN KEY (`kode_sopir`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_pakai_barang_master_driver_2` FOREIGN KEY (`kode_kernet`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_pakai_barang_master_karyawan` FOREIGN KEY (`kode_karyawan`) REFERENCES `master_karyawan` (`kode_karyawan`),
  CONSTRAINT `FK_trx_pakai_barang_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pakai_barang: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_pakai_barang` DISABLE KEYS */;
INSERT INTO `trx_pakai_barang` (`no_pakai_brg`, `kode_karyawan`, `kode_kendaraan`, `kode_sopir`, `kode_kernet`, `tgl_pakai_brg`, `ket_pakai_brg`, `data_sts`) VALUES
	('JL1901-000001', 'KRY00001', 1, 'DRV0001', 'DRV0002', '2019-01-06', 'tes a', '1');
/*!40000 ALTER TABLE `trx_pakai_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pakai_barang_det
DROP TABLE IF EXISTS `trx_pakai_barang_det`;
CREATE TABLE IF NOT EXISTS `trx_pakai_barang_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pakai_brg` char(20) DEFAULT NULL,
  `kode_barang` char(10) DEFAULT NULL,
  `qty_pakai` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_pakai_barang_det_trx_pakai_barang` (`no_pakai_brg`),
  KEY `FK_trx_pakai_barang_det_master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_pakai_barang_det_master_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_pakai_barang_det_trx_pakai_barang` FOREIGN KEY (`no_pakai_brg`) REFERENCES `trx_pakai_barang` (`no_pakai_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pakai_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pakai_barang_det` DISABLE KEYS */;
INSERT INTO `trx_pakai_barang_det` (`det_id`, `no_pakai_brg`, `kode_barang`, `qty_pakai`) VALUES
	(12, 'JL1901-000001', 'BRG0001', 4.00);
/*!40000 ALTER TABLE `trx_pakai_barang_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_retur_beli_barang
DROP TABLE IF EXISTS `trx_retur_beli_barang`;
CREATE TABLE IF NOT EXISTS `trx_retur_beli_barang` (
  `no_retur` char(20) NOT NULL,
  `no_nota` char(20) DEFAULT NULL,
  `tgl_retur` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_retur`),
  KEY `FK_trx_retur_beli_barang_trx_beli_barang` (`no_nota`),
  CONSTRAINT `FK_trx_retur_beli_barang_trx_beli_barang` FOREIGN KEY (`no_nota`) REFERENCES `trx_beli_barang` (`no_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_beli_barang: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_beli_barang` DISABLE KEYS */;
INSERT INTO `trx_retur_beli_barang` (`no_retur`, `no_nota`, `tgl_retur`, `data_sts`) VALUES
	('RBL1901-000001', 'SK1901-000002', '2019-01-08', '1');
/*!40000 ALTER TABLE `trx_retur_beli_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_retur_beli_barang_det
DROP TABLE IF EXISTS `trx_retur_beli_barang_det`;
CREATE TABLE IF NOT EXISTS `trx_retur_beli_barang_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_retur` char(20) DEFAULT NULL,
  `kode_barang` char(10) DEFAULT NULL,
  `qty_retur` decimal(10,2) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_retur_beli_barang_det_trx_retur_beli_barang` (`no_retur`),
  KEY `FK_trx_retur_beli_barang_det_master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_retur_beli_barang_det_master_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_retur_beli_barang_det_trx_retur_beli_barang` FOREIGN KEY (`no_retur`) REFERENCES `trx_retur_beli_barang` (`no_retur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_beli_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_beli_barang_det` DISABLE KEYS */;
INSERT INTO `trx_retur_beli_barang_det` (`det_id`, `no_retur`, `kode_barang`, `qty_retur`, `jumlah`) VALUES
	(2, 'RBL1901-000001', 'BRG0001', 2.00, 2.00);
/*!40000 ALTER TABLE `trx_retur_beli_barang_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_retur_pakai_barang
DROP TABLE IF EXISTS `trx_retur_pakai_barang`;
CREATE TABLE IF NOT EXISTS `trx_retur_pakai_barang` (
  `no_retur` char(20) NOT NULL,
  `no_pakai_brg` char(20) DEFAULT NULL,
  `tgl_retur` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_retur`),
  KEY `FK_trx_retur_pakai_barang_trx_pakai_barang` (`no_pakai_brg`),
  CONSTRAINT `FK_trx_retur_pakai_barang_trx_pakai_barang` FOREIGN KEY (`no_pakai_brg`) REFERENCES `trx_pakai_barang` (`no_pakai_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_pakai_barang: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_pakai_barang` DISABLE KEYS */;
INSERT INTO `trx_retur_pakai_barang` (`no_retur`, `no_pakai_brg`, `tgl_retur`, `data_sts`) VALUES
	('RJL1901-000001', 'JL1901-000001', '2019-01-08', '1');
/*!40000 ALTER TABLE `trx_retur_pakai_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_retur_pakai_barang_det
DROP TABLE IF EXISTS `trx_retur_pakai_barang_det`;
CREATE TABLE IF NOT EXISTS `trx_retur_pakai_barang_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_retur` char(20) DEFAULT NULL,
  `kode_barang` char(10) DEFAULT NULL,
  `qty_retur` decimal(10,2) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_retur_pakai_barang_det_trx_retur_pakai_barang` (`no_retur`),
  KEY `FK_trx_retur_pakai_barang_det_master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_retur_pakai_barang_det_master_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_retur_pakai_barang_det_trx_retur_pakai_barang` FOREIGN KEY (`no_retur`) REFERENCES `trx_retur_pakai_barang` (`no_retur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_pakai_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_pakai_barang_det` DISABLE KEYS */;
INSERT INTO `trx_retur_pakai_barang_det` (`det_id`, `no_retur`, `kode_barang`, `qty_retur`, `jumlah`) VALUES
	(1, 'RJL1901-000001', 'BRG0001', 2.00, 2.00);
/*!40000 ALTER TABLE `trx_retur_pakai_barang_det` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
