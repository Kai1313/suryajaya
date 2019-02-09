<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'Paging/index';
$route['master-barang'] = 'Paging/m_barang';
$route['master-customer'] = 'Paging/m_customer';
$route['master-kendaraan'] = 'Paging/m_kendaraan';
$route['master-karyawan'] = 'Paging/m_karyawan';
$route['master-driver'] = 'Paging/m_driver';
$route['master-biaya-driver'] = 'Paging/m_biaya_driver';
$route['master-tujuan'] = 'Paging/m_tujuan';
$route['master-supplier'] = 'Paging/m_supplier';
$route['master-ban'] = 'Paging/m_ban';
$route['transaksi-pembelian-spare-part'] = 'Paging/t_pembelian_spare_part';
$route['transaksi-pemakaian-spare-part'] = 'Paging/t_pemakaian_spare_part';
$route['transaksi-pembelian-ban'] = 'Paging/t_pembelian_ban';
$route['transaksi-pemakaian-ban'] = 'Paging/t_pemakaian_ban';
$route['transaksi-biaya-kendaraan'] = 'Paging/t_biaya_kendaraan';
$route['transaksi-retur-pembelian-spare-part'] = 'Paging/t_retur_pembelian_spare_part';
$route['transaksi-retur-pemakaian-spare-part'] = 'Paging/t_retur_pemakaian_spare_part';
$route['transaksi-input-bon'] = 'Paging/t_input_bon';
$route['transaksi-input-kas'] = 'Paging/t_input_kas';
$route['transaksi-input-upah'] = 'Paging/t_input_upah';
$route['transaksi-katalog-kendaraan'] = 'Paging/t_katalog_kendaraan';
$route['transaksi-input-bon-sopir'] = 'Paging/t_input_bon_sopir';
$route['transaksi-input-klaim-sopir'] = 'Paging/t_input_klaim_sopir';
$route['transaksi-kas-bon-sopir'] = 'Paging/t_kas_bon_sopir';
$route['transaksi-kas-bon-kantor'] = 'Paging/t_kas_bon_kantor';
$route['transaksi-tagihan'] = 'Paging/t_tagihan';
$route['transaksi-tagihan-manual'] = 'Paging/t_tagihan_manual';
$route['transaksi-pelunasan-piutang'] = 'Paging/t_pelunasan_piutang';
$route['transaksi-kuitansi'] = 'Paging/t_kuitansi';
$route['transaksi-pembayaran-bon-klaim-sopir'] = 'Paging/t_pembayaran_bon_klaim_sopir';
$route['laporan-master-barang'] = 'Paging/lap_master_barang';
$route['laporan-master-customer'] = 'Paging/lap_master_customer';
$route['laporan-master-kendaraan'] = 'Paging/lap_master_kendaraan';
$route['laporan-master-karyawan'] = 'Paging/lap_master_karyawan';
$route['laporan-master-sopir'] = 'Paging/lap_master_sopir';
$route['laporan-master-biaya-sopir'] = 'Paging/lap_master_biaya_sopir';
$route['laporan-master-tujuan'] = 'Paging/lap_master_tujuan';
$route['laporan-master-ban'] = 'Paging/lap_master_ban';
$route['laporan-master-supplier'] = 'Paging/lap_master_supplier';