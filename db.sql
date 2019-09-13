-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table suryajaya.hak_akses
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE IF NOT EXISTS `hak_akses` (
  `user_id` int(11) NOT NULL,
  `trx_id` int(11) NOT NULL,
  `simpan` char(1) DEFAULT NULL,
  `hapus` char(1) DEFAULT NULL,
  `update` char(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`trx_id`),
  KEY `FK_hak_akses_trx_list` (`trx_id`),
  CONSTRAINT `FK_hak_akses_trx_list` FOREIGN KEY (`trx_id`) REFERENCES `trx_list` (`id`),
  CONSTRAINT `FK_hak_akses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.hak_akses: ~31 rows (approximately)
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`user_id`, `trx_id`, `simpan`, `hapus`, `update`) VALUES
	(1, 1, '1', '1', '1'),
	(1, 2, '1', '1', '1'),
	(1, 3, '1', '1', '1'),
	(1, 4, '1', '1', '1'),
	(1, 5, '1', '1', '1'),
	(1, 6, '1', '1', '1'),
	(1, 7, '1', '1', '1'),
	(1, 8, '1', '1', '1'),
	(1, 9, '1', '1', '1'),
	(1, 10, '1', '1', '1'),
	(1, 11, '1', '1', '1'),
	(1, 12, '1', '1', '1'),
	(1, 13, '1', '1', '1'),
	(1, 14, '1', '1', '1'),
	(1, 15, '1', '1', '1'),
	(1, 16, '1', '1', '1'),
	(1, 17, '1', '1', '1'),
	(1, 18, '1', '1', '1'),
	(1, 19, '1', '1', '1'),
	(1, 20, '1', '1', '1'),
	(1, 21, '1', '1', '1'),
	(1, 22, '1', '1', '1'),
	(1, 23, '1', '1', '1'),
	(1, 24, '1', '1', '1'),
	(1, 25, '1', '1', '1'),
	(1, 26, '1', '1', '1'),
	(1, 27, '1', '1', '1'),
	(1, 28, '1', '1', '1'),
	(1, 29, '1', '1', '1'),
	(1, 30, '1', '1', '1'),
	(1, 31, '1', '1', '1'),
	(2, 10, '1', '1', '1');
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;

-- Dumping structure for table suryajaya.inv_ban
DROP TABLE IF EXISTS `inv_ban`;
CREATE TABLE IF NOT EXISTS `inv_ban` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` char(20) DEFAULT NULL,
  `kode_ban` char(10) DEFAULT NULL,
  `kode_supplier` char(10) DEFAULT NULL,
  `bkl` int(11) DEFAULT NULL,
  `sts_stok` char(1) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `tgl_pasang` date DEFAULT NULL,
  `tgl_lepas` date DEFAULT NULL,
  `bengkel_pasang` varchar(100) DEFAULT NULL,
  `bengkel_lepas` varchar(100) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `sts_pasang` char(1) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `FK_inv_ban_master_ban` (`kode_ban`),
  KEY `FK_inv_ban_master_supplier` (`kode_supplier`),
  CONSTRAINT `FK_inv_ban_master_ban` FOREIGN KEY (`kode_ban`) REFERENCES `master_ban` (`kode_ban`),
  CONSTRAINT `FK_inv_ban_master_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `master_supplier` (`kode_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.inv_ban: ~5 rows (approximately)
/*!40000 ALTER TABLE `inv_ban` DISABLE KEYS */;
INSERT INTO `inv_ban` (`inv_id`, `kode_transaksi`, `kode_ban`, `kode_supplier`, `bkl`, `sts_stok`, `tgl_beli`, `tgl_pasang`, `tgl_lepas`, `bengkel_pasang`, `bengkel_lepas`, `harga_beli`, `sts_pasang`, `data_sts`) VALUES
	(26, 'BL1908-000001', 'BAN0001', 'SUP0002', 28, '1', '2019-08-06', '2019-08-08', '2019-08-09', 'BENGKEL MULYA', 'BENGKEL RIO', 1000000.00, '0', '1'),
	(27, 'BL1908-000001', 'BAN0001', 'SUP0002', 29, '0', '2019-08-06', NULL, NULL, NULL, NULL, 1000000.00, NULL, '1'),
	(28, 'BL1908-000001', 'BAN0001', 'SUP0002', 30, '0', '2019-08-06', NULL, NULL, NULL, NULL, 1000000.00, NULL, '1'),
	(29, 'BL1908-000001', 'BAN0001', 'SUP0002', 31, '0', '2019-08-06', NULL, NULL, NULL, NULL, 1000000.00, NULL, '1'),
	(30, 'BL1908-000001', 'BAN0001', 'SUP0002', 32, '0', '2019-08-06', NULL, NULL, NULL, NULL, 1000000.00, NULL, '1');
/*!40000 ALTER TABLE `inv_ban` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_ban
DROP TABLE IF EXISTS `master_ban`;
CREATE TABLE IF NOT EXISTS `master_ban` (
  `kode_ban` char(10) NOT NULL,
  `nama_ban` char(100) DEFAULT NULL,
  `jenis_ban` char(1) DEFAULT NULL,
  `merk_ban` char(100) DEFAULT NULL,
  `ukuran_ban` char(200) DEFAULT NULL,
  `stok_baru` decimal(10,2) DEFAULT '0.00',
  `stok_bekas` decimal(10,2) DEFAULT '0.00',
  `stok_vulkanisir` decimal(10,2) DEFAULT '0.00',
  `stok_afkir` decimal(10,2) DEFAULT '0.00',
  `stok_pasang` decimal(10,2) DEFAULT '0.00',
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_ban: ~3 rows (approximately)
/*!40000 ALTER TABLE `master_ban` DISABLE KEYS */;
INSERT INTO `master_ban` (`kode_ban`, `nama_ban`, `jenis_ban`, `merk_ban`, `ukuran_ban`, `stok_baru`, `stok_bekas`, `stok_vulkanisir`, `stok_afkir`, `stok_pasang`, `data_sts`) VALUES
	('BAN0001', 'Ban A', '1', 'Dunlop', '900-200', 34.00, 3.00, 0.00, 0.00, 3.00, '1'),
	('BAN0002', 'Ban B', '0', 'Federal', '900-250', 4.00, 0.00, 0.00, 0.00, 0.00, '1'),
	('BAN0003', 'Ban C', '2', 'IRC', '800-300', 0.00, 0.00, 0.00, 0.00, 0.00, '1');
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

-- Dumping data for table suryajaya.master_barang: ~6 rows (approximately)
/*!40000 ALTER TABLE `master_barang` DISABLE KEYS */;
INSERT INTO `master_barang` (`kode_barang`, `nama_barang`, `part_number`, `nama_satuan`, `min_qty`, `qty_perset`, `no_rak`, `stok_barang`, `data_sts`, `updated_at`, `created_at`) VALUES
	('BRG0001', 'Barang A', '123456', 'Pcs', 1.00, 4.00, '1A', 7.00, '1', '2018-12-16 05:16:38', '2018-12-16 05:16:38'),
	('BRG0002', 'Barang B', '987652', 'Pcs', 1.00, 6.00, '1B', 15.00, '1', NULL, NULL),
	('BRG0003', 'Barang C', '987652', 'Pcs', 1.00, 6.00, '1B', 6.00, '1', NULL, NULL),
	('BRG0004', 'Barang D', '987652', 'Pcs', 1.00, 6.00, '1D', 0.00, '1', NULL, NULL),
	('BRG0005', 'Barang E', '456789', 'Pcs', 1.00, 4.00, '1E', 6.00, '1', NULL, NULL),
	('BRG0006', 'Barang Tes', '0987654', 'Pcs', 20.00, 40.00, '2D', NULL, '0', NULL, NULL);
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
	('BDR0002', 'Biaya Sby -> Jkt', 1000000.00, '1'),
	('BDR0003', 'Biaya Sby -> Jogja', 750000.00, '1');
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

-- Dumping data for table suryajaya.master_customer: ~4 rows (approximately)
/*!40000 ALTER TABLE `master_customer` DISABLE KEYS */;
INSERT INTO `master_customer` (`kode_customer`, `nama_customer`, `alamat_customer`, `kota_customer`, `jenis_customer`, `tlp_customer`, `data_sts`) VALUES
	('CUST0001', 'Jono', 'Semampir Barat No.4', 'Surabaya', 'Customer', '081234234242', '1'),
	('CUST0002', 'Boni', 'Semolowaru Timur No.8', 'Surabaya', 'Customer', '085242242424', '1'),
	('CUST0003', 'Hendro', 'Adityawarman No.2', 'Surabaya', 'Customer', '0987654', '1'),
	('CUST0004', 'Handoko', 'Lesti No.42', 'Surabaya', 'Customer', '0987654', '1');
/*!40000 ALTER TABLE `master_customer` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_customer_harga
DROP TABLE IF EXISTS `master_customer_harga`;
CREATE TABLE IF NOT EXISTS `master_customer_harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `kode_customer` char(10) NOT NULL DEFAULT '0',
  `tujuan` varchar(254) DEFAULT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_harga`),
  KEY `FK_master_customer_harga_master_customer` (`kode_customer`),
  CONSTRAINT `FK_master_customer_harga_master_customer` FOREIGN KEY (`kode_customer`) REFERENCES `master_customer` (`kode_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_customer_harga: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_customer_harga` DISABLE KEYS */;
INSERT INTO `master_customer_harga` (`id_harga`, `kode_customer`, `tujuan`, `nominal`, `data_sts`) VALUES
	(1, 'CUST0001', 'Jakarta - Surabaya', 1500000.00, '1');
/*!40000 ALTER TABLE `master_customer_harga` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_driver
DROP TABLE IF EXISTS `master_driver`;
CREATE TABLE IF NOT EXISTS `master_driver` (
  `kode_driver` char(10) NOT NULL,
  `nama_driver` char(100) DEFAULT NULL,
  `alamat_driver` varchar(1024) DEFAULT NULL,
  `kota_driver` char(100) DEFAULT NULL,
  `rek_bank` char(100) DEFAULT NULL,
  `nama_bank` char(100) DEFAULT NULL,
  `anrek_bank` char(100) DEFAULT NULL,
  `transfer_bank` char(100) DEFAULT NULL,
  `tlp_driver` char(20) DEFAULT NULL,
  `jenis_driver` char(1) DEFAULT NULL,
  `jml_bon` decimal(10,2) DEFAULT NULL,
  `cair_bon` decimal(10,2) DEFAULT NULL,
  `jml_klaim` decimal(10,2) DEFAULT NULL,
  `cair_klaim` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_driver: ~3 rows (approximately)
/*!40000 ALTER TABLE `master_driver` DISABLE KEYS */;
INSERT INTO `master_driver` (`kode_driver`, `nama_driver`, `alamat_driver`, `kota_driver`, `rek_bank`, `nama_bank`, `anrek_bank`, `transfer_bank`, `tlp_driver`, `jenis_driver`, `jml_bon`, `cair_bon`, `jml_klaim`, `cair_klaim`, `data_sts`) VALUES
	('DRV0001', 'Sugeng', 'Putat Jaya No.889', 'Surabaya', '123456789', 'BCA', 'Sugeng', 'BCA', '085235789172', '0', 0.00, NULL, 0.00, NULL, '1'),
	('DRV0002', 'Mulyadi', 'Lesti No.42', 'Surabaya', NULL, NULL, NULL, NULL, '088353678678', '1', 0.00, NULL, 0.00, NULL, '1'),
	('DRV0003', 'Irfan', 'Adityawarman 42', 'Surabaya', NULL, NULL, NULL, NULL, '9876543', '0', NULL, NULL, NULL, NULL, '1');
/*!40000 ALTER TABLE `master_driver` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_karyawan
DROP TABLE IF EXISTS `master_karyawan`;
CREATE TABLE IF NOT EXISTS `master_karyawan` (
  `kode_karyawan` char(10) NOT NULL,
  `nama_karyawan` char(100) DEFAULT NULL,
  `alamat_karyawan` varchar(1024) DEFAULT NULL,
  `kota_karyawan` char(100) DEFAULT NULL,
  `tlp_karyawan` char(20) DEFAULT NULL,
  `upah_makan` decimal(10,2) DEFAULT NULL,
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

-- Dumping data for table suryajaya.master_karyawan: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_karyawan` DISABLE KEYS */;
INSERT INTO `master_karyawan` (`kode_karyawan`, `nama_karyawan`, `alamat_karyawan`, `kota_karyawan`, `tlp_karyawan`, `upah_makan`, `upah_harian`, `upah_hari_besar`, `upah_hari_minggu`, `min_jam_lembur`, `upah_lembur`, `gaji_bulanan`, `kerja_penuh_6x`, `jml_bon`, `data_sts`) VALUES
	('KRY00001', 'Hendro', 'Semolowaru Utara No.42, Sukolilo', 'Surabaya', '083335335627', 10000.00, 100000.00, 150000.00, 120000.00, 2.00, 50000.00, 3000000.00, 500000.00, 10000.00, '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_kendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `master_kendaraan` DISABLE KEYS */;
INSERT INTO `master_kendaraan` (`kode_kendaraan`, `nopol`, `sopir_kendaraan`, `kernet_kendaraan`, `no_mesin`, `no_rangka`, `tipe_kendaraan`, `jenis_kendaraan`, `nama_pemilik`, `thn_pembuatan`, `no_bpkb`, `warna_kendaraan`, `masa_stnk`, `cc_kendaraan`, `data_sts`) VALUES
	(1, 'P3251ZS', 'DRV0001', 'DRV0002', '12831991', '10230301', 'Honda', 'Pick Up', 'Joko', '2000', '12023391', 'Hitam', '2020', '2500', '0'),
	(2, 'B2345XS', 'DRV0001', 'DRV0002', '01010291', '29304813', 'Dino', 'Dump Truck', 'Kuri', '2012', '4944505', 'Kuning', '2020', '5000', '1'),
	(3, 'B2345XX', 'DRV0001', 'DRV0002', '0987654', '0987654', 'Toyota', 'Pick Up', 'Joni', '2015', '098765', 'Silver', '2019', '2000', '1');
/*!40000 ALTER TABLE `master_kendaraan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_pom
DROP TABLE IF EXISTS `master_pom`;
CREATE TABLE IF NOT EXISTS `master_pom` (
  `kode_pom` char(10) NOT NULL,
  `nama_pom` char(100) NOT NULL,
  `data_sts` char(1) NOT NULL,
  PRIMARY KEY (`kode_pom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_pom: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_pom` DISABLE KEYS */;
INSERT INTO `master_pom` (`kode_pom`, `nama_pom`, `data_sts`) VALUES
	('POM001', 'POM MENANGGAL', '1'),
	('POM002', 'POM JOMBANG PEJATEN', '1');
/*!40000 ALTER TABLE `master_pom` ENABLE KEYS */;

-- Dumping structure for table suryajaya.master_rekening
DROP TABLE IF EXISTS `master_rekening`;
CREATE TABLE IF NOT EXISTS `master_rekening` (
  `kode_rekening` char(10) NOT NULL,
  `nama_bank` char(100) DEFAULT NULL,
  `no_rekening` char(50) DEFAULT NULL,
  `ket_rekening` varchar(1024) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.master_rekening: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_rekening` DISABLE KEYS */;
INSERT INTO `master_rekening` (`kode_rekening`, `nama_bank`, `no_rekening`, `ket_rekening`, `data_sts`) VALUES
	('REK00001', 'BCA', '234567899', 'Tes rekening bca', '1'),
	('REK00002', 'BNI', '292929011', 'Tes rekening 2', '1');
/*!40000 ALTER TABLE `master_rekening` ENABLE KEYS */;

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

-- Dumping structure for table suryajaya.profile_settings
DROP TABLE IF EXISTS `profile_settings`;
CREATE TABLE IF NOT EXISTS `profile_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bkl_ban_dalam` int(11) DEFAULT NULL,
  `bkl_ban_luar` int(11) DEFAULT NULL,
  `bkl_marset` int(11) DEFAULT NULL,
  `nama` char(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` char(100) DEFAULT NULL,
  `provinsi` char(100) DEFAULT NULL,
  `kodepos` char(100) DEFAULT NULL,
  `logo` char(100) DEFAULT NULL,
  `satuan_kasbon` decimal(10,2) DEFAULT NULL,
  `bonus_upah_harian` decimal(10,2) DEFAULT NULL,
  `no_telepon` char(20) DEFAULT NULL,
  `no_fax` char(20) DEFAULT NULL,
  `solar_jktsby` decimal(10,2) DEFAULT NULL,
  `solar_sbyjkt` decimal(10,2) DEFAULT NULL,
  `solar_naik` decimal(10,2) DEFAULT NULL,
  `retribusi_bak` decimal(10,2) DEFAULT NULL,
  `retribusi_tangki` decimal(10,2) DEFAULT NULL,
  `stut_jktsby` decimal(10,2) DEFAULT NULL,
  `stut_sbyjkt` decimal(10,2) DEFAULT NULL,
  `nginap_sby` decimal(10,2) DEFAULT NULL,
  `nginap_jkt` decimal(10,2) DEFAULT NULL,
  `biaya_perkg` decimal(10,2) DEFAULT NULL,
  `bantuan` decimal(10,2) DEFAULT NULL,
  `bkr2t` decimal(10,2) DEFAULT NULL,
  `ngepok` decimal(10,2) DEFAULT NULL,
  `uang_kernet` decimal(10,2) DEFAULT NULL,
  `denda_a` decimal(10,2) DEFAULT NULL,
  `denda_b` decimal(10,2) DEFAULT NULL,
  `denda_c` decimal(10,2) DEFAULT NULL,
  `batas_kgbaksbyjkt` decimal(10,2) DEFAULT NULL,
  `batas_kgbakjktsby` decimal(10,2) DEFAULT NULL,
  `harga_bataskgbak` decimal(10,2) DEFAULT NULL,
  `batas_kgtangki` decimal(10,2) DEFAULT NULL,
  `harga_bataskgtangki` decimal(10,2) DEFAULT NULL,
  `beratlebih_baksbyjkt` decimal(10,2) DEFAULT NULL,
  `beratlebih_bakjktsby` decimal(10,2) DEFAULT NULL,
  `beratlebih_tangki` decimal(10,2) DEFAULT NULL,
  `pulang_kosonga` decimal(10,2) DEFAULT NULL,
  `pulang_kosongb` decimal(10,2) DEFAULT NULL,
  `pulang_kosongc` decimal(10,2) DEFAULT NULL,
  `bon_jkta` decimal(10,2) DEFAULT NULL,
  `bon_jktb` decimal(10,2) DEFAULT NULL,
  `bon_jktc` decimal(10,2) DEFAULT NULL,
  `bon_jktd` decimal(10,2) DEFAULT NULL,
  `bon_jkte` decimal(10,2) DEFAULT NULL,
  `tab_sopir` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.profile_settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `profile_settings` DISABLE KEYS */;
INSERT INTO `profile_settings` (`id`, `bkl_ban_dalam`, `bkl_ban_luar`, `bkl_marset`, `nama`, `alamat`, `kota`, `provinsi`, `kodepos`, `logo`, `satuan_kasbon`, `bonus_upah_harian`, `no_telepon`, `no_fax`, `solar_jktsby`, `solar_sbyjkt`, `solar_naik`, `retribusi_bak`, `retribusi_tangki`, `stut_jktsby`, `stut_sbyjkt`, `nginap_sby`, `nginap_jkt`, `biaya_perkg`, `bantuan`, `bkr2t`, `ngepok`, `uang_kernet`, `denda_a`, `denda_b`, `denda_c`, `batas_kgbaksbyjkt`, `batas_kgbakjktsby`, `harga_bataskgbak`, `batas_kgtangki`, `harga_bataskgtangki`, `beratlebih_baksbyjkt`, `beratlebih_bakjktsby`, `beratlebih_tangki`, `pulang_kosonga`, `pulang_kosongb`, `pulang_kosongc`, `bon_jkta`, `bon_jktb`, `bon_jktc`, `bon_jktd`, `bon_jkte`, `tab_sopir`) VALUES
	(1, 5, 32, 1, 'Suryajaya', 'Jalan Maju No.104', 'Tulungagung', 'Jawa Timur', '62011', NULL, 100000.00, 100000.00, '34567890', '456789', 2000000.00, 1500000.00, 1000000.00, 100000.00, 1000000.00, 200000.00, 200000.00, 200000.00, 500000.00, 500000.00, 400000.00, 100000.00, 550000.00, 1000000.00, 100000.00, 100000.00, 100000.00, 18000.00, 30000.00, 600000.00, 25000.00, 850000.00, 35.00, 35.00, 35.00, 1700000.00, 15000000.00, 0.00, 3900000.00, 3200000.00, 2400000.00, 3700000.00, 1600000.00, 50000.00);
/*!40000 ALTER TABLE `profile_settings` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_bayar_bonklaim_sopir
DROP TABLE IF EXISTS `trx_bayar_bonklaim_sopir`;
CREATE TABLE IF NOT EXISTS `trx_bayar_bonklaim_sopir` (
  `no_bayar` char(20) NOT NULL,
  `kode_driver` char(10) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `nom_bon` decimal(10,2) DEFAULT NULL,
  `nom_klaim` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_bayar`),
  KEY `FK_trx_bayar_bonklaim_sopir_master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_bayar_bonklaim_sopir_master_driver` FOREIGN KEY (`kode_driver`) REFERENCES `master_driver` (`kode_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_bayar_bonklaim_sopir: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_bayar_bonklaim_sopir` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_bayar_bonklaim_sopir` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_bayar_upah_karyawan
DROP TABLE IF EXISTS `trx_bayar_upah_karyawan`;
CREATE TABLE IF NOT EXISTS `trx_bayar_upah_karyawan` (
  `no_kuitansi` char(20) NOT NULL,
  `kode_karyawan` char(10) DEFAULT NULL,
  `tgl_upah` date DEFAULT NULL,
  `hari_kerja` decimal(10,2) DEFAULT NULL,
  `sub_harian` decimal(10,2) DEFAULT NULL,
  `bonus_harian` decimal(10,2) DEFAULT NULL,
  `sub_bonusharian` decimal(10,2) DEFAULT NULL,
  `uang_makan` decimal(10,2) DEFAULT NULL,
  `sub_makan` decimal(10,2) DEFAULT NULL,
  `uang_lembur` decimal(10,2) DEFAULT NULL,
  `sub_lembur` decimal(10,2) DEFAULT NULL,
  `uang_minggu` decimal(10,2) DEFAULT NULL,
  `sub_minggu` decimal(10,2) DEFAULT NULL,
  `uang_haribesar` decimal(10,2) DEFAULT NULL,
  `sub_haribesar` decimal(10,2) DEFAULT NULL,
  `uang_bulanan` decimal(10,2) DEFAULT NULL,
  `sub_bulanan` decimal(10,2) DEFAULT NULL,
  `bonus_bulanan` decimal(10,2) DEFAULT NULL,
  `sub_bonusbulanan` decimal(10,2) DEFAULT NULL,
  `uang_lain` decimal(10,2) DEFAULT NULL,
  `sub_lain` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `sub_bon` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_kuitansi`),
  KEY `FK_trx_bayar_upah_karyawan_master_karyawan` (`kode_karyawan`),
  CONSTRAINT `FK_trx_bayar_upah_karyawan_master_karyawan` FOREIGN KEY (`kode_karyawan`) REFERENCES `master_karyawan` (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_bayar_upah_karyawan: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_bayar_upah_karyawan` DISABLE KEYS */;
INSERT INTO `trx_bayar_upah_karyawan` (`no_kuitansi`, `kode_karyawan`, `tgl_upah`, `hari_kerja`, `sub_harian`, `bonus_harian`, `sub_bonusharian`, `uang_makan`, `sub_makan`, `uang_lembur`, `sub_lembur`, `uang_minggu`, `sub_minggu`, `uang_haribesar`, `sub_haribesar`, `uang_bulanan`, `sub_bulanan`, `bonus_bulanan`, `sub_bonusbulanan`, `uang_lain`, `sub_lain`, `sub_total`, `sub_bon`, `grand_total`, `data_sts`) VALUES
	('KUI1908-000001', NULL, '2019-08-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
/*!40000 ALTER TABLE `trx_bayar_upah_karyawan` ENABLE KEYS */;

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

-- Dumping data for table suryajaya.trx_beli_ban: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_ban` DISABLE KEYS */;
INSERT INTO `trx_beli_ban` (`no_pembelian`, `kode_supplier`, `nota_toko`, `tgl_pembelian`, `grand_total`, `data_sts`) VALUES
	('BL1908-000001', 'SUP0002', 'NOTA0001', '2019-08-06', 5000000.00, '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_ban_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_ban_det` DISABLE KEYS */;
INSERT INTO `trx_beli_ban_det` (`det_id`, `no_pembelian`, `kode_ban`, `qty_beli`, `harga_satuan`, `jumlah`) VALUES
	(7, 'BL1908-000001', 'BAN0001', 5.00, 1000000.00, 5000000.00);
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

-- Dumping data for table suryajaya.trx_beli_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_barang` DISABLE KEYS */;
INSERT INTO `trx_beli_barang` (`no_nota`, `kode_supplier`, `nota_toko`, `tgl_nota`, `diskon`, `nom_diskon`, `grand_total`, `data_sts`) VALUES
	('SK1908-000001', NULL, NULL, '2019-08-20', NULL, NULL, NULL, '0');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_beli_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_beli_barang_det` DISABLE KEYS */;
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

-- Dumping data for table suryajaya.trx_biaya_kendaraan: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_biaya_kendaraan` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_biaya_kendaraan_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_biaya_kendaraan_det` DISABLE KEYS */;
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
	('BON1908-000001', 'KRY00001', '2019-08-24', 1000000.00, 'tes', '3');
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

-- Dumping data for table suryajaya.trx_input_bon_sopir: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_input_bon_sopir` DISABLE KEYS */;
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

-- Dumping data for table suryajaya.trx_input_kas: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_input_kas` DISABLE KEYS */;
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

-- Dumping structure for table suryajaya.trx_kas_bon_kantor
DROP TABLE IF EXISTS `trx_kas_bon_kantor`;
CREATE TABLE IF NOT EXISTS `trx_kas_bon_kantor` (
  `no_bon` char(20) NOT NULL,
  `tgl_bon` date DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `kode_sopir` char(10) DEFAULT NULL,
  `kode_kernet` char(10) DEFAULT NULL,
  `tab_sopir` decimal(10,2) DEFAULT NULL,
  `berat_jenis` char(1) DEFAULT NULL,
  `ket_kasbon` text,
  `uang_saku_kota` decimal(10,2) DEFAULT NULL,
  `tgl_bon_kota` date DEFAULT NULL,
  `uang_saku_a` decimal(10,0) DEFAULT NULL,
  `tgl_bon_a` date DEFAULT NULL,
  `uang_saku_b` decimal(10,2) DEFAULT NULL,
  `tgl_bon_b` date DEFAULT NULL,
  `uang_saku_c` decimal(10,2) DEFAULT NULL,
  `tgl_bon_c` date DEFAULT NULL,
  `uang_saku_d` decimal(10,2) DEFAULT NULL,
  `tgl_bon_d` date DEFAULT NULL,
  `sub_uang_saku` decimal(10,2) DEFAULT NULL,
  `uang_solar` decimal(10,2) DEFAULT NULL,
  `tgl_solar` date DEFAULT NULL,
  `nama_pom` char(100) DEFAULT NULL,
  `sub_bonall` decimal(10,2) DEFAULT NULL,
  `tgl_muat` date DEFAULT NULL,
  `tgl_muat_b` date DEFAULT NULL,
  `tgl_bongkar` date DEFAULT NULL,
  `tgl_bongkar_b` date DEFAULT NULL,
  `uang_makan` decimal(10,2) DEFAULT NULL,
  `uang_makan_b` decimal(10,2) DEFAULT NULL,
  `kode_customer_a` char(10) DEFAULT NULL,
  `kode_customer_b` char(10) DEFAULT NULL,
  `kode_customer_c` char(10) DEFAULT NULL,
  `kode_customer_d` char(10) DEFAULT NULL,
  `kode_customer_e` char(10) DEFAULT NULL,
  `kode_customer_f` char(10) DEFAULT NULL,
  `kode_customer_g` char(10) DEFAULT NULL,
  `kode_customer_h` char(10) DEFAULT NULL,
  `jenis_muatan_a` char(100) DEFAULT NULL,
  `jenis_muatan_b` char(100) DEFAULT NULL,
  `jenis_muatan_c` char(100) DEFAULT NULL,
  `jenis_muatan_d` char(100) DEFAULT NULL,
  `berat_muatan_a` decimal(10,2) DEFAULT NULL,
  `berat_muatan_b` decimal(10,2) DEFAULT NULL,
  `berat_muatan_c` decimal(10,2) DEFAULT NULL,
  `berat_muatan_d` decimal(10,2) DEFAULT NULL,
  `ongkos_angkut` decimal(10,2) DEFAULT NULL,
  `ongkos_angkut_2` decimal(10,2) DEFAULT NULL,
  `ongkos_angkut_3` decimal(10,2) DEFAULT NULL,
  `ongkos_angkut_4` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto_2` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto_3` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto_4` decimal(10,2) DEFAULT NULL,
  `sub_bruto` decimal(10,2) DEFAULT NULL,
  `sub_bruto_b` decimal(10,2) DEFAULT NULL,
  `borong_sopir` char(1) DEFAULT NULL,
  `borong_sopir_2` char(1) DEFAULT NULL,
  `borong_sopir_3` char(1) DEFAULT NULL,
  `borong_sopir_4` char(1) DEFAULT NULL,
  `tambah_borong_a` decimal(10,2) DEFAULT NULL,
  `tambah_borong_b` decimal(10,2) DEFAULT NULL,
  `tambah_borong_c` decimal(10,2) DEFAULT NULL,
  `tambah_borong_d` decimal(10,2) DEFAULT NULL,
  `surat_jalan_a` char(100) DEFAULT NULL,
  `surat_jalan_b` char(100) DEFAULT NULL,
  `surat_jalan_c` char(100) DEFAULT NULL,
  `surat_jalan_d` char(100) DEFAULT NULL,
  `sub_beratmuat` decimal(10,2) DEFAULT NULL,
  `sub_beratmuat_b` decimal(10,2) DEFAULT NULL,
  `solar_berangkat` decimal(10,2) DEFAULT NULL,
  `solar_kembali` decimal(10,2) DEFAULT NULL,
  `bantuan_a` decimal(10,2) DEFAULT NULL,
  `bantuan_b` decimal(10,2) DEFAULT NULL,
  `bantuan_c` decimal(10,2) DEFAULT NULL,
  `bantuan_d` decimal(10,2) DEFAULT NULL,
  `tambah_a` decimal(10,2) DEFAULT NULL,
  `tambah_b` decimal(10,2) DEFAULT NULL,
  `tambah_c` decimal(10,2) DEFAULT NULL,
  `tambah_d` decimal(10,2) DEFAULT NULL,
  `uang_sopir_a` decimal(10,2) DEFAULT NULL,
  `uang_sopir_b` decimal(10,2) DEFAULT NULL,
  `uang_sopir_c` decimal(10,2) DEFAULT NULL,
  `uang_sopir_d` decimal(10,2) DEFAULT NULL,
  `koreksi_sopir_a` decimal(10,2) DEFAULT NULL,
  `koreksi_sopir_b` decimal(10,2) DEFAULT NULL,
  `koreksi_sopir_c` decimal(10,2) DEFAULT NULL,
  `koreksi_sopir_d` decimal(10,2) DEFAULT NULL,
  `sub_uangsopir` decimal(10,2) DEFAULT NULL,
  `sub_koreksi` decimal(10,2) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_bon`),
  KEY `FK_trx_kas_bon_kantor_master_kendaraan` (`kode_kendaraan`),
  KEY `FK_trx_kas_bon_kantor_master_driver` (`kode_sopir`),
  KEY `FK_trx_kas_bon_kantor_master_driver_2` (`kode_kernet`),
  KEY `FK_trx_kas_bon_kantor_master_customer` (`kode_customer_a`),
  KEY `FK_trx_kas_bon_kantor_master_customer_2` (`kode_customer_b`),
  KEY `FK_trx_kas_bon_kantor_master_customer_3` (`kode_customer_c`),
  KEY `FK_trx_kas_bon_kantor_master_customer_4` (`kode_customer_d`),
  KEY `FK_trx_kas_bon_kantor_master_customer_5` (`kode_customer_e`),
  KEY `FK_trx_kas_bon_kantor_master_customer_6` (`kode_customer_f`),
  KEY `FK_trx_kas_bon_kantor_master_customer_7` (`kode_customer_g`),
  KEY `FK_trx_kas_bon_kantor_master_customer_8` (`kode_customer_h`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer` FOREIGN KEY (`kode_customer_a`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_2` FOREIGN KEY (`kode_customer_b`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_3` FOREIGN KEY (`kode_customer_c`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_4` FOREIGN KEY (`kode_customer_d`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_5` FOREIGN KEY (`kode_customer_e`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_6` FOREIGN KEY (`kode_customer_f`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_7` FOREIGN KEY (`kode_customer_g`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_customer_8` FOREIGN KEY (`kode_customer_h`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_driver` FOREIGN KEY (`kode_sopir`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_driver_2` FOREIGN KEY (`kode_kernet`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_kas_bon_kantor_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_kas_bon_kantor: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_kas_bon_kantor` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_kas_bon_kantor` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_kas_bon_sopir
DROP TABLE IF EXISTS `trx_kas_bon_sopir`;
CREATE TABLE IF NOT EXISTS `trx_kas_bon_sopir` (
  `no_bon` char(20) NOT NULL,
  `tgl_bon` date DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL,
  `jumlah_pp` int(11) DEFAULT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `kode_sopir` char(10) DEFAULT NULL,
  `kode_kernet` char(10) DEFAULT NULL,
  `tab_sopir` char(10) DEFAULT NULL,
  `berat_jenis` char(1) DEFAULT NULL,
  `jenis_kendaraan` char(1) DEFAULT NULL,
  `ket_kasbon` text,
  `uang_saku_kota` decimal(10,2) DEFAULT NULL,
  `tgl_bon_kota` date DEFAULT NULL,
  `uang_saku_a` decimal(10,2) DEFAULT NULL,
  `tgl_bon_a` date DEFAULT NULL,
  `uang_saku_b` decimal(10,2) DEFAULT NULL,
  `tgl_bon_b` date DEFAULT NULL,
  `uang_saku_c` decimal(10,2) DEFAULT NULL,
  `tgl_bon_c` date DEFAULT NULL,
  `uang_saku_d` decimal(10,2) DEFAULT NULL,
  `tgl_bon_d` date DEFAULT NULL,
  `sub_uang_saku` decimal(10,2) DEFAULT NULL,
  `uang_solar` decimal(10,2) DEFAULT NULL,
  `tgl_solar` date DEFAULT NULL,
  `nama_pom` char(100) DEFAULT NULL,
  `sub_bonall` decimal(10,2) DEFAULT NULL,
  `tgl_muat` date DEFAULT NULL,
  `tgl_muat_b` date DEFAULT NULL,
  `tgl_bongkar` date DEFAULT NULL,
  `tgl_bongkar_b` date DEFAULT NULL,
  `uang_makan` decimal(10,2) DEFAULT NULL,
  `uang_makan_b` decimal(10,2) DEFAULT NULL,
  `kode_customer_a` char(10) DEFAULT NULL,
  `kode_customer_b` char(10) DEFAULT NULL,
  `kode_customer_c` char(10) DEFAULT NULL,
  `kode_customer_d` char(10) DEFAULT NULL,
  `kode_customer_e` char(10) DEFAULT NULL,
  `kode_customer_f` char(10) DEFAULT NULL,
  `kode_customer_g` char(10) DEFAULT NULL,
  `kode_customer_h` char(10) DEFAULT NULL,
  `jenis_muatan_a` char(10) DEFAULT NULL,
  `jenis_muatan_b` char(10) DEFAULT NULL,
  `jenis_muatan_c` char(10) DEFAULT NULL,
  `jenis_muatan_d` char(10) DEFAULT NULL,
  `berat_muatan_a` decimal(10,2) DEFAULT NULL,
  `berat_muatan_b` decimal(10,2) DEFAULT NULL,
  `berat_muatan_c` decimal(10,2) DEFAULT NULL,
  `berat_muatan_d` decimal(10,2) DEFAULT NULL,
  `surat_jalan_a` char(100) DEFAULT NULL,
  `surat_jalan_b` char(100) DEFAULT NULL,
  `surat_jalan_c` char(100) DEFAULT NULL,
  `surat_jalan_d` char(100) DEFAULT NULL,
  `sub_beratmuat` decimal(10,2) DEFAULT NULL,
  `sub_beratmuat_b` decimal(10,2) DEFAULT NULL,
  `solar_berangkat` decimal(10,2) DEFAULT NULL,
  `solar_kembali` decimal(10,2) DEFAULT NULL,
  `bantuan_a` decimal(10,2) DEFAULT NULL,
  `bantuan_b` decimal(10,2) DEFAULT NULL,
  `bantuan_c` decimal(10,2) DEFAULT NULL,
  `bantuan_d` decimal(10,2) DEFAULT NULL,
  `tambah_a` decimal(10,2) DEFAULT NULL,
  `tambah_b` decimal(10,2) DEFAULT NULL,
  `tambah_c` decimal(10,2) DEFAULT NULL,
  `tambah_d` decimal(10,2) DEFAULT NULL,
  `ngepok` decimal(10,2) DEFAULT NULL,
  `solar_jkt` decimal(10,2) DEFAULT NULL,
  `solar_sby` decimal(10,2) DEFAULT NULL,
  `solar_naik` decimal(10,2) DEFAULT NULL,
  `pulang` decimal(10,2) DEFAULT NULL,
  `total_perincian` decimal(10,2) DEFAULT NULL,
  `bon_sangujkt` decimal(10,2) DEFAULT NULL,
  `hutang_pribadi` decimal(10,2) DEFAULT NULL,
  `klaim` decimal(10,2) DEFAULT NULL,
  `uang_kenek` decimal(10,2) DEFAULT NULL,
  `total_potongan` decimal(10,2) DEFAULT NULL,
  `total_akhir` decimal(10,2) DEFAULT NULL,
  `kode_biaya_sbyjkt` char(10) DEFAULT NULL,
  `kode_biaya_jktsby` char(10) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_bon`),
  KEY `FK_trx_kas_bon_sopir_master_kendaraan` (`kode_kendaraan`),
  KEY `FK_trx_kas_bon_sopir_master_driver` (`kode_sopir`),
  KEY `FK_trx_kas_bon_sopir_master_driver_2` (`kode_kernet`),
  KEY `FK_trx_kas_bon_sopir_master_customer` (`kode_customer_a`),
  KEY `FK_trx_kas_bon_sopir_master_customer_2` (`kode_customer_b`),
  KEY `FK_trx_kas_bon_sopir_master_customer_3` (`kode_customer_c`),
  KEY `FK_trx_kas_bon_sopir_master_customer_4` (`kode_customer_d`),
  KEY `FK_trx_kas_bon_sopir_master_customer_5` (`kode_customer_e`),
  KEY `FK_trx_kas_bon_sopir_master_customer_6` (`kode_customer_f`),
  KEY `FK_trx_kas_bon_sopir_master_customer_7` (`kode_customer_g`),
  KEY `FK_trx_kas_bon_sopir_master_customer_8` (`kode_customer_h`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer` FOREIGN KEY (`kode_customer_a`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_2` FOREIGN KEY (`kode_customer_b`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_3` FOREIGN KEY (`kode_customer_c`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_4` FOREIGN KEY (`kode_customer_d`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_5` FOREIGN KEY (`kode_customer_e`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_6` FOREIGN KEY (`kode_customer_f`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_7` FOREIGN KEY (`kode_customer_g`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_customer_8` FOREIGN KEY (`kode_customer_h`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_driver` FOREIGN KEY (`kode_sopir`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_driver_2` FOREIGN KEY (`kode_kernet`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_kas_bon_sopir_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_kas_bon_sopir: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_kas_bon_sopir` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_kas_bon_sopir` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_katalog
DROP TABLE IF EXISTS `trx_katalog`;
CREATE TABLE IF NOT EXISTS `trx_katalog` (
  `no_katalog` char(20) NOT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `kode_sopir` char(10) DEFAULT NULL,
  `kode_kernet` char(10) DEFAULT NULL,
  `tgl_katalog` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_katalog`),
  KEY `FK_trx_katalog_master_kendaraan` (`kode_kendaraan`),
  KEY `FK_trx_katalog_master_driver` (`kode_sopir`),
  KEY `FK_trx_katalog_master_driver_2` (`kode_kernet`),
  CONSTRAINT `FK_trx_katalog_master_driver` FOREIGN KEY (`kode_sopir`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_katalog_master_driver_2` FOREIGN KEY (`kode_kernet`) REFERENCES `master_driver` (`kode_driver`),
  CONSTRAINT `FK_trx_katalog_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_katalog: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_katalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_katalog` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_katalog_det
DROP TABLE IF EXISTS `trx_katalog_det`;
CREATE TABLE IF NOT EXISTS `trx_katalog_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_katalog` char(20) DEFAULT NULL,
  `ket_det` varchar(1024) DEFAULT NULL,
  `qty_det` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_katalog_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_katalog_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_katalog_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_kuitansi
DROP TABLE IF EXISTS `trx_kuitansi`;
CREATE TABLE IF NOT EXISTS `trx_kuitansi` (
  `no_kuitansi` char(20) NOT NULL,
  `kode_rekening` char(10) DEFAULT NULL,
  `kode_customer` char(10) DEFAULT NULL,
  `tgl_kuitansi` date DEFAULT NULL,
  `ket_kuitansi` varchar(1024) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_kuitansi`),
  KEY `FK_rx_kuitansi_master_rekening` (`kode_rekening`),
  KEY `FK_rx_kuitansi_master_customer` (`kode_customer`),
  CONSTRAINT `FK_rx_kuitansi_master_customer` FOREIGN KEY (`kode_customer`) REFERENCES `master_customer` (`kode_customer`),
  CONSTRAINT `FK_rx_kuitansi_master_rekening` FOREIGN KEY (`kode_rekening`) REFERENCES `master_rekening` (`kode_rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_kuitansi: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_kuitansi` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_kuitansi` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_kuitansi_det
DROP TABLE IF EXISTS `trx_kuitansi_det`;
CREATE TABLE IF NOT EXISTS `trx_kuitansi_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_kuitansi` char(20) DEFAULT NULL,
  `ket_pembayaran` varchar(1024) DEFAULT NULL,
  `nom_pembayaran` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_kuitansi_det_trx_kuitansi` (`no_kuitansi`),
  CONSTRAINT `FK_trx_kuitansi_det_trx_kuitansi` FOREIGN KEY (`no_kuitansi`) REFERENCES `trx_kuitansi` (`no_kuitansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_kuitansi_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_kuitansi_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_kuitansi_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_lepas_ban
DROP TABLE IF EXISTS `trx_lepas_ban`;
CREATE TABLE IF NOT EXISTS `trx_lepas_ban` (
  `no_pelepasan` char(20) NOT NULL,
  `kode_kendaraan` int(11) DEFAULT NULL,
  `tgl_pelepasan` date DEFAULT NULL,
  `bengkel_pelepasan` varchar(1024) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_pelepasan`),
  KEY `FK_trx_lepas_ban_master_kendaraan` (`kode_kendaraan`),
  CONSTRAINT `FK_trx_lepas_ban_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_lepas_ban: ~2 rows (approximately)
/*!40000 ALTER TABLE `trx_lepas_ban` DISABLE KEYS */;
INSERT INTO `trx_lepas_ban` (`no_pelepasan`, `kode_kendaraan`, `tgl_pelepasan`, `bengkel_pelepasan`, `data_sts`) VALUES
	('LPS1908-000001', NULL, '2019-08-06', NULL, '0'),
	('LPS1908-000002', 2, '2019-08-09', 'BENGKEL RIO', '1');
/*!40000 ALTER TABLE `trx_lepas_ban` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_lepas_ban_det
DROP TABLE IF EXISTS `trx_lepas_ban_det`;
CREATE TABLE IF NOT EXISTS `trx_lepas_ban_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pelepasan` char(20) DEFAULT NULL,
  `kode_ban` char(10) DEFAULT NULL,
  `kode_inventory` int(11) DEFAULT NULL,
  `qty_lepas` char(20) DEFAULT NULL,
  `status_lepas` char(20) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_lepas_ban_det_trx_lepas_ban` (`no_pelepasan`),
  KEY `FK_trx_lepas_ban_det_master_ban` (`kode_ban`),
  KEY `FK_trx_lepas_ban_det_inv_ban` (`kode_inventory`),
  CONSTRAINT `FK_trx_lepas_ban_det_inv_ban` FOREIGN KEY (`kode_inventory`) REFERENCES `inv_ban` (`inv_id`),
  CONSTRAINT `FK_trx_lepas_ban_det_master_ban` FOREIGN KEY (`kode_ban`) REFERENCES `master_ban` (`kode_ban`),
  CONSTRAINT `FK_trx_lepas_ban_det_trx_lepas_ban` FOREIGN KEY (`no_pelepasan`) REFERENCES `trx_lepas_ban` (`no_pelepasan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_lepas_ban_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_lepas_ban_det` DISABLE KEYS */;
INSERT INTO `trx_lepas_ban_det` (`det_id`, `no_pelepasan`, `kode_ban`, `kode_inventory`, `qty_lepas`, `status_lepas`) VALUES
	(4, 'LPS1908-000002', 'BAN0001', 26, '1', '0');
/*!40000 ALTER TABLE `trx_lepas_ban_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_list
DROP TABLE IF EXISTS `trx_list`;
CREATE TABLE IF NOT EXISTS `trx_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `code` char(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_list: ~30 rows (approximately)
/*!40000 ALTER TABLE `trx_list` DISABLE KEYS */;
INSERT INTO `trx_list` (`id`, `nama`, `code`, `status`, `data_sts`) VALUES
	(1, 'Barang', 'm1', '0', '1'),
	(2, 'Customer', 'm2', '0', '1'),
	(3, 'Kendaraan', 'm3', '0', '1'),
	(4, 'Karyawan', 'm4', '0', '1'),
	(5, 'Sopir', 'm5', '0', '1'),
	(6, 'Biaya Sopir', 'm6', '0', '1'),
	(7, 'Tujuan', 'm7', '0', '1'),
	(8, 'Supplier', 'm8', '0', '1'),
	(9, 'Ban', 'm9', '0', '1'),
	(10, 'Rekening', 'm10', '0', '1'),
	(11, 'Pembelian Spare Part', 't1', '1', '1'),
	(12, 'Pemakaian Spare Part', 't2', '1', '1'),
	(13, 'Pembelian Ban', 't3', '1', '1'),
	(14, 'Pemakaian Ban', 't4', '1', '1'),
	(15, 'Pelepasan Ban', 't5', '1', '1'),
	(16, 'Biaya Kendaraan', 't6', '1', '1'),
	(17, 'Retur Pembelian Spare Part', 't7', '1', '1'),
	(18, 'Retur Pemakaian Spare Part', 't8', '1', '1'),
	(19, 'Input Bon', 't9', '1', '1'),
	(20, 'Input Kas', 't10', '1', '1'),
	(21, 'Input Upah', 't11', '1', '1'),
	(22, 'Katalog Kendaraan', 't12', '1', '1'),
	(23, 'Input Bon Sopir', 't13', '1', '1'),
	(24, 'Input Klaim Sopir', 't14', '1', '1'),
	(25, 'Kas Bon Sopir', 't15', '1', '1'),
	(26, 'Kas Bon Kantor', 't16', '1', '1'),
	(27, 'Tagihan', 't17', '1', '1'),
	(28, 'Pelunasan Piutang', 't18', '1', '1'),
	(29, 'Kuitansi', 't19', '1', '1'),
	(30, 'Pembayaran Bon/Klaim', 't20', '1', '1'),
	(31, 'Pom', 'm11', '0', '1');
/*!40000 ALTER TABLE `trx_list` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_opname_ban
DROP TABLE IF EXISTS `trx_opname_ban`;
CREATE TABLE IF NOT EXISTS `trx_opname_ban` (
  `no_opname` char(20) NOT NULL,
  `tgl_opname` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_opname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_opname_ban: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_opname_ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_opname_ban` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_opname_ban_det
DROP TABLE IF EXISTS `trx_opname_ban_det`;
CREATE TABLE IF NOT EXISTS `trx_opname_ban_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_opname` char(20) DEFAULT NULL,
  `kode_ban` char(10) DEFAULT NULL,
  `id_inventory` int(11) DEFAULT NULL,
  `sts_ban` char(1) DEFAULT NULL,
  `qty_opname` decimal(10,2) DEFAULT NULL,
  `qty_lama` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_opname_ban_det_trx_opname_ban` (`no_opname`),
  KEY `FK_trx_opname_ban_det_master_ban` (`kode_ban`),
  KEY `FK_trx_opname_ban_det_inv_ban` (`id_inventory`),
  CONSTRAINT `FK_trx_opname_ban_det_inv_ban` FOREIGN KEY (`id_inventory`) REFERENCES `inv_ban` (`inv_id`),
  CONSTRAINT `FK_trx_opname_ban_det_master_ban` FOREIGN KEY (`kode_ban`) REFERENCES `master_ban` (`kode_ban`),
  CONSTRAINT `FK_trx_opname_ban_det_trx_opname_ban` FOREIGN KEY (`no_opname`) REFERENCES `trx_opname_ban` (`no_opname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_opname_ban_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_opname_ban_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_opname_ban_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_opname_barang
DROP TABLE IF EXISTS `trx_opname_barang`;
CREATE TABLE IF NOT EXISTS `trx_opname_barang` (
  `no_opname` char(20) NOT NULL,
  `tgl_opname` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_opname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_opname_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_opname_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_opname_barang` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_opname_barang_det
DROP TABLE IF EXISTS `trx_opname_barang_det`;
CREATE TABLE IF NOT EXISTS `trx_opname_barang_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_opname` char(20) DEFAULT '0',
  `kode_barang` char(10) DEFAULT '0',
  `qty_opname` decimal(10,2) DEFAULT '0.00',
  `qty_lama` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_opname_barang_det_trx_opname_barang` (`no_opname`),
  KEY `FK_trx_opname_barang_det_master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_opname_barang_det_master_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`),
  CONSTRAINT `FK_trx_opname_barang_det_trx_opname_barang` FOREIGN KEY (`no_opname`) REFERENCES `trx_opname_barang` (`no_opname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_opname_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_opname_barang_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_opname_barang_det` ENABLE KEYS */;

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

-- Dumping data for table suryajaya.trx_pakai_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pakai_barang` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pakai_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pakai_barang_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_pakai_barang_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pasang_ban
DROP TABLE IF EXISTS `trx_pasang_ban`;
CREATE TABLE IF NOT EXISTS `trx_pasang_ban` (
  `no_pemasangan` char(20) NOT NULL,
  `kode_kendaraan` int(10) DEFAULT NULL,
  `tgl_pemasangan` date DEFAULT NULL,
  `bengkel_pemasangan` varchar(1024) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_pemasangan`),
  KEY `FK_trx_pasang_ban_master_kendaraan` (`kode_kendaraan`),
  CONSTRAINT `FK_trx_pasang_ban_master_kendaraan` FOREIGN KEY (`kode_kendaraan`) REFERENCES `master_kendaraan` (`kode_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pasang_ban: ~1 rows (approximately)
/*!40000 ALTER TABLE `trx_pasang_ban` DISABLE KEYS */;
INSERT INTO `trx_pasang_ban` (`no_pemasangan`, `kode_kendaraan`, `tgl_pemasangan`, `bengkel_pemasangan`, `data_sts`) VALUES
	('PSG1908-000001', 2, '2019-08-08', 'BENGKEL MULYA', '1');
/*!40000 ALTER TABLE `trx_pasang_ban` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pasang_ban_det
DROP TABLE IF EXISTS `trx_pasang_ban_det`;
CREATE TABLE IF NOT EXISTS `trx_pasang_ban_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pemasangan` char(20) DEFAULT NULL,
  `kode_ban` char(10) DEFAULT NULL,
  `kode_inventory` int(11) DEFAULT NULL,
  `qty_pasang` decimal(10,2) DEFAULT NULL,
  `status_pasang` char(1) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_pasang_ban_det_trx_pasang_ban` (`no_pemasangan`),
  KEY `FK_trx_pasang_ban_det_master_ban` (`kode_ban`),
  KEY `FK_trx_pasang_ban_det_inv_ban` (`kode_inventory`),
  CONSTRAINT `FK_trx_pasang_ban_det_inv_ban` FOREIGN KEY (`kode_inventory`) REFERENCES `inv_ban` (`inv_id`),
  CONSTRAINT `FK_trx_pasang_ban_det_master_ban` FOREIGN KEY (`kode_ban`) REFERENCES `master_ban` (`kode_ban`),
  CONSTRAINT `FK_trx_pasang_ban_det_trx_pasang_ban` FOREIGN KEY (`no_pemasangan`) REFERENCES `trx_pasang_ban` (`no_pemasangan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pasang_ban_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pasang_ban_det` DISABLE KEYS */;
INSERT INTO `trx_pasang_ban_det` (`det_id`, `no_pemasangan`, `kode_ban`, `kode_inventory`, `qty_pasang`, `status_pasang`) VALUES
	(10, 'PSG1908-000001', 'BAN0001', 26, 1.00, '0');
/*!40000 ALTER TABLE `trx_pasang_ban_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pelunasan
DROP TABLE IF EXISTS `trx_pelunasan`;
CREATE TABLE IF NOT EXISTS `trx_pelunasan` (
  `no_lunas` char(20) NOT NULL,
  `kode_customer` char(10) DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_lunas`),
  KEY `FK_trx_pelunasan_master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_pelunasan_master_customer` FOREIGN KEY (`kode_customer`) REFERENCES `master_customer` (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pelunasan: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pelunasan` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_pelunasan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_pelunasan_det
DROP TABLE IF EXISTS `trx_pelunasan_det`;
CREATE TABLE IF NOT EXISTS `trx_pelunasan_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_lunas` char(20) DEFAULT '0',
  `det_tagihan` int(11) DEFAULT '0',
  `jumlah` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_pelunasan_det_trx_pelunasan` (`no_lunas`),
  KEY `FK_trx_pelunasan_det_trx_tagihan_det` (`det_tagihan`),
  CONSTRAINT `FK_trx_pelunasan_det_trx_pelunasan` FOREIGN KEY (`no_lunas`) REFERENCES `trx_pelunasan` (`no_lunas`),
  CONSTRAINT `FK_trx_pelunasan_det_trx_tagihan_det` FOREIGN KEY (`det_tagihan`) REFERENCES `trx_tagihan_det` (`det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_pelunasan_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_pelunasan_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_pelunasan_det` ENABLE KEYS */;

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

-- Dumping data for table suryajaya.trx_retur_beli_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_beli_barang` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_beli_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_beli_barang_det` DISABLE KEYS */;
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

-- Dumping data for table suryajaya.trx_retur_pakai_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_pakai_barang` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_retur_pakai_barang_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_retur_pakai_barang_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_retur_pakai_barang_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_tagihan
DROP TABLE IF EXISTS `trx_tagihan`;
CREATE TABLE IF NOT EXISTS `trx_tagihan` (
  `no_tagihan` char(20) NOT NULL,
  `tgl_tagihan` date DEFAULT NULL,
  `kode_customer` char(10) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_tagihan`),
  KEY `FK_trx_tagihan_master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_tagihan_master_customer` FOREIGN KEY (`kode_customer`) REFERENCES `master_customer` (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_tagihan: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_tagihan` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_tagihan` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_tagihan_det
DROP TABLE IF EXISTS `trx_tagihan_det`;
CREATE TABLE IF NOT EXISTS `trx_tagihan_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_tagihan` char(20) DEFAULT NULL,
  `no_bon` char(20) DEFAULT NULL,
  `tgl_muat` date DEFAULT NULL,
  `tgl_bongkar` date DEFAULT NULL,
  `nopol` char(20) DEFAULT NULL,
  `surat_jalan` char(100) DEFAULT NULL,
  `jenis_muatan` char(100) DEFAULT NULL,
  `berat_muatan` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_tagihan_det_trx_kas_bon_kantor` (`no_bon`),
  KEY `FK_trx_tagihan_det_trx_tagihan` (`no_tagihan`),
  CONSTRAINT `FK_trx_tagihan_det_trx_kas_bon_kantor` FOREIGN KEY (`no_bon`) REFERENCES `trx_kas_bon_kantor` (`no_bon`),
  CONSTRAINT `FK_trx_tagihan_det_trx_tagihan` FOREIGN KEY (`no_tagihan`) REFERENCES `trx_tagihan` (`no_tagihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_tagihan_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_tagihan_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_tagihan_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_tagihan_manual
DROP TABLE IF EXISTS `trx_tagihan_manual`;
CREATE TABLE IF NOT EXISTS `trx_tagihan_manual` (
  `no_tagihan` char(20) NOT NULL,
  `tgl_tagihan` date DEFAULT NULL,
  `kode_customer` char(10) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_tagihan`),
  KEY `FK_trx_tagihan_manual_master_customer` (`kode_customer`),
  CONSTRAINT `FK_trx_tagihan_manual_master_customer` FOREIGN KEY (`kode_customer`) REFERENCES `master_customer` (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_tagihan_manual: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_tagihan_manual` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_tagihan_manual` ENABLE KEYS */;

-- Dumping structure for table suryajaya.trx_tagihan_manual_det
DROP TABLE IF EXISTS `trx_tagihan_manual_det`;
CREATE TABLE IF NOT EXISTS `trx_tagihan_manual_det` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_tagihan` char(20) DEFAULT NULL,
  `no_bon` char(20) DEFAULT NULL,
  `tgl_muat` date DEFAULT NULL,
  `tgl_bongkar` date DEFAULT NULL,
  `nopol` char(20) DEFAULT NULL,
  `surat_jalan` char(100) DEFAULT NULL,
  `jenis_muatan` char(100) DEFAULT NULL,
  `berat_muatan` decimal(10,2) DEFAULT NULL,
  `ongkos_bruto` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `FK_trx_tagihan_manual_det_trx_tagihan_manual` (`no_tagihan`),
  KEY `FK_trx_tagihan_manual_det_trx_kas_bon_kantor` (`no_bon`),
  CONSTRAINT `FK_trx_tagihan_manual_det_trx_kas_bon_kantor` FOREIGN KEY (`no_bon`) REFERENCES `trx_kas_bon_kantor` (`no_bon`),
  CONSTRAINT `FK_trx_tagihan_manual_det_trx_tagihan_manual` FOREIGN KEY (`no_tagihan`) REFERENCES `trx_tagihan_manual` (`no_tagihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.trx_tagihan_manual_det: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_tagihan_manual_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_tagihan_manual_det` ENABLE KEYS */;

-- Dumping structure for table suryajaya.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT '0',
  `password` char(50) DEFAULT '0',
  `level` char(1) DEFAULT NULL,
  `data_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table suryajaya.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `level`, `data_sts`) VALUES
	(1, 'admin', '1234567', '0', '1'),
	(2, 'user1', '123', '1', '1'),
	(3, 'user2', '123', '2', '1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
