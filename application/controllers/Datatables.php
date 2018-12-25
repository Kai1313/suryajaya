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
		$this->load->model('Datatables/show/showTujuan','showTujuan');
		$this->load->model('Datatables/show/showSupplier','showSupplier');
		$this->load->model('Datatables/show/showKaryawan','showKaryawan');
		$this->load->model('Datatables/show/showKendaraan','showKendaraan');
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

	public function mTujuan()
	{
		$list = $this->showTujuan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_tujuan;
			$row[] = $dat->ket_tujuan;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_tujuan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_tujuan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showTujuan->count_all(),
				"recordsFiltered" => $this->showTujuan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mSupplier()
	{
		$list = $this->showSupplier->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_supplier;
			$row[] = $dat->nama_supplier;
			$row[] = $dat->alamat_supplier;
			$row[] = $dat->kota_supplier;
			$row[] = $dat->tlp_supplier;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_supplier."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_supplier."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showSupplier->count_all(),
				"recordsFiltered" => $this->showSupplier->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mKaryawan()
	{
		$list = $this->showKaryawan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_karyawan;
			$row[] = $dat->nama_karyawan;
			$row[] = $dat->alamat_karyawan;
			$row[] = $dat->kota_karyawan;
			$row[] = $dat->tlp_karyawan;
			$row[] = $dat->gaji_bulanan;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_karyawan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_karyawan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showKaryawan->count_all(),
				"recordsFiltered" => $this->showKaryawan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function mKendaraan()
	{
		$list = $this->showKendaraan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->nopol;
			$row[] = $dat->tipe_kendaraan;
			$row[] = $dat->jenis_kendaraan;
			$row[] = $dat->warna_kendaraan;
			$row[] = $dat->sopir_kendaraan;
			$row[] = $dat->kernet_kendaraan;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->nopol."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->nopol."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showKendaraan->count_all(),
				"recordsFiltered" => $this->showKendaraan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}
}
