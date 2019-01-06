<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	//Generate Nomor Transaksi
	public function gen_num_($tb,$col,$affix)
	{
		$this->db->select_max($col,'code');
		$que = $this->db->get($tb);
		$ext = $que->row();
		$max = $ext->code;
		$len = strlen($affix);
		$mon = substr($max,$len,-7);
		if($max == null || $mon != date('ym'))
		{
			$max = $affix.date('ym').'-000000';
		}
		$num = (int) substr($max,-6);
		$num++;
		$kode = $affix.date('ym').'-';
		$res = $kode . sprintf('%06s',$num);
		return $res;
	}

	public function gen_noBeliBarang()
	{
		$res = $this->gen_num_('trx_beli_barang','no_nota','SK');
		$check = $this->db->get_where('trx_beli_barang',array('no_nota'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_beli_barang','no_nota','SK');
		}
		$crt = array(
			'no_nota'=>$res,
			'tgl_nota'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_beli_barang',$crt);
		$data['no_nota'] = $res;
		echo json_encode($data);
	}

	public function gen_noPakaiBarang()
	{
		$res = $this->gen_num_('trx_pakai_barang','no_pakai_brg','JL');
		$check = $this->db->get_where('trx_pakai_barang',array('no_pakai_brg'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_pakai_barang','no_pakai_brg','JL');
		}
		$crt = array(
			'no_pakai_brg'=>$res,
			'tgl_pakai_brg'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_pakai_barang',$crt);
		$data['no_pakai_brg'] = $res;
		echo json_encode($data);
	}

	public function gen_noBeliBan()
	{
		$res = $this->gen_num_('trx_beli_ban','no_pembelian','BL');
		$check = $this->db->get_where('trx_beli_ban',array('no_pembelian'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_beli_ban','no_pembelian','BL');
		}
		$crt = array(
			'no_pembelian'=>$res,
			'tgl_pembelian'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_beli_ban',$crt);
		$data['no_pembelian'] = $res;
		echo json_encode($data);
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
			'data_sts'=>'1'
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
			'data_sts'=>'1'
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
			'tlp_customer'=>$this->input->post('tlp_customer'),
			'data_sts'=>'1'
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
			'tlp_customer'=>$this->input->post('tlp_customer'),
			'data_sts'=>'1'
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
			'tlp_driver'=>$this->input->post('tlp_driver'),
			'data_sts'=>'1'
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
			'tlp_driver'=>$this->input->post('tlp_driver'),
			'data_sts'=>'1'
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
			'nom_biaya_driver'=>$this->input->post('nom_biaya'),
			'data_sts'=>'1'
		);
		$this->db->insert('master_biaya_driver',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updBiayaDriver()
	{
		$upd = array(
			'ket_biaya_driver'=>$this->input->post('ket_biaya'),
			'nom_biaya_driver'=>$this->input->post('nom_biaya'),
			'data_sts'=>'1'
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

	//CRUD Master Tujuan
	public function addTujuan()
	{
		$ins = array(
			'kode_tujuan'=>$this->input->post('kode_tujuan'),
			'ket_tujuan'=>$this->input->post('ket_tujuan'),
			'data_sts'=>'1'
		);
		$this->db->insert('master_tujuan',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updTujuan()
	{
		$upd = array(
			'ket_tujuan'=>$this->input->post('ket_tujuan'),
			'data_sts'=>'1'
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
			'tlp_supplier'=>$this->input->post('tlp_supplier'),
			'data_sts'=>'1'
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
			'tlp_supplier'=>$this->input->post('tlp_supplier'),
			'data_sts'=>'1'
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
			'kerja_penuh_6x'=>$this->input->post('kerja_penuh_6x'),
			'data_sts'=>'1'
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
			'kerja_penuh_6x'=>$this->input->post('kerja_penuh_6x'),
			'data_sts'=>'1'
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
			'kernet_kendaraan'=>$this->input->post('kernet_kendaraan'),
			'data_sts'=>'1'
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
			'kernet_kendaraan'=>$this->input->post('kernet_kendaraan'),
			'data_sts'=>'1'
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

	//CRUD Master Ban
	public function addBan()
	{
		$ins = array(
			'kode_ban'=>$this->input->post('kode_ban'),
			'nama_ban'=>$this->input->post('nama_ban'),
			'jenis_ban'=>$this->input->post('jenis_ban'),
			'merk_ban'=>$this->input->post('merk_ban'),
			'ukuran_ban'=>$this->input->post('ukuran_ban'),
			'stok_baru'=>'0',
			'stok_bekas'=>'0',
			'data_sts'=>'1'
		);
		$this->db->insert('master_ban',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updBan()
	{
		$upd = array(
			'nama_ban'=>$this->input->post('nama_ban'),
			'jenis_ban'=>$this->input->post('jenis_ban'),
			'merk_ban'=>$this->input->post('merk_ban'),
			'ukuran_ban'=>$this->input->post('ukuran_ban'),
			'stok_baru'=>'0',
			'stok_bekas'=>'0',
			'data_sts'=>'1'
		);
		$this->db->update('master_ban',$upd,array('kode_ban'=>$this->input->post('kode_ban')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getBan($key)
	{
		$data = $this->db->get_where('master_ban', array('kode_ban'=>$key))->row();
		echo json_encode($data);
	}

	//Dropdown Data
	public function getDropSupplier()
	{
		$data = $this->db->get_where('master_supplier',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropBarang()
	{
		$data = $this->db->get_where('master_barang',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropKaryawan()
	{
		$data = $this->db->get_where('master_karyawan',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropKendaraan()
	{
		$data = $this->db->get_where('master_kendaraan',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropSopir()
	{
		$data = $this->db->get_where('master_driver',array('data_sts'=>'1','jenis_driver'=>'0'))->result();
		echo json_encode($data);
	}

	public function getDropKernet()
	{
		$data = $this->db->get_where('master_driver',array('data_sts'=>'1','jenis_driver'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropBan()
	{
		$data = $this->db->get_where('master_ban',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	//Pick Data From Dropdown
	public function pickDropSupplier($key)
	{
		$data = $this->db->get_where('master_supplier',array('kode_supplier'=>$key))->row();
		echo json_encode($data);
	}

	public function pickDropBarang($key)
	{
		$data = $this->db->get_where('master_barang',array('kode_barang'=>$key,'data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	public function pickDropKaryawan($key)
	{
		$data = $this->db->get_where('master_karyawan',array('kode_karyawan'=>$key))->row();
		echo json_encode($data);
	}

	public function pickDropKendaraan($key)
	{
		$data = $this->db->get_where('master_kendaraan',array('kode_kendaraan'=>$key,'data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	public function pickDropBan($key)
	{
		$data = $this->db->get_where('master_ban',array('kode_ban'=>$key,'data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	//Transaksi Pembelian Barang/Spare Part
	public function addBeliBarang()
	{
		$ins = array(
			'no_nota'=>$this->input->post('no_nota'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'qty_beli'=>$this->input->post('qty_beli'),
			'harga_satuan'=>$this->input->post('harga_satuan'),
			'jumlah'=>$this->input->post('qty_beli')*$this->input->post('harga_satuan')
		);
		$this->db->insert('trx_beli_barang_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		// if($data['status']!=FALSE)
		// {
		// 	$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$this->input->post('kode_barang')))->row()->stok_barang;
		// 	$upStok = $getStok+$this->input->post('qty_beli');
		// 	$upd = array('stok_barang'=>$upStok);
		// 	$this->db->update('master_barang',$upd,array('kode_barang'=>$this->input->post('kode_barang')));
		// }
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function subTotalBeliBarang($key)
	{
		$data = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_beli_barang b','b.no_nota = a.no_nota')->get_where('trx_beli_barang_det a',array('a.no_nota'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvBeliBarang($key)
	{
		// $getDet = $this->db->get_where('trx_beli_barang_det',array('det_id'=>$key))->row();
		// $getStok = $this->db->get_where('master_barang',array('kode_barang'=>$getDet->kode_barang))->row()->stok_barang;
		// $upStok = ($getStok*1)-($getDet->qty_beli*1);
		// $upd = array('stok_barang'=>$upStok);
		// $this->db->update('master_barang',$upd,array('kode_barang'=>$getDet->kode_barang));
		$this->db->delete('trx_beli_barang_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveBeliBarang()
	{
		$getSts = $this->db->get_where('trx_beli_barang',array('no_nota'=>$this->input->post('no_nota')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_supplier'=>$this->input->post('kode_supplier'),
				'tgl_nota'=>$this->input->post('tgl_nota'),
				'diskon'=>$this->input->post('diskon'),
				'nom_diskon'=>$this->input->post('nom_diskon'),
				'grand_total'=>$this->input->post('grand_total'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_beli_barang',$upd,array('no_nota'=>$this->input->post('no_nota')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_beli_barang_det',array('no_nota'=>$this->input->post('no_nota')))->result();
				foreach ($detAll as $det)
				{
					$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
					$upStok = $getStok+$det->qty_beli;
					$upd = array('stok_barang'=>$upStok);
					$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBeliBarang()
	{
		$getSts = $this->db->get_where('trx_beli_barang',array('no_nota'=>$this->input->post('no_nota')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_beli_barang_det',array('no_nota'=>$this->input->post('no_nota')))->result();
			foreach ($detAll as $det)
			{
				$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
				$upStok = ($getStok*1)-($det->qty_beli*1);
				$upd = array('stok_barang'=>$upStok);
				$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_beli_barang',$can,array('no_nota'=>$this->input->post('no_nota')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Pemakaian Barang/Spare Part
	public function addPakaiBarang()
	{
		$ins = array(
			'no_pakai_brg'=>$this->input->post('no_pemakaian'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'qty_pakai'=>$this->input->post('qty_barang')
		);
		$this->db->insert('trx_pakai_barang_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvPakaiBarang($key)
	{
		$this->db->delete('trx_pakai_barang_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function tempPakaiBarang()
	{
		$getSts = $this->db->get_where('trx_pakai_barang',array('no_pakai_brg'=>$this->input->post('no_pemakaian')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'tgl_pakai_brg'=>$this->input->post('tgl_pemakaian'),
				'kode_kendaraan'=>$this->input->post('nopol'),
				'kode_sopir'=>$this->input->post('sopir_kendaraan'),
				'kode_kernet'=>$this->input->post('kernet_kendaraan'),
				'ket_pakai_brg'=>$this->input->post('ket_pemakaian'),
				'data_sts'=>'0'
			);
			$this->db->update('trx_pakai_barang',$upd,array('no_pakai_brg'=>$this->input->post('no_pemakaian')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}		
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Sementara Pemakaian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Sementara Pemakaian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function savePakaiBarang()
	{
		$getSts = $this->db->get_where('trx_pakai_barang',array('no_pakai_brg'=>$this->input->post('no_pemakaian')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'tgl_pakai_brg'=>$this->input->post('tgl_pemakaian'),
				'kode_kendaraan'=>$this->input->post('nopol'),
				'kode_sopir'=>$this->input->post('sopir_kendaraan'),
				'kode_kernet'=>$this->input->post('kernet_kendaraan'),
				'ket_pakai_brg'=>$this->input->post('ket_pemakaian'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_pakai_barang',$upd,array('no_pakai_brg'=>$this->input->post('no_pemakaian')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_pakai_barang_det',array('no_pakai_brg'=>$this->input->post('no_pemakaian')))->result();
				foreach ($detAll as $det)
				{
					$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
					$upStok = ($getStok*1)-($det->qty_pakai*1);
					$upd = array('stok_barang'=>$upStok);
					$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pemakaian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pemakaian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelPakaiBarang()
	{
		$getSts = $this->db->get_where('trx_pakai_barang',array('no_pakai_brg'=>$this->input->post('no_pemakaian')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_pakai_barang_det',array('no_pakai_brg'=>$this->input->post('no_pemakaian')))->result();
			foreach ($detAll as $det)
			{
				$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
				$upStok = ($getStok*1)+($det->qty_pakai*1);
				$upd = array('stok_barang'=>$upStok);
				$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_pakai_barang',$can,array('no_pakai_brg'=>$this->input->post('no_pemakaian')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Pembelian Barang/Spare Part
	public function addBeliBan()
	{
		$ins = array(
			'no_pembelian'=>$this->input->post('no_pembelian'),
			'kode_ban'=>$this->input->post('kode_ban'),
			'qty_beli'=>$this->input->post('qty_ban'),
			'harga_satuan'=>$this->input->post('harga_ban'),
			'jumlah'=>$this->input->post('qty_ban')*$this->input->post('harga_ban')
		);
		$this->db->insert('trx_beli_ban_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function subTotalBeliBan($key)
	{
		$data = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_beli_ban b','b.no_pembelian = a.no_pembelian')->get_where('trx_beli_ban_det a',array('a.no_pembelian'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvBeliBan($key)
	{
		$this->db->delete('trx_beli_ban_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveBeliBan()
	{
		$getSts = $this->db->get_where('trx_beli_ban',array('no_pembelian'=>$this->input->post('no_pembelian')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_supplier'=>$this->input->post('kode_supplier'),
				'tgl_pembelian'=>$this->input->post('tgl_pembelian'),
				'grand_total'=>$this->input->post('g_total'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_beli_ban',$upd,array('no_pembelian'=>$this->input->post('no_pembelian')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_beli_ban_det',array('no_pembelian'=>$this->input->post('no_pembelian')))->result();
				foreach ($detAll as $det)
				{
					$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_baru;
					$upStok = $getStok+$det->qty_beli;
					$upd = array('stok_baru'=>$upStok);
					$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBeliBan()
	{
		$getSts = $this->db->get_where('trx_beli_ban',array('no_pembelian'=>$this->input->post('no_pembelian')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_beli_ban_det',array('no_pembelian'=>$this->input->post('no_pembelian')))->result();
			foreach ($detAll as $det)
			{
				$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_baru;
				$upStok = ($getStok*1)-($det->qty_beli*1);
				$upd = array('stok_baru'=>$upStok);
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_beli_ban',$can,array('no_pembelian'=>$this->input->post('no_pembelian')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}
	
	//Get Data Pencarian
	public function getBeliBrg($key)
	{
		$data = $this->db->get_where('trx_beli_barang',array('no_nota'=>$key))->row();
		echo json_encode($data);
	}

	public function getPakaiBrg($key)
	{
		$data = $this->db->get_where('trx_pakai_barang',array('no_pakai_brg'=>$key))->row();
		echo json_encode($data);
	}

	public function getBeliBan($key)
	{
		$data = $this->db->get_where('trx_beli_ban',array('no_pembelian'=>$key))->row();
		echo json_encode($data);
	}
}
