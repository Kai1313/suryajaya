<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datatables/show/showBarang','showBarang');
		$this->load->model('Datatables/show/showCustomer','showCustomer');
		$this->load->model('Datatables/show/showDriver','showDriver');
		$this->load->model('Datatables/show/showBiayaDriver','showBiayaDriver');
	}

	public function mBarang()
	{
		$list = $this->showBarang->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_barang;
			$row[] = $dat->nama_barang;
			$row[] = $dat->part_number;
			$row[] = $dat->min_qty.' '.$dat->nama_satuan;
			$row[] = $dat->qty_perset.' '.$dat->nama_satuan;
			$row[] = $dat->no_rak;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_barang."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_barang."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showBarang->count_all(),
				"recordsFiltered" => $this->showBarang->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mCustomer()
	{
		$list = $this->showCustomer->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_customer;
			$row[] = $dat->nama_customer;
			$row[] = $dat->alamat_customer;
			$row[] = $dat->kota_customer;
			$row[] = $dat->jenis_customer;
			$row[] = $dat->tlp_customer;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_customer."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_customer."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showCustomer->count_all(),
				"recordsFiltered" => $this->showCustomer->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mDriver()
	{
		$list = $this->showDriver->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_driver;
			$row[] = $dat->nama_driver;
			$row[] = $dat->alamat_driver;
			$row[] = $dat->kota_driver;
			$row[] = ($dat->jenis_driver=='1')?'Kernet':'Sopir';
			$row[] = $dat->tlp_driver;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_driver."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_driver."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showDriver->count_all(),
				"recordsFiltered" => $this->showDriver->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mBiayaDriver()
	{
		$list = $this->showBiayaDriver->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_biaya_driver;
			$row[] = $dat->ket_biaya_driver;
			$row[] = $dat->nom_biaya_driver;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_biaya_driver."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_biaya_driver."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showBiayaDriver->count_all(),
				"recordsFiltered" => $this->showBiayaDriver->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}
}
