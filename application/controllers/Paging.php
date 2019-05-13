<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paging extends CI_Controller
{
	//Dashboard
	public function index()
	{
		$this->authsys->logcheck_();
		$data['page_header']='Dashboard';
		$data['page_desc']='Description';
		$data['content']='menu/dashboard';
		$this->load->view('layout/wrapper',$data);
	}

	//Login
	public function login_page()
	{
		$data['page_header']='Login Page';
		$data['page_desc']='Description';
		$this->load->view('menu/login_page',$data);
	}

	//Master
	public function m_barang()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m1');
		$data['page_header']='Master Barang';
		$data['content']='menu/m_barang';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_customer()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m2');
		$data['page_header']='Master Customer';
		$data['content']='menu/m_customer';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_kendaraan()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m3');
		$data['page_header']='Master Kendaraan';
		$data['content']='menu/m_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_karyawan()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m4');
		$data['page_header']='Master Karyawan';
		$data['content']='menu/m_karyawan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_driver()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m5');
		$data['page_header']='Master Driver';
		$data['content']='menu/m_driver';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_biaya_driver()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m6');
		$data['page_header']='Master Biaya Driver';
		$data['content']='menu/m_biaya_driver';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_tujuan()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m7');
		$data['page_header']='Master Tujuan';
		$data['content']='menu/m_tujuan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_supplier()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m8');
		$data['page_header']='Master Supplier';
		$data['content']='menu/m_supplier';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_ban()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m9');
		$data['page_header']='Master Ban';
		$data['content']='menu/m_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_rekening()
	{
		$this->authsys->master_check_($_SESSION['user_id'],'m10');
		$data['page_header']='Master Rekening';
		$data['content']='menu/m_rekening';
		$this->load->view('layout/wrapper',$data);
	}

	//Transaksi
	public function t_pembelian_spare_part()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t1');
		$data['page_header']='Transaksi Pembelian Spare Part';
		$data['content']='menu/t_pembelian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pemakaian_spare_part()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t2');
		$data['page_header']='Transaksi Pemakaian Spare Part';
		$data['content']='menu/t_pemakaian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pembelian_ban()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t3');
		$data['page_header']='Transaksi Pembelian Ban';
		$data['content']='menu/t_pembelian_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pemakaian_ban()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t4');
		$data['page_header']='Transaksi Pemakaian Ban';
		$data['content']='menu/t_pemakaian_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_biaya_kendaraan()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t6');
		$data['page_header']='Transaksi Biaya Kendaraan';
		$data['content']='menu/t_biaya_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_retur_pembelian_spare_part()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t7');
		$data['page_header']='Transaksi Retur Pembelian Spare Part';
		$data['content']='menu/t_retur_pembelian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_retur_pemakaian_spare_part()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t8');
		$data['page_header']='Transaksi Retur Pemakaian Spare Part';
		$data['content']='menu/t_retur_pemakaian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_bon()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t9');
		$data['page_header']='Transaksi Input Bon';
		$data['content']='menu/t_input_bon';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_kas()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t10');
		$data['page_header']='Transaksi Input Kas';
		$data['content']='menu/t_input_kas';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_upah()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t11');
		$data['page_header']='Transaksi Input Upah';
		$data['content']='menu/t_input_upah';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_katalog_kendaraan()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t12');
		$data['page_header']='Transaksi Katalog Kendaraan';
		$data['content']='menu/t_katalog_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_bon_sopir()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t13');
		$data['page_header']='Transaksi Input Bon Sopir';
		$data['content']='menu/t_input_bon_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_klaim_sopir()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t14');
		$data['page_header']='Transaksi Input Klaim Sopir';
		$data['content']='menu/t_input_klaim_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kas_bon_sopir()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t15');
		$data['page_header']='Transaksi Kas Bon Sopir';
		$data['content']='menu/t_kas_bon_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kas_bon_kantor()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t16');
		$data['page_header']='Transaksi Kas Bon Kantor';
		$data['content']='menu/t_kas_bon_kantor';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_tagihan()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t17');
		$data['page_header']='Transaksi Tagihan';
		$data['content']='menu/t_tagihan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_tagihan_manual()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t17');
		$data['page_header']='Transaksi Tagihan Manual';
		$data['content']='menu/t_tagihan_manual';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pelunasan_piutang()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t18');
		$data['page_header']='Transaksi Pelunasan Piutang';
		$data['content']='menu/t_pelunasan_piutang';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kuitansi()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t19');
		$data['page_header']='Transaksi Kuitansi';
		$data['content']='menu/t_kuitansi';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pembayaran_bon_klaim_sopir()
	{
		$this->authsys->trx_check_($_SESSION['user_id'],'t20');
		$data['page_header']='Transaksi Pembayaran Bon Klaim Sopir';
		$data['content']='menu/t_pembayaran_bon_klaim_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	//Administrator
	public function admin_settings()
	{
		$this->authsys->logcheck_();
		$this->authsys->admlog();
		$data['page_header']='Administrator Settings';
		$data['content']='menu/admin_settings';
		$this->load->view('layout/wrapper',$data);
	}

	public function admin_users()
	{
		$this->authsys->admlog();
		$this->authsys->logcheck_();
		$data['page_header']='Administrator Users';
		$data['content']='menu/admin_users';
		$this->load->view('layout/wrapper',$data);
	}

	//Stok
	public function stok_ban()
	{
		$this->authsys->logcheck_();
		$data['page_header']='Stok Ban';
		$data['content']='menu/stok_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function stok_spare_part()
	{
		$this->authsys->logcheck_();
		$data['page_header']='Stok Spare Part';
		$data['content']='menu/stok_spare_part';
		$this->load->view('layout/wrapper',$data);
	}
}
