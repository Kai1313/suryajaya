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
}
