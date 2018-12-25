<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	//CRUD Master Barang
	public function addBarang()
	{
		$ins = array(
			'kode_barang'=>$this->input->post('kode_barang'),
			'nama_barang'=>$this->input->post('nama_barang'),
			'nama_satuan'=>$this->input->post('nama_satuan'),
			'part_number'=>$this->input->post('part_number'),
			'min_qty'=>$this->input->post('min_qty'),
			'qty_perset'=>$this->input->post('qty_perset'),
			'no_rak'=>$this->input->post('no_rak'),
		);
		$this->db->insert('master_barang',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updBarang()
	{
		$upd = array(
			'nama_barang'=>$this->input->post('nama_barang'),
			'nama_satuan'=>$this->input->post('nama_satuan'),
			'part_number'=>$this->input->post('part_number'),
			'min_qty'=>$this->input->post('min_qty'),
			'qty_perset'=>$this->input->post('qty_perset'),
			'no_rak'=>$this->input->post('no_rak'),
		);
		$this->db->update('master_barang',$upd,array('kode_barang'=>$this->input->post('kode_barang')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getBarang($key)
	{
		$data = $this->db->get_where('master_barang', array('kode_barang'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Customer
	public function addCustomer()
	{
		$ins = array(
			'kode_customer'=>$this->input->post('kode_customer'),
			'nama_customer'=>$this->input->post('nama_customer'),
			'alamat_customer'=>$this->input->post('alamat_customer'),
			'kota_customer'=>$this->input->post('kota_customer'),
			'jenis_customer'=>$this->input->post('jenis_customer'),
			'tlp_customer'=>$this->input->post('tlp_customer')
		);
		$this->db->insert('master_customer',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updCustomer()
	{
		$upd = array(
			'nama_customer'=>$this->input->post('nama_customer'),
			'alamat_customer'=>$this->input->post('alamat_customer'),
			'kota_customer'=>$this->input->post('kota_customer'),
			'jenis_customer'=>$this->input->post('jenis_customer'),
			'tlp_customer'=>$this->input->post('tlp_customer')
		);
		$this->db->update('master_customer',$upd,array('kode_customer'=>$this->input->post('kode_customer')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getCustomer($key)
	{
		$data = $this->db->get_where('master_customer', array('kode_customer'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Driver
	public function addDriver()
	{
		$ins = array(
			'kode_driver'=>$this->input->post('kode_driver'),
			'nama_driver'=>$this->input->post('nama_driver'),
			'alamat_driver'=>$this->input->post('alamat_driver'),
			'kota_driver'=>$this->input->post('kota_driver'),
			'jenis_driver'=>$this->input->post('jenis_driver'),
			'tlp_driver'=>$this->input->post('tlp_driver')
		);
		$this->db->insert('master_driver',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updDriver()
	{
		$upd = array(
			'nama_driver'=>$this->input->post('nama_driver'),
			'alamat_driver'=>$this->input->post('alamat_driver'),
			'kota_driver'=>$this->input->post('kota_driver'),
			'jenis_driver'=>$this->input->post('jenis_driver'),
			'tlp_driver'=>$this->input->post('tlp_driver')
		);
		$this->db->update('master_driver',$upd,array('kode_driver'=>$this->input->post('kode_driver')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getDriver($key)
	{
		$data = $this->db->get_where('master_driver', array('kode_driver'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Biaya Driver
	public function addBiayaDriver()
	{
		$ins = array(
			'kode_biaya_driver'=>$this->input->post('kode_biaya'),
			'ket_biaya_driver'=>$this->input->post('ket_biaya'),
			'nom_biaya_driver'=>$this->input->post('nom_biaya')
		);
		$this->db->insert('master_biaya_driver',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updBiayaDriver()
	{
		$upd = array(
			'ket_biaya_driver'=>$this->input->post('ket_biaya'),
			'nom_biaya_driver'=>$this->input->post('nom_biaya')
		);
		$this->db->update('master_biaya_driver',$upd,array('kode_biaya_driver'=>$this->input->post('kode_biaya')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getBiayaDriver($key)
	{
		$data = $this->db->get_where('master_biaya_driver', array('kode_biaya_driver'=>$key))->row();
		echo json_encode($data);
	}
<<<<<<< HEAD

	//CRUD Master Tujuan
	public function addTujuan()
	{
		$ins = array(
			'kode_tujuan'=>$this->input->post('kode_tujuan'),
			'ket_tujuan'=>$this->input->post('ket_tujuan')
		);
		$this->db->insert('master_tujuan',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updTujuan()
	{
		$upd = array(
			'ket_tujuan'=>$this->input->post('ket_tujuan')
		);
		$this->db->update('master_tujuan',$upd,array('kode_tujuan'=>$this->input->post('kode_tujuan')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getTujuan($key)
	{
		$data = $this->db->get_where('master_tujuan', array('kode_tujuan'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Supplier
	public function addSupplier()
	{
		$ins = array(
			'kode_supplier'=>$this->input->post('kode_supplier'),
			'nama_supplier'=>$this->input->post('nama_supplier'),
			'alamat_supplier'=>$this->input->post('alamat_supplier'),
			'kota_supplier'=>$this->input->post('kota_supplier'),
			'tlp_supplier'=>$this->input->post('tlp_supplier')
		);
		$this->db->insert('master_supplier',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updSupplier()
	{
		$upd = array(
			'kode_supplier'=>$this->input->post('kode_supplier'),
			'nama_supplier'=>$this->input->post('nama_supplier'),
			'alamat_supplier'=>$this->input->post('alamat_supplier'),
			'kota_supplier'=>$this->input->post('kota_supplier'),
			'tlp_supplier'=>$this->input->post('tlp_supplier')
		);
		$this->db->update('master_supplier',$upd,array('kode_supplier'=>$this->input->post('kode_supplier')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getSupplier($key)
	{
		$data = $this->db->get_where('master_supplier', array('kode_supplier'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Karyawan
	public function addKaryawan()
	{
		$ins = array(
			'kode_karyawan'=>$this->input->post('kode_karyawan'),
			'nama_karyawan'=>$this->input->post('nama_karyawan'),
			'alamat_karyawan'=>$this->input->post('alamat_karyawan'),
			'kota_karyawan'=>$this->input->post('kota_karyawan'),
			'tlp_karyawan'=>$this->input->post('tlp_karyawan'),
			'upah_harian'=>$this->input->post('upah_harian'),
			'upah_hari_besar'=>$this->input->post('upah_hari_besar'),
			'upah_hari_minggu'=>$this->input->post('upah_hari_minggu'),
			'min_jam_lembur'=>$this->input->post('min_jam_lembur'),
			'upah_lembur'=>$this->input->post('upah_lembur'),
			'gaji_bulanan'=>$this->input->post('gaji_bulanan'),
			'kerja_penuh_6x'=>$this->input->post('kerja_penuh_6x')
		);
		$this->db->insert('master_karyawan',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updKaryawan()
	{
		$upd = array(
			'nama_karyawan'=>$this->input->post('nama_karyawan'),
			'alamat_karyawan'=>$this->input->post('alamat_karyawan'),
			'kota_karyawan'=>$this->input->post('kota_karyawan'),
			'tlp_karyawan'=>$this->input->post('tlp_karyawan'),
			'upah_harian'=>$this->input->post('upah_harian'),
			'upah_hari_besar'=>$this->input->post('upah_hari_besar'),
			'upah_hari_minggu'=>$this->input->post('upah_hari_minggu'),
			'min_jam_lembur'=>$this->input->post('min_jam_lembur'),
			'upah_lembur'=>$this->input->post('upah_lembur'),
			'gaji_bulanan'=>$this->input->post('gaji_bulanan'),
			'kerja_penuh_6x'=>$this->input->post('kerja_penuh_6x')
		);
		$this->db->update('master_karyawan',$upd,array('kode_karyawan'=>$this->input->post('kode_karyawan')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getKaryawan($key)
	{
		$data = $this->db->get_where('master_karyawan', array('kode_karyawan'=>$key))->row();
		echo json_encode($data);
	}

	//CRUD Master Kendaraan
	public function addKendaraan()
	{
		$ins = array(
			'nopol'=>$this->input->post('nopol'),
			'no_mesin'=>$this->input->post('no_mesin'),
			'no_rangka'=>$this->input->post('no_rangka'),
			'tipe_kendaraan'=>$this->input->post('tipe_kendaraan'),
			'jenis_kendaraan'=>$this->input->post('jenis_kendaraan'),
			'nama_pemilik'=>$this->input->post('nama_pemilik'),
			'thn_pembuatan'=>$this->input->post('thn_pembuatan'),
			'no_bpkb'=>$this->input->post('no_bpkb'),
			'warna_kendaraan'=>$this->input->post('warna_kendaraan'),
			'masa_stnk'=>$this->input->post('masa_stnk'),
			'cc_kendaraan'=>$this->input->post('cc_kendaraan'),
			'sopir_kendaraan'=>$this->input->post('sopir_kendaraan'),
			'kernet_kendaraan'=>$this->input->post('kernet_kendaraan')
		);
		$this->db->insert('master_kendaraan',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updKendaraan()
	{
		$upd = array(
			'no_mesin'=>$this->input->post('no_mesin'),
			'no_rangka'=>$this->input->post('no_rangka'),
			'tipe_kendaraan'=>$this->input->post('tipe_kendaraan'),
			'jenis_kendaraan'=>$this->input->post('jenis_kendaraan'),
			'nama_pemilik'=>$this->input->post('nama_pemilik'),
			'thn_pembuatan'=>$this->input->post('thn_pembuatan'),
			'no_bpkb'=>$this->input->post('no_bpkb'),
			'warna_kendaraan'=>$this->input->post('warna_kendaraan'),
			'masa_stnk'=>$this->input->post('masa_stnk'),
			'cc_kendaraan'=>$this->input->post('cc_kendaraan'),
			'sopir_kendaraan'=>$this->input->post('sopir_kendaraan'),
			'kernet_kendaraan'=>$this->input->post('kernet_kendaraan')
		);
		$this->db->update('master_kendaraan',$upd,array('kode_kendaraan'=>$this->input->post('kode_kendaraan')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getKendaraan($key)
	{
		$data = $this->db->get_where('master_kendaraan', array('kode_kendaraan'=>$key))->row();
		echo json_encode($data);
	}
=======
>>>>>>> update
}
