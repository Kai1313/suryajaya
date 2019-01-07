<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paging extends CI_Controller
{
	//Dashboard
	public function index()
	{
		$data['page_header']='Dashboard';
		$data['page_desc']='Description';
		$data['content']='menu/dashboard';
		$this->load->view('layout/wrapper',$data);
	}

	//Master
	public function m_barang()
	{
		$data['page_header']='Master Barang';
		$data['content']='menu/m_barang';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_customer()
	{
		$data['page_header']='Master Customer';
		$data['content']='menu/m_customer';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_kendaraan()
	{
		$data['page_header']='Master Kendaraan';
		$data['content']='menu/m_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_karyawan()
	{
		$data['page_header']='Master Karyawan';
		$data['content']='menu/m_karyawan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_driver()
	{
		$data['page_header']='Master Driver';
		$data['content']='menu/m_driver';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_biaya_driver()
	{
		$data['page_header']='Master Biaya Driver';
		$data['content']='menu/m_biaya_driver';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_tujuan()
	{
		$data['page_header']='Master Tujuan';
		$data['content']='menu/m_tujuan';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_supplier()
	{
		$data['page_header']='Master Supplier';
		$data['content']='menu/m_supplier';
		$this->load->view('layout/wrapper',$data);
	}

	public function m_ban()
	{
		$data['page_header']='Master Ban';
		$data['content']='menu/m_ban';
		$this->load->view('layout/wrapper',$data);
	}

	//Transaksi
	public function t_pembelian_spare_part()
	{
		$data['page_header']='Transaksi Pembelian Spare Part';
		$data['content']='menu/t_pembelian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pemakaian_spare_part()
	{
		$data['page_header']='Transaksi Pemakaian Spare Part';
		$data['content']='menu/t_pemakaian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pembelian_ban()
	{
		$data['page_header']='Transaksi Pembelian Ban';
		$data['content']='menu/t_pembelian_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pemakaian_ban()
	{
		$data['page_header']='Transaksi Pemakaian Ban';
		$data['content']='menu/t_pemakaian_ban';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_biaya_kendaraan()
	{
		$data['page_header']='Transaksi Biaya Kendaraan';
		$data['content']='menu/t_biaya_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_retur_pembelian_spare_part()
	{
		$data['page_header']='Transaksi Retur Pembelian Spare Part';
		$data['content']='menu/t_retur_pembelian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_retur_pemakaian_spare_part()
	{
		$data['page_header']='Transaksi Retur Pemakaian Spare Part';
		$data['content']='menu/t_retur_pemakaian_spare_part';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_bon()
	{
		$data['page_header']='Transaksi Input Bon';
		$data['content']='menu/t_input_bon';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_kas()
	{
		$data['page_header']='Transaksi Input Kas';
		$data['content']='menu/t_input_kas';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_upah()
	{
		$data['page_header']='Transaksi Input Upah';
		$data['content']='menu/t_input_upah';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_katalog_kendaraan()
	{
		$data['page_header']='Transaksi Katalog Kendaraan';
		$data['content']='menu/t_katalog_kendaraan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_bon_sopir()
	{
		$data['page_header']='Transaksi Input Bon Sopir';
		$data['content']='menu/t_input_bon_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_input_klaim_sopir()
	{
		$data['page_header']='Transaksi Input Klaim Sopir';
		$data['content']='menu/t_input_klaim_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kas_bon_sopir()
	{
		$data['page_header']='Transaksi Kas Bon Sopir';
		$data['content']='menu/t_kas_bon_sopir';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kas_bon_kantor()
	{
		$data['page_header']='Transaksi Kas Bon Kantor';
		$data['content']='menu/t_kas_bon_kantor';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_tagihan()
	{
		$data['page_header']='Transaksi Tagihan';
		$data['content']='menu/t_tagihan';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_tagihan_manual()
	{
		$data['page_header']='Transaksi Tagihan Manual';
		$data['content']='menu/t_tagihan_manual';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pelunasan_piutang()
	{
		$data['page_header']='Transaksi Pelunasan Piutang';
		$data['content']='menu/t_pelunasan_piutang';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_kuitansi()
	{
		$data['page_header']='Transaksi Kuitansi';
		$data['content']='menu/t_kuitansi';
		$this->load->view('layout/wrapper',$data);
	}

	public function t_pembayaran_bon_klaim()
	{
		$data['page_header']='Transaksi Pembayaran Bon Klaim';
		$data['content']='menu/t_pembayaran_bon_klaim';
		$this->load->view('layout/wrapper',$data);
	}
}
