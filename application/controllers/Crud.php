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

	public function gen_noBiayaKendaraan()
	{
		$res = $this->gen_num_('trx_biaya_kendaraan','no_biaya','BY');
		$check = $this->db->get_where('trx_biaya_kendaraan',array('no_biaya'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_biaya_kendaraan','no_biaya','BY');
		}
		$crt = array(
			'no_biaya'=>$res,
			'tgl_biaya'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_biaya_kendaraan',$crt);
		$data['no_biaya'] = $res;
		echo json_encode($data);
	}

	public function gen_noReturBeliBarang()
	{
		$res = $this->gen_num_('trx_retur_beli_barang','no_retur','RBL');
		$check = $this->db->get_where('trx_retur_beli_barang',array('no_retur'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_retur_beli_barang','no_retur','RBL');
		}
		$crt = array(
			'no_retur'=>$res,
			'tgl_retur'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_retur_beli_barang',$crt);
		$data['no_retur'] = $res;
		echo json_encode($data);
	}

	public function gen_noReturPakaiBarang()
	{
		$res = $this->gen_num_('trx_retur_pakai_barang','no_retur','RJL');
		$check = $this->db->get_where('trx_retur_pakai_barang',array('no_retur'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_retur_pakai_barang','no_retur','RJL');
		}
		$crt = array(
			'no_retur'=>$res,
			'tgl_retur'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_retur_pakai_barang',$crt);
		$data['no_retur'] = $res;
		echo json_encode($data);
	}

	public function gen_noBonKaryawan()
	{
		$res = $this->gen_num_('trx_input_bon_karyawan','no_bon','BON');
		$check = $this->db->get_where('trx_input_bon_karyawan',array('no_bon'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_input_bon_karyawan','no_bon','BON');
		}
		$crt = array(
			'no_bon'=>$res,
			'tgl_bon'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_input_bon_karyawan',$crt);
		$data['no_bon'] = $res;
		echo json_encode($data);
	}

	public function gen_noKas()
	{
		$res = $this->gen_num_('trx_input_kas','no_kas','KAS');
		$check = $this->db->get_where('trx_input_kas',array('no_kas'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_input_kas','no_kas','KAS');
		}
		$crt = array(
			'no_kas'=>$res,
			'tgl_kas'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_input_kas',$crt);
		$data['no_kas'] = $res;
		echo json_encode($data);
	}

	public function gen_noBonSopir()
	{
		$res = $this->gen_num_('trx_input_bon_sopir','no_bon','BONS');
		$check = $this->db->get_where('trx_input_bon_sopir',array('no_bon'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_input_bon_sopir','no_bon','BONS');
		}
		$crt = array(
			'no_bon'=>$res,
			'tgl_bon'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_input_bon_sopir',$crt);
		$data['no_bon'] = $res;
		echo json_encode($data);
	}

	public function gen_noKlaimSopir()
	{
		$res = $this->gen_num_('trx_input_klaim_sopir','no_klaim','KLM');
		$check = $this->db->get_where('trx_input_klaim_sopir',array('no_klaim'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_input_klaim_sopir','no_klaim','KLM');
		}
		$crt = array(
			'no_klaim'=>$res,
			'tgl_klaim'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_input_klaim_sopir',$crt);
		$data['no_klaim'] = $res;
		echo json_encode($data);
	}

	public function gen_noBayarSopir()
	{
		$res = $this->gen_num_('trx_bayar_bonklaim_sopir','no_bayar','BYR');
		$check = $this->db->get_where('trx_bayar_bonklaim_sopir',array('no_bayar'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_bayar_bonklaim_sopir','no_klaim','BYR');
		}
		$crt = array(
			'no_bayar'=>$res,
			'tgl_bayar'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_bayar_bonklaim_sopir',$crt);
		$data['no_bayar'] = $res;
		echo json_encode($data);
	}

	public function gen_noKuitansiUpah()
	{
		$res = $this->gen_num_('trx_bayar_upah_karyawan','no_kuitansi','KUI');
		$check = $this->db->get_where('trx_bayar_upah_karyawan',array('no_kuitansi'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_bayar_upah_karyawan','no_kuitansi','KUI');
		}
		$crt = array(
			'no_kuitansi'=>$res,
			'tgl_upah'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_bayar_upah_karyawan',$crt);
		$data['no_kuitansi'] = $res;
		echo json_encode($data);
	}

	public function gen_noKasBonSopir()
	{
		$res = $this->gen_num_('trx_kas_bon_sopir','no_bon','SS');
		$check = $this->db->get_where('trx_kas_bon_sopir',array('no_bon'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_kas_bon_sopir','no_bon','SS');
		}
		$crt = array(
			'no_bon'=>$res,
			'tgl_bon'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_kas_bon_sopir',$crt);
		$data['no_bon'] = $res;
		echo json_encode($data);
	}

	public function gen_noKasBonKantor()
	{
		$res = $this->gen_num_('trx_kas_bon_kantor','no_bon','AS');
		$check = $this->db->get_where('trx_kas_bon_kantor',array('no_bon'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_kas_bon_kantor','no_bon','AS');
		}
		$crt = array(
			'no_bon'=>$res,
			'tgl_bon'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_kas_bon_kantor',$crt);
		$data['no_bon'] = $res;
		echo json_encode($data);
	}

	public function gen_noPasangBan()
	{
		$res = $this->gen_num_('trx_pasang_ban','no_pemasangan','PSG');
		$check = $this->db->get_where('trx_pasang_ban',array('no_pemasangan'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_pasang_ban','no_pemasangan','PSG');
		}
		$crt = array(
			'no_pemasangan'=>$res,
			'tgl_pemasangan'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_pasang_ban',$crt);
		$data['no_pemasangan'] = $res;
		echo json_encode($data);
	}

	public function gen_noLepasBan()
	{
		$res = $this->gen_num_('trx_lepas_ban','no_pelepasan','LPS');
		$check = $this->db->get_where('trx_lepas_ban',array('no_pelepasan'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_lepas_ban','no_pelepasan','LPS');
		}
		$crt = array(
			'no_pelepasan'=>$res,
			'tgl_pelepasan'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_lepas_ban',$crt);
		$data['no_pelepasan'] = $res;
		echo json_encode($data);
	}

	public function gen_noTagihan()
	{
		$res = $this->gen_num_('trx_tagihan','no_tagihan','SJT');
		$check = $this->db->get_where('trx_tagihan',array('no_tagihan'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_tagihan','no_tagihan','SJT');
		}
		$crt = array(
			'no_tagihan'=>$res,
			'tgl_tagihan'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_tagihan',$crt);
		$data['no_tagihan'] = $res;
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
			'upah_makan'=>$this->input->post('upah_makan'),
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
			'upah_makan'=>$this->input->post('upah_makan'),
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

	public function getDropNota()
	{
		$data = $this->db->get_where('trx_beli_barang',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropPemakaian()
	{
		$data = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->get_where('trx_pakai_barang a',array('a.data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropCustomer()
	{
		$data = $this->db->get_where('master_customer',array('data_sts'=>'1'))->result();
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

	public function pickDropNota($key)
	{
		$data = $this->db->get_where('trx_beli_barang',array('no_nota'=>$key,'data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	public function pickDropPemakaian($key)
	{
		$data = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->get_where('trx_pakai_barang a',array('a.no_pakai_brg'=>$key,'a.data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	public function pickDropSopir($key)
	{
		$data = $this->db->get_where('master_driver',array('kode_driver'=>$key,'data_sts'=>'1'))->row();
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
				'nota_toko'=>$this->input->post('nota_toko'),
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

	//Transaksi Biaya Kendaraan
	public function addBiayaKdr()
	{
		$ins = array(
			'no_biaya'=>$this->input->post('no_kuitansi'),
			'keterangan'=>$this->input->post('keterangan'),
			'jumlah'=>$this->input->post('jumlah')
		);
		$this->db->insert('trx_biaya_kendaraan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Biaya</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Biaya</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function subTotalBiayaKdr($key)
	{
		$data = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_biaya_kendaraan b','b.no_biaya = a.no_biaya')->get_where('trx_biaya_kendaraan_det a',array('a.no_biaya'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvBiayaKdr($key)
	{
		$this->db->delete('trx_biaya_kendaraan_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Biaya</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Biaya</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function tempBiayaKdr()
	{
		$getSts = $this->db->get_where('trx_biaya_kendaraan',array('no_biaya'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'kode_kendaraan'=>$this->input->post('nopol'),
				'sopir_kendaraan'=>$this->input->post('sopir_kendaraan'),
				'kernet_kendaraan'=>$this->input->post('kernet_kendaraan'),
				'tgl_biaya'=>$this->input->post('tgl_biaya'),
				'grand_total'=>$this->input->post('g_total'),
				'data_sts'=>'0'
			);
			$this->db->update('trx_biaya_kendaraan',$upd,array('no_biaya'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Sementara Biaya Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Sementara Biaya Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveBiayaKdr()
	{
		$getSts = $this->db->get_where('trx_biaya_kendaraan',array('no_biaya'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'kode_kendaraan'=>$this->input->post('nopol'),
				'sopir_kendaraan'=>$this->input->post('sopir_kendaraan'),
				'kernet_kendaraan'=>$this->input->post('kernet_kendaraan'),
				'tgl_biaya'=>$this->input->post('tgl_biaya'),
				'grand_total'=>$this->input->post('g_total'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_biaya_kendaraan',$upd,array('no_biaya'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Biaya Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Biaya Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBiayaKdr()
	{
		$getSts = $this->db->get_where('trx_biaya_kendaraan',array('no_biaya'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_biaya_kendaraan',$can,array('no_biaya'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Biaya Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Biaya Kendaraan</h4>
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

	//Transaksi Pembelian Ban
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
				'nota_toko'=>$this->input->post('nota_toko'),
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

	//Transaksi Pemasangan Ban
	public function addPasangBan()
	{
		$getBan = $this->db->get_where('master_ban',array('kode_ban'=>$this->input->post('kode_ban_pasang')))->row();
		$stsBan = $this->input->post('status_pasang');
		switch($stsBan)
		{
			case '0':
			$getStok = $getBan->stok_baru;
			break;
			case '1':
			$getStok = $getBan->stok_bekas;
			break;
			case '2':
			$getStok = $getBan->stok_vulkanisir;
			break;
			default:
			break;
		}
		if($getStok < $this->input->post('qty_pasang'))
		{
			$data['status'] = FALSE;
		}
		else
		{
			$ins = array(
				'no_pemasangan'=>$this->input->post('no_pemasangan'),
				'kode_ban'=>$this->input->post('kode_ban_pasang'),
				'qty_pasang'=>$this->input->post('qty_pasang'),
				'status_pasang'=>$this->input->post('status_pasang')
			);
			$this->db->insert('trx_pasang_ban_det',$ins);
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Memasang Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Memasang Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvPasangBan($key)
	{
		$this->db->delete('trx_pasang_ban_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pasang Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pasang Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function savePasangBan()
	{
		$getSts = $this->db->get_where('trx_pasang_ban',array('no_pemasangan'=>$this->input->post('no_pemasangan')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_kendaraan'=>$this->input->post('kode_kendaraan'),
				'bengkel_pemasangan'=>$this->input->post('bengkel_pemasangan'),
				'tgl_pemasangan'=>$this->input->post('tgl_pemasangan'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_pasang_ban',$upd,array('no_pemasangan'=>$this->input->post('no_pemasangan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_pasang_ban_det',array('no_pemasangan'=>$this->input->post('no_pemasangan')))->result();
				foreach ($detAll as $det)
				{
					$stsBan = $det->status_pasang;
					switch ($stsBan)
					{
						case '0':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upStok = ($getStok->stok_baru*1)-($det->qty_pasang*1);
							$upPsg = ($getStok->stok_pasang*1)+($det->qty_pasang*1);
							$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
							break;
						case '1':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_bekas;
							$upStok = ($getStok->stok_bekas*1)-($det->qty_pasang*1);
							$upPsg = ($getStok->stok_pasang*1)+($det->qty_pasang*1);
							$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
							break;
						case '2':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_vulkanisir;
							$upStok = ($getStok->stok_vulkanisir*1)-($det->qty_pasang*1);
							$upPsg = ($getStok->stok_pasang*1)+($det->qty_pasang*1);
							$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
							break;
						default:
							break;
					}
					$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pemasangan Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pemasangan Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelPasangBan()
	{
		$getSts = $this->db->get_where('trx_pasang_ban',array('no_pemasangan'=>$this->input->post('no_pemasangan')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_pasang_ban_det',array('no_pemasangan'=>$this->input->post('no_pemasangan')))->result();
			foreach ($detAll as $det)
			{
				$stsBan = $det->status_pasang;
				switch ($stsBan)
				{
					case '0':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
						$upStok = ($getStok->stok_baru*1)+($det->qty_pasang*1);
						$upPsg = ($getStok->stok_pasang*1)-($det->qty_pasang*1);
						$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
						break;
					case '1':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_bekas;
						$upStok = ($getStok->stok_bekas*1)+($det->qty_pasang*1);
						$upPsg = ($getStok->stok_pasang*1)-($det->qty_pasang*1);
						$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
						break;
					case '2':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_vulkanisir;
						$upStok = ($getStok->stok_vulkanisir*1)+($det->qty_pasang*1);
						$upPsg = ($getStok->stok_pasang*1)-($det->qty_pasang*1);
						$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
						break;
					default:
						break;
				}
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_pasang_ban',$can,array('no_pemasangan'=>$this->input->post('no_pemasangan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pemasangan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pemasangan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Pelepasan Ban
	public function addLepasBan()
	{
		$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$this->input->post('kode_ban_lepas')))->row()->stok_pasang;
		if($getStok < $this->input->post('qty_lepas'))
		{
			$data['status'] = FALSE;
		}
		else
		{
			$ins = array(
				'no_pelepasan'=>$this->input->post('no_pelepasan'),
				'kode_ban'=>$this->input->post('kode_ban_lepas'),
				'qty_lepas'=>$this->input->post('qty_lepas'),
				'status_lepas'=>$this->input->post('status_lepas')
			);
			$this->db->insert('trx_lepas_ban_det',$ins);
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Melepas Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Melepas Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvLepasBan($key)
	{
		$this->db->delete('trx_lepas_ban_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Lepas Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Lepas Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveLepasBan()
	{
		$getSts = $this->db->get_where('trx_lepas_ban',array('no_pelepasan'=>$this->input->post('no_pelepasan')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_kendaraan'=>$this->input->post('kode_kendaraan'),
				'bengkel_pelepasan'=>$this->input->post('bengkel_pelepasan'),
				'tgl_pelepasan'=>$this->input->post('tgl_pelepasan'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_lepas_ban',$upd,array('no_pelepasan'=>$this->input->post('no_pelepasan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_lepas_ban_det',array('no_pelepasan'=>$this->input->post('no_pelepasan')))->result();
				foreach ($detAll as $det)
				{
					$stsBan = $det->status_lepas;
					switch ($stsBan)
					{
						case '0':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upLps = ($getStok->stok_pasang*1)-($det->qty_lepas*1);
							$upStok = ($getStok->stok_bekas*1)+($det->qty_lepas*1);
							$upd = array('stok_bekas'=>$upStok,'stok_pasang'=>$upLps);
							break;
						case '1':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upLps = ($getStok->stok_pasang*1)-($det->qty_lepas*1);
							$upStok = ($getStok->stok_vulkanisir*1)+($det->qty_lepas*1);
							$upd = array('stok_vulkanisir'=>$upStok,'stok_pasang'=>$upLps);
							break;
						case '2':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upLps = ($getStok->stok_pasang*1)-($det->qty_lepas*1);
							$upStok = ($getStok->stok_afkir*1)+($det->qty_lepas*1);
							$upd = array('stok_afkir'=>$upStok,'stok_pasang'=>$upLps);
							break;
						default:
							break;
					}
					$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pelepasan Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pelepasan Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelLepasBan()
	{
		$getSts = $this->db->get_where('trx_lepas_ban',array('no_pelepasan'=>$this->input->post('no_pelepasan')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_lepas_ban_det',array('no_pelepasan'=>$this->input->post('no_pelepasan')))->result();
			foreach ($detAll as $det)
			{
				$stsBan = $det->status_lepas;
				switch ($stsBan)
				{
					case '0':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
						$upLps = ($getStok->stok_pasang*1)+($det->qty_lepas*1);
						$upStok = ($getStok->stok_bekas*1)-($det->qty_lepas*1);
						$upd = array('stok_bekas'=>$upStok,'stok_pasang'=>$upLps);
						break;
					case '1':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
						$upLps = ($getStok->stok_pasang*1)+($det->qty_lepas*1);
						$upStok = ($getStok->stok_vulkanisir*1)-($det->qty_lepas*1);
						$upd = array('stok_vulkanisir'=>$upStok,'stok_pasang'=>$upLps);
						break;
					case '2':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
						$upLps = ($getStok->stok_pasang*1)+($det->qty_lepas*1);
						$upStok = ($getStok->stok_afkir*1)-($det->qty_lepas*1);
						$upd = array('stok_afkir'=>$upStok,'stok_pasang'=>$upLps);
						break;
					default:
						break;
				}
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_lepas_ban',$can,array('no_pelepasan'=>$this->input->post('no_pelepasan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pelepasan Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pelepasan Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Retur Pembelian Barang/Spare Part
	public function addReturBeliBarang()
	{
		$ins = array(
			'no_retur'=>$this->input->post('no_retur'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'qty_retur'=>$this->input->post('qty_retur'),
			'jumlah'=>$this->input->post('qty_retur')
		);
		$this->db->insert('trx_retur_beli_barang_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Retur Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Retur Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvReturBeliBarang($key)
	{
		$this->db->delete('trx_retur_beli_barang_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Retur Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Retur Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveReturBeliBarang()
	{
		$getSts = $this->db->get_where('trx_retur_beli_barang',array('no_retur'=>$this->input->post('no_retur')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'no_nota'=>$this->input->post('no_nota'),
				'tgl_retur'=>$this->input->post('tgl_retur'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_retur_beli_barang',$upd,array('no_retur'=>$this->input->post('no_retur')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_retur_beli_barang_det',array('no_retur'=>$this->input->post('no_retur')))->result();
				foreach ($detAll as $det)
				{
					$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
					$upStok = ($getStok*1)-($det->qty_retur*1);
					$upd = array('stok_barang'=>$upStok);
					$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Retur Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Retur Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelReturBeliBarang()
	{
		$getSts = $this->db->get_where('trx_retur_beli_barang',array('no_retur'=>$this->input->post('no_retur')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_retur_beli_barang_det',array('no_retur'=>$this->input->post('no_retur')))->result();
			foreach ($detAll as $det)
			{
				$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
				$upStok = ($getStok*1)+($det->qty_retur*1);
				$upd = array('stok_barang'=>$upStok);
				$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_retur_beli_barang',$can,array('no_retur'=>$this->input->post('no_retur')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Retur Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Retur Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Retur Pemakaian Barang/Spare Part
	public function addReturPakaiBarang()
	{
		$ins = array(
			'no_retur'=>$this->input->post('no_retur'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'qty_retur'=>$this->input->post('qty_retur'),
			'jumlah'=>$this->input->post('qty_retur')
		);
		$this->db->insert('trx_retur_pakai_barang_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Retur Pemakaian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Retur Pemakaian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvReturPakaiBarang($key)
	{
		$this->db->delete('trx_retur_pakai_barang_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Retur Pemakaian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Retur Pemakaian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveReturPakaiBarang()
	{
		$getSts = $this->db->get_where('trx_retur_pakai_barang',array('no_retur'=>$this->input->post('no_retur')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'no_pakai_brg'=>$this->input->post('no_pemakaian'),
				'tgl_retur'=>$this->input->post('tgl_retur'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_retur_pakai_barang',$upd,array('no_retur'=>$this->input->post('no_retur')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_retur_pakai_barang_det',array('no_retur'=>$this->input->post('no_retur')))->result();
				foreach ($detAll as $det)
				{
					$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
					$upStok = ($getStok*1)+($det->qty_retur*1);
					$upd = array('stok_barang'=>$upStok);
					$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Retur Pemakaian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Retur Pemakaian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelReturPakaiBarang()
	{
		$getSts = $this->db->get_where('trx_retur_pakai_barang',array('no_retur'=>$this->input->post('no_retur')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_retur_pakai_barang_det',array('no_retur'=>$this->input->post('no_retur')))->result();
			foreach ($detAll as $det)
			{
				$getStok = $this->db->get_where('master_barang',array('kode_barang'=>$det->kode_barang))->row()->stok_barang;
				$upStok = ($getStok*1)-($det->qty_retur*1);
				$upd = array('stok_barang'=>$upStok);
				$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_retur_pakai_barang',$can,array('no_retur'=>$this->input->post('no_retur')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Retur Pembelian Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Retur Pembelian Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Input Bon Karyawan
	public function saveBonKaryawan()
	{
		$getSts = $this->db->get_where('trx_input_bon_karyawan',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'tgl_bon'=>$this->input->post('tgl_bon'),
				'nom_bon'=>$this->input->post('nom_bon'),
				'ket_bon'=>$this->input->post('ket_bon'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_input_bon_karyawan',$upd,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_karyawan',array('kode_karyawan'=>$this->input->post('kode_karyawan')))->row()->jml_bon;
				$tot = ($getBon*1)+($this->input->post('nom_bon')*1);
				$upBon = array('jml_bon'=>$tot);
				$this->db->update('master_karyawan',$upBon,array('kode_karyawan'=>$this->input->post('kode_karyawan')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Bon Karyawan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Bon Karyawan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBonKaryawan()
	{
		$getSts = $this->db->get_where('trx_input_bon_karyawan',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_input_bon_karyawan',$can,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_karyawan',array('kode_karyawan'=>$this->input->post('kode_karyawan')))->row()->jml_bon;
				$tot = ($getBon*1)-($this->input->post('nom_bon')*1);
				$upBon = array('jml_bon'=>$tot);
				$this->db->update('master_karyawan',$upBon,array('kode_karyawan'=>$this->input->post('kode_karyawan')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Bon Karyawan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Bon Karyawan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Input Bon Karyawan
	public function saveKas()
	{
		$getSts = $this->db->get_where('trx_input_kas',array('no_kas'=>$this->input->post('no_kas')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'tgl_kas'=>$this->input->post('tgl_kas'),
				'debet'=>$this->input->post('debet'),
				'kredit'=>$this->input->post('kredit'),
				'ket_kas'=>$this->input->post('ket_kas'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_input_kas',$upd,array('no_kas'=>$this->input->post('no_kas')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Kas</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Kas</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKas()
	{
		$getSts = $this->db->get_where('trx_input_kas',array('no_kas'=>$this->input->post('no_kas')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_input_kas',$can,array('no_kas'=>$this->input->post('no_kas')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Kas</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Kas</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Input Bon Sopir
	public function saveBonSopir()
	{
		$getSts = $this->db->get_where('trx_input_bon_sopir',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_driver'=>$this->input->post('kode_sopir'),
				'tgl_bon'=>$this->input->post('tgl_bon'),
				'nom_bon'=>$this->input->post('nom_bon'),
				'ket_bon'=>$this->input->post('ket_bon'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_input_bon_sopir',$upd,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_bon;
				$tot = ($getBon*1)+($this->input->post('nom_bon')*1);
				$upBon = array('jml_bon'=>$tot);
				$this->db->update('master_driver',$upBon,array('kode_driver'=>$this->input->post('kode_sopir')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Bon Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Bon Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBonSopir()
	{
		$getSts = $this->db->get_where('trx_input_bon_sopir',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_input_bon_sopir',$can,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_bon;
				$tot = ($getBon*1)-($this->input->post('nom_bon')*1);
				$upBon = array('jml_bon'=>$tot);
				$this->db->update('master_driver',$upBon,array('kode_driver'=>$this->input->post('kode_sopir')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Bon Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Bon Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Input Klaim Sopir
	public function saveKlaimSopir()
	{
		$getSts = $this->db->get_where('trx_input_klaim_sopir',array('no_klaim'=>$this->input->post('no_klaim')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_driver'=>$this->input->post('kode_sopir'),
				'tgl_klaim'=>$this->input->post('tgl_klaim'),
				'nom_klaim'=>$this->input->post('nom_klaim'),
				'ket_klaim'=>$this->input->post('ket_klaim'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_input_klaim_sopir',$upd,array('no_klaim'=>$this->input->post('no_klaim')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getKlaim = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_klaim;
				$tot = ($getKlaim*1)+($this->input->post('nom_klaim')*1);
				$upKlaim = array('jml_klaim'=>$tot);
				$this->db->update('master_driver',$upKlaim,array('kode_driver'=>$this->input->post('kode_sopir')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Klaim Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Klaim Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKlaimSopir()
	{
		$getSts = $this->db->get_where('trx_input_klaim_sopir',array('no_klaim'=>$this->input->post('no_klaim')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_input_klaim_sopir',$can,array('no_klaim'=>$this->input->post('no_klaim')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getKlaim = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_klaim;
				$tot = ($getKlaim*1)-($this->input->post('nom_klaim')*1);
				$upKlaim = array('jml_klaim'=>$tot);
				$this->db->update('master_driver',$upKlaim,array('kode_driver'=>$this->input->post('kode_sopir')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Klaim Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Klaim Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Bayar Upah Karyawan
	public function saveBayarUpahKaryawan()
	{
		$getSts = $this->db->get_where('trx_bayar_upah_karyawan',array('no_kuitansi'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'tgl_upah'=>$this->input->post('tgl_upah'),
				'hari_kerja'=>$this->input->post('hari_kerja'),
				'sub_harian'=>$this->input->post('sub_harian'),
				'bonus_harian'=>$this->input->post('bonus_harian'),
				'sub_bonusharian'=>$this->input->post('sub_bonusharian'),
				'uang_makan'=>$this->input->post('uang_makan'),
				'sub_makan'=>$this->input->post('sub_makan'),
				'uang_lembur'=>$this->input->post('uang_lembur'),
				'sub_lembur'=>$this->input->post('sub_lembur'),
				'uang_minggu'=>$this->input->post('uang_minggu'),
				'sub_minggu'=>$this->input->post('sub_minggu'),
				'uang_haribesar'=>$this->input->post('uang_haribesar'),
				'sub_haribesar'=>$this->input->post('sub_haribesar'),
				'uang_bulanan'=>$this->input->post('uang_bulanan'),
				'sub_bulanan'=>$this->input->post('sub_bulanan'),
				'bonus_bulanan'=>$this->input->post('bonus_bulanan'),
				'sub_bonusbulanan'=>$this->input->post('sub_bonusbulanan'),
				'uang_lain'=>$this->input->post('uang_lain'),
				'sub_lain'=>$this->input->post('sub_lain'),
				'sub_total'=>$this->input->post('sub_total'),
				'sub_bon'=>$this->input->post('sub_bon'),
				'grand_total'=>$this->input->post('g_total'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_bayar_upah_karyawan',$upd,array('no_kuitansi'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_karyawan',array('kode_karyawan'=>$this->input->post('kode_karyawan')))->row()->jml_bon;
				$totBon = ($getBon*1)-($this->input->post('sub_bon')*1);
				$upKry = array('jml_bon'=>$totBon);
				$this->db->update('master_karyawan',$upKry,array('kode_karyawan'=>$this->input->post('kode_karyawan')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pembayaran Karyawan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pembayaran Karyawan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBayarUpahKaryawan()
	{
		$getSts = $this->db->get_where('trx_bayar_upah_karyawan',array('no_kuitansi'=>$this->input->post('no_kuitansi')))->row();
		$getJmlBon = $getSts->sub_bon;
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_bayar_upah_karyawan',$can,array('no_kuitansi'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getBon = $this->db->get_where('master_karyawan',array('kode_karyawan'=>$this->input->post('kode_karyawan')))->row()->jml_bon;
				$totBon = ($getBon*1)+($getJmlBon*1);
				$upKry = array('jml_bon'=>$totBon);
				$this->db->update('master_karyawan',$upKry,array('kode_karyawan'=>$this->input->post('kode_karyawan')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pembayaran Karyawan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pembayaran Karyawan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Bayar Bon Klaim Sopir
	public function saveBayarSopir()
	{
		$getSts = $this->db->get_where('trx_bayar_upah_karyawan',array('no_kuitansi'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_karyawan'=>$this->input->post('kode_karyawan'),
				'tgl_upah'=>$this->input->post('tgl_upah'),
				'nom_bon'=>$this->input->post('nom_bon'),
				'nom_klaim'=>$this->input->post('nom_klaim'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_bayar_upah_karyawan',$upd,array('no_kuitansi'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pembayaran Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pembayaran Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelBayarSopir()
	{
		$getSts = $this->db->get_where('trx_bayar_bonklaim_sopir',array('no_bayar'=>$this->input->post('no_bayar')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_bayar_bonklaim_sopir',$can,array('no_bayar'=>$this->input->post('no_bayar')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$getKlaim = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_klaim;
				$getBon = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_bon;
				$totKlaim = ($getKlaim*1)+($this->input->post('nom_klaim')*1);
				$totBon = ($getBon*1)+($this->input->post('nom_bon')*1);
				$upDrv = array('jml_klaim'=>$totKlaim,'jml_bon'=>$totBon);
				$this->db->update('master_driver',$upDrv,array('kode_driver'=>$this->input->post('kode_sopir')));
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pembayaran Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pembayaran Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Kas Bon Sopir
	public function saveKasBonSopir()
	{
		$getSts = $this->db->get_where('trx_kas_bon_sopir',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_kendaraan'=>$this->input->post('kode_kendaraan'),
				'tgl_bon'=>$this->input->post('tgl_bon'),
				'kode_sopir'=>$this->input->post('kode_sopir'),
				'kode_kernet'=>$this->input->post('kode_kernet'),
				'kode_sopir'=>$this->input->post('kode_sopir'),
				'tab_sopir'=>$this->input->post('tab_sopir'),
				'berat_jenis'=>$this->input->post('berat_jenis'),
				'ket_kasbon'=>$this->input->post('ket_kasbon'),
				'uang_saku_kota'=>$this->input->post('uang_saku_kota'),
				'uang_saku_a'=>$this->input->post('uang_saku_a'),
				'uang_saku_b'=>$this->input->post('uang_saku_b'),
				'uang_saku_c'=>$this->input->post('uang_saku_c'),
				'uang_saku_d'=>$this->input->post('uang_saku_d'),
				'tgl_bon_a'=>$this->input->post('tgl_bon_a'),
				'tgl_bon_b'=>$this->input->post('tgl_bon_b'),
				'tgl_bon_c'=>$this->input->post('tgl_bon_c'),
				'tgl_bon_d'=>$this->input->post('tgl_bon_d'),
				'sub_uang_saku'=>$this->input->post('sub_uang_saku'),
				'uang_solar'=>$this->input->post('uang_solar'),
				'tgl_solar'=>$this->input->post('tgl_solar'),
				'nama_pom'=>$this->input->post('nama_pom'),
				'sub_bonall'=>$this->input->post('sub_bonall'),
				'tgl_muat'=>$this->input->post('tgl_muat'),
				'tgl_muat_b'=>$this->input->post('tgl_muat_b'),
				'tgl_bongkar'=>$this->input->post('tgl_bongkar'),
				'tgl_bongkar_b'=>$this->input->post('tgl_bongkar_b'),
				'uang_makan'=>$this->input->post('uang_makan'),
				'uang_makan_b'=>$this->input->post('uang_makan_b'),
				'kode_customer_a'=>$this->input->post('kode_customer_a'),
				'kode_customer_b'=>$this->input->post('kode_customer_b'),
				'kode_customer_c'=>$this->input->post('kode_customer_c'),
				'kode_customer_d'=>$this->input->post('kode_customer_d'),
				'kode_customer_e'=>$this->input->post('kode_customer_e'),
				'kode_customer_f'=>$this->input->post('kode_customer_f'),
				'kode_customer_g'=>$this->input->post('kode_customer_g'),
				'kode_customer_h'=>$this->input->post('kode_customer_h'),
				'jenis_muatan_a'=>$this->input->post('jenis_muatan_a'),
				'jenis_muatan_b'=>$this->input->post('jenis_muatan_b'),
				'jenis_muatan_c'=>$this->input->post('jenis_muatan_c'),
				'jenis_muatan_d'=>$this->input->post('jenis_muatan_d'),
				'berat_muatan_a'=>$this->input->post('berat_muatan_a'),
				'berat_muatan_b'=>$this->input->post('berat_muatan_b'),
				'berat_muatan_c'=>$this->input->post('berat_muatan_c'),
				'berat_muatan_d'=>$this->input->post('berat_muatan_d'),
				'surat_jalan_a'=>$this->input->post('surat_jalan_a'),
				'surat_jalan_b'=>$this->input->post('surat_jalan_b'),
				'surat_jalan_c'=>$this->input->post('surat_jalan_c'),
				'surat_jalan_d'=>$this->input->post('surat_jalan_d'),
				'sub_beratmuat'=>$this->input->post('sub_beratmuat'),
				'sub_beratmuat_b'=>$this->input->post('sub_beratmuat_b'),
				'solar_berangkat'=>$this->input->post('solar_berangkat'),
				'solar_kembali'=>$this->input->post('solar_kembali'),
				'bantuan_a'=>$this->input->post('bantuan_a'),
				'bantuan_b'=>$this->input->post('bantuan_b'),
				'bantuan_c'=>$this->input->post('bantuan_c'),
				'bantuan_d'=>$this->input->post('bantuan_d'),
				'tambah_a'=>$this->input->post('tambah_a'),
				'tambah_b'=>$this->input->post('tambah_b'),
				'tambah_c'=>$this->input->post('tambah_c'),
				'tambah_d'=>$this->input->post('tambah_d'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_kas_bon_sopir',$upd,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Kas Bon Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Kas Bon Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKasBonSopir()
	{
		$getSts = $this->db->get_where('trx_kas_bon_sopir',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_kas_bon_sopir',$can,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Kas Bon Sopir</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Kas Bon Sopir</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	//Transaksi Kas Bon Kantor
	public function saveKasBonKantor()
	{
		$getSts = $this->db->get_where('trx_kas_bon_kantor',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_kendaraan'=>$this->input->post('kode_kendaraan'),
				'tgl_bon'=>$this->input->post('tgl_bon'),
				'tgl_berangkat'=>$this->input->post('tgl_berangkat'),
				'tgl_kembali'=>$this->input->post('tgl_kembali'),
				'kode_sopir'=>$this->input->post('kode_sopir'),
				'kode_kernet'=>$this->input->post('kode_kernet'),
				'kode_sopir'=>$this->input->post('kode_sopir'),
				'tab_sopir'=>$this->input->post('tab_sopir'),
				'berat_jenis'=>$this->input->post('berat_jenis'),
				'ket_kasbon'=>$this->input->post('ket_kasbon'),
				'uang_saku_kota'=>$this->input->post('uang_saku_kota'),
				'uang_saku_a'=>$this->input->post('uang_saku_a'),
				'uang_saku_b'=>$this->input->post('uang_saku_b'),
				'uang_saku_c'=>$this->input->post('uang_saku_c'),
				'uang_saku_d'=>$this->input->post('uang_saku_d'),
				'tgl_bon_a'=>$this->input->post('tgl_bon_a'),
				'tgl_bon_b'=>$this->input->post('tgl_bon_b'),
				'tgl_bon_c'=>$this->input->post('tgl_bon_c'),
				'tgl_bon_d'=>$this->input->post('tgl_bon_d'),
				'sub_uang_saku'=>$this->input->post('sub_uang_saku'),
				'uang_solar'=>$this->input->post('uang_solar'),
				'tgl_solar'=>$this->input->post('tgl_solar'),
				'nama_pom'=>$this->input->post('nama_pom'),
				'sub_bonall'=>$this->input->post('sub_bonall'),
				'tgl_muat'=>$this->input->post('tgl_muat'),
				'tgl_muat_b'=>$this->input->post('tgl_muat_b'),
				'tgl_bongkar'=>$this->input->post('tgl_bongkar'),
				'tgl_bongkar_b'=>$this->input->post('tgl_bongkar_b'),
				'uang_makan'=>$this->input->post('uang_makan'),
				'uang_makan_b'=>$this->input->post('uang_makan_b'),
				'kode_customer_a'=>($this->input->post('kode_customer_a')!='')?$this->input->post('kode_customer_a'):NULL,
				'kode_customer_b'=>($this->input->post('kode_customer_b')!='')?$this->input->post('kode_customer_b'):NULL,
				'kode_customer_c'=>($this->input->post('kode_customer_c')!='')?$this->input->post('kode_customer_c'):NULL,
				'kode_customer_d'=>($this->input->post('kode_customer_d')!='')?$this->input->post('kode_customer_d'):NULL,
				'kode_customer_e'=>($this->input->post('kode_customer_e')!='')?$this->input->post('kode_customer_e'):NULL,
				'kode_customer_f'=>($this->input->post('kode_customer_f')!='')?$this->input->post('kode_customer_f'):NULL,
				'kode_customer_g'=>($this->input->post('kode_customer_g')!='')?$this->input->post('kode_customer_g'):NULL,
				'kode_customer_h'=>($this->input->post('kode_customer_h')!='')?$this->input->post('kode_customer_h'):NULL,
				'jenis_muatan_a'=>$this->input->post('jenis_muatan_a'),
				'jenis_muatan_b'=>$this->input->post('jenis_muatan_b'),
				'jenis_muatan_c'=>$this->input->post('jenis_muatan_c'),
				'jenis_muatan_d'=>$this->input->post('jenis_muatan_d'),
				'berat_muatan_a'=>$this->input->post('berat_muatan_a'),
				'berat_muatan_b'=>$this->input->post('berat_muatan_b'),
				'berat_muatan_c'=>$this->input->post('berat_muatan_c'),
				'berat_muatan_d'=>$this->input->post('berat_muatan_d'),
				'surat_jalan_a'=>$this->input->post('surat_jalan_a'),
				'surat_jalan_b'=>$this->input->post('surat_jalan_b'),
				'surat_jalan_c'=>$this->input->post('surat_jalan_c'),
				'surat_jalan_d'=>$this->input->post('surat_jalan_d'),
				'sub_beratmuat'=>$this->input->post('sub_beratmuat'),
				'sub_beratmuat_b'=>$this->input->post('sub_beratmuat_b'),
				'solar_berangkat'=>$this->input->post('solar_berangkat'),
				'solar_kembali'=>$this->input->post('solar_kembali'),
				'bantuan_a'=>$this->input->post('bantuan_a'),
				'bantuan_b'=>$this->input->post('bantuan_b'),
				'bantuan_c'=>$this->input->post('bantuan_c'),
				'bantuan_d'=>$this->input->post('bantuan_d'),
				'tambah_a'=>$this->input->post('tambah_a'),
				'tambah_b'=>$this->input->post('tambah_b'),
				'tambah_c'=>$this->input->post('tambah_c'),
				'tambah_d'=>$this->input->post('tambah_d'),
				'ongkos_angkut'=>$this->input->post('ongkos_angkut'),
				'ongkos_angkut_2'=>$this->input->post('ongkos_angkut_2'),
				'ongkos_angkut_3'=>$this->input->post('ongkos_angkut_3'),
				'ongkos_angkut_4'=>$this->input->post('ongkos_angkut_4'),
				'ongkos_bruto'=>$this->input->post('ongkos_bruto'),
				'ongkos_bruto_2'=>$this->input->post('ongkos_bruto_2'),
				'ongkos_bruto_3'=>$this->input->post('ongkos_bruto_3'),
				'ongkos_bruto_4'=>$this->input->post('ongkos_bruto_4'),
				'borong_sopir'=>$this->input->post('borong_sopir'),
				'borong_sopir_2'=>$this->input->post('borong_sopir_2'),
				'borong_sopir_3'=>$this->input->post('borong_sopir_3'),
				'borong_sopir_4'=>$this->input->post('borong_sopir_4'),
				'tambah_borong_a'=>$this->input->post('tambah_borong_a'),
				'tambah_borong_b'=>$this->input->post('tambah_borong_b'),
				'tambah_borong_c'=>$this->input->post('tambah_borong_c'),
				'tambah_borong_d'=>$this->input->post('tambah_borong_d'),
				'sub_bruto'=>$this->input->post('sub_bruto'),
				'sub_bruto_b'=>$this->input->post('sub_bruto_b'),
				'uang_sopir_a'=>$this->input->post('uang_sopir_a'),
				'uang_sopir_b'=>$this->input->post('uang_sopir_b'),
				'uang_sopir_c'=>$this->input->post('uang_sopir_c'),
				'uang_sopir_d'=>$this->input->post('uang_sopir_d'),
				'koreksi_sopir_a'=>$this->input->post('koreksi_sopir_a'),
				'koreksi_sopir_b'=>$this->input->post('koreksi_sopir_b'),
				'koreksi_sopir_c'=>$this->input->post('koreksi_sopir_c'),
				'koreksi_sopir_d'=>$this->input->post('koreksi_sopir_d'),
				'sub_uangsopir'=>$this->input->post('sub_uangsopir'),
				'sub_koreksi'=>$this->input->post('sub_koreksi'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_kas_bon_kantor',$upd,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Kas Bon Kantor</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Kas Bon Kantor</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKasBonKantor()
	{
		$getSts = $this->db->get_where('trx_kas_bon_kantor',array('no_bon'=>$this->input->post('no_bon')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_kas_bon_kantor',$can,array('no_bon'=>$this->input->post('no_bon')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Kas Bon Kantor</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Kas Bon Kantor</h4>
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

	public function getBiayaKdr($key)
	{
		$data = $this->db->get_where('trx_biaya_kendaraan',array('no_biaya'=>$key))->row();
		echo json_encode($data);
	}

	public function getReturBeliBrg($key)
	{
		$data = $this->db->get_where('trx_retur_beli_barang',array('no_retur'=>$key))->row();
		echo json_encode($data);
	}

	public function getReturPakaiBrg($key)
	{
		$data = $this->db->get_where('trx_retur_pakai_barang',array('no_retur'=>$key))->row();
		echo json_encode($data);
	}

	public function getBonKaryawan($key)
	{
		$data = $this->db->get_where('trx_input_bon_karyawan',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getKas($key)
	{
		$data = $this->db->get_where('trx_input_kas',array('no_kas'=>$key))->row();
		echo json_encode($data);
	}

	public function getBonSopir($key)
	{
		$data = $this->db->get_where('trx_input_bon_sopir',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getKlaimSopir($key)
	{
		$data = $this->db->get_where('trx_input_klaim_sopir',array('no_klaim'=>$key))->row();
		echo json_encode($data);
	}

	public function getBayarSopir($key)
	{
		$data = $this->db->get_where('trx_bayar_bonklaim_sopir',array('no_bayar'=>$key))->row();
		echo json_encode($data);
	}

	public function getUpahKaryawan($key)
	{
		$data = $this->db->get_where('trx_bayar_upah_karyawan',array('no_kuitansi'=>$key))->row();
		echo json_encode($data);
	}

	public function getKasBonSopir($key)
	{
		$data = $this->db->get_where('trx_kas_bon_sopir',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getKasBonKantor($key)
	{
		$data = $this->db->get_where('trx_kas_bon_kantor',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}
}
