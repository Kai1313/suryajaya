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
}
