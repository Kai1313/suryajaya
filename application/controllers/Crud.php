<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	//Administrator
	public function adminSettings()
	{
		$ins = array(
			'bkl_ban_dalam'=>$this->input->post('bkl_ban_dalam'),
			'bkl_ban_luar'=>$this->input->post('bkl_ban_luar'),
			'bkl_marset'=>$this->input->post('bkl_marset'),
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'kota'=>$this->input->post('kota'),
			'provinsi'=>$this->input->post('provinsi'),
			'kodepos'=>$this->input->post('kodepos'),
			'satuan_kasbon'=>$this->input->post('satuan_kasbon'),
		);
		$this->db->update('profile_settings',$ins,array('id'=>'1'));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function addUser()
	{
		$ins = array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'level'=>$this->input->post('level'),
			'data_sts'=>'1'
		);
		$this->db->insert('users',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updUser()
	{
		$upd = array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'level'=>$this->input->post('level'),
			'data_sts'=>'1'
		);
		$this->db->update('users',$upd,array('id'=>$this->input->post('id')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function delUser($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('users',$upd,array('id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getMenu()
	{
		$data['mst'] = $this->db->get_where('trx_list',array('data_sts'=>'1','status'=>'0'))->result();
		$data['trx'] = $this->db->get_where('trx_list',array('data_sts'=>'1','status'=>'1'))->result();
		echo json_encode($data);
	}

	public function upAkses()
	{
		$user = '1';
		$master = $this->input->post('mst');
		$trxs = $this->input->post('trx');
		$data['mst'] = count($master);
		$data['trx'] = count($trxs);
		$del_acc = $this->db->delete('hak_akses',array('user_id'=>$user));
		if(sizeof($trxs)>0)
		{
			foreach($trxs as $trx)
			{
				switch ($trx)
				{
					case '11':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t11'))?$this->input->post('t11'):null,
							'update'=>($this->input->post('t12'))?$this->input->post('t12'):null,
							'hapus'=>($this->input->post('t13'))?$this->input->post('t13'):null
						);
						break;
					case '12':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t21'))?$this->input->post('t21'):null,
							'update'=>($this->input->post('t22'))?$this->input->post('t22'):null,
							'hapus'=>($this->input->post('t23'))?$this->input->post('t23'):null
						);
						break;
					case '13':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t31'))?$this->input->post('t31'):null,
							'update'=>($this->input->post('t32'))?$this->input->post('t32'):null,
							'hapus'=>($this->input->post('t33'))?$this->input->post('t33'):null
						);
						break;
					case '14':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t41'))?$this->input->post('t41'):null,
							'update'=>($this->input->post('t42'))?$this->input->post('t42'):null,
							'hapus'=>($this->input->post('t43'))?$this->input->post('t43'):null
						);
						break;
					case '15':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t51'))?$this->input->post('t51'):null,
							'update'=>($this->input->post('t52'))?$this->input->post('t52'):null,
							'hapus'=>($this->input->post('t53'))?$this->input->post('t53'):null
						);
						break;
					case '16':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t61'))?$this->input->post('t61'):null,
							'update'=>($this->input->post('t62'))?$this->input->post('t62'):null,
							'hapus'=>($this->input->post('t63'))?$this->input->post('t63'):null
						);
						break;
					case '17':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t71'))?$this->input->post('t71'):null,
							'update'=>($this->input->post('t72'))?$this->input->post('t72'):null,
							'hapus'=>($this->input->post('t73'))?$this->input->post('t73'):null
						);
						break;
					case '18':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t81'))?$this->input->post('t81'):null,
							'update'=>($this->input->post('t82'))?$this->input->post('t82'):null,
							'hapus'=>($this->input->post('t83'))?$this->input->post('t83'):null
						);
						break;
					case '19':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t91'))?$this->input->post('t91'):null,
							'update'=>($this->input->post('t92'))?$this->input->post('t92'):null,
							'hapus'=>($this->input->post('t93'))?$this->input->post('t93'):null
						);
						break;
					case '20':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t101'))?$this->input->post('t101'):null,
							'update'=>($this->input->post('t102'))?$this->input->post('t102'):null,
							'hapus'=>($this->input->post('t103'))?$this->input->post('t103'):null
						);
						break;
					case '21':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t111'))?$this->input->post('t111'):null,
							'update'=>($this->input->post('t112'))?$this->input->post('t112'):null,
							'hapus'=>($this->input->post('t113'))?$this->input->post('t113'):null
						);
						break;
					case '22':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t121'))?$this->input->post('t121'):null,
							'update'=>($this->input->post('t122'))?$this->input->post('t122'):null,
							'hapus'=>($this->input->post('t123'))?$this->input->post('t123'):null
						);
						break;
					case '23':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t131'))?$this->input->post('t131'):null,
							'update'=>($this->input->post('t132'))?$this->input->post('t132'):null,
							'hapus'=>($this->input->post('t133'))?$this->input->post('t133'):null
						);
						break;
					case '24':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t141'))?$this->input->post('t141'):null,
							'update'=>($this->input->post('t142'))?$this->input->post('t142'):null,
							'hapus'=>($this->input->post('t143'))?$this->input->post('t143'):null
						);
						break;
					case '25':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t151'))?$this->input->post('t151'):null,
							'update'=>($this->input->post('t152'))?$this->input->post('t152'):null,
							'hapus'=>($this->input->post('t153'))?$this->input->post('t153'):null
						);
						break;
					case '26':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t161'))?$this->input->post('t161'):null,
							'update'=>($this->input->post('t162'))?$this->input->post('t162'):null,
							'hapus'=>($this->input->post('t163'))?$this->input->post('t163'):null
						);
						break;
					case '27':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t171'))?$this->input->post('t171'):null,
							'update'=>($this->input->post('t172'))?$this->input->post('t172'):null,
							'hapus'=>($this->input->post('t173'))?$this->input->post('t173'):null
						);
						break;
					case '28':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t181'))?$this->input->post('t181'):null,
							'update'=>($this->input->post('t182'))?$this->input->post('t182'):null,
							'hapus'=>($this->input->post('t183'))?$this->input->post('t183'):null
						);
						break;
					case '29':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t191'))?$this->input->post('t191'):null,
							'update'=>($this->input->post('t192'))?$this->input->post('t192'):null,
							'hapus'=>($this->input->post('t193'))?$this->input->post('t193'):null
						);
						break;
					case '30':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$trx,
							'simpan'=>($this->input->post('t201'))?$this->input->post('t201'):null,
							'update'=>($this->input->post('t202'))?$this->input->post('t202'):null,
							'hapus'=>($this->input->post('t203'))?$this->input->post('t203'):null
						);
						break;
					default:
						# code...
						break;
				}
				$this->db->insert('hak_akses',$dtacc);
			}
		}
		if(sizeof($master)>0)
		{
			foreach($master as $mst)
			{
				switch ($mst)
				{
					case '1':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m11'))?$this->input->post('m11'):null,
							'update'=>($this->input->post('m12'))?$this->input->post('m12'):null,
							'hapus'=>($this->input->post('m13'))?$this->input->post('m13'):null
						);
						break;
					case '2':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m21'))?$this->input->post('m21'):null,
							'update'=>($this->input->post('m22'))?$this->input->post('m22'):null,
							'hapus'=>($this->input->post('m23'))?$this->input->post('m23'):null
						);
						break;
					case '3':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m31'))?$this->input->post('m31'):null,
							'update'=>($this->input->post('m32'))?$this->input->post('m32'):null,
							'hapus'=>($this->input->post('m33'))?$this->input->post('m33'):null
						);
						break;
					case '4':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m41'))?$this->input->post('m41'):null,
							'update'=>($this->input->post('m42'))?$this->input->post('m42'):null,
							'hapus'=>($this->input->post('m43'))?$this->input->post('m43'):null
						);
						break;
					case '5':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m51'))?$this->input->post('m51'):null,
							'update'=>($this->input->post('m52'))?$this->input->post('m52'):null,
							'hapus'=>($this->input->post('m53'))?$this->input->post('m53'):null
						);
						break;
					case '6':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m61'))?$this->input->post('m61'):null,
							'update'=>($this->input->post('m62'))?$this->input->post('m62'):null,
							'hapus'=>($this->input->post('m63'))?$this->input->post('m63'):null
						);
						break;
					case '7':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m71'))?$this->input->post('m71'):null,
							'update'=>($this->input->post('m72'))?$this->input->post('m72'):null,
							'hapus'=>($this->input->post('m73'))?$this->input->post('m73'):null
						);
						break;
					case '8':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m81'))?$this->input->post('m81'):null,
							'update'=>($this->input->post('m82'))?$this->input->post('m82'):null,
							'hapus'=>($this->input->post('m83'))?$this->input->post('m83'):null
						);
						break;
					case '9':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m91'))?$this->input->post('m91'):null,
							'update'=>($this->input->post('m92'))?$this->input->post('m92'):null,
							'hapus'=>($this->input->post('m93'))?$this->input->post('m93'):null
						);
						break;
					case '10':
						$dtacc = array(
							'user_id'=>$user,
							'trx_id'=>$mst,
							'simpan'=>($this->input->post('m101'))?$this->input->post('m101'):null,
							'update'=>($this->input->post('m102'))?$this->input->post('m102'):null,
							'hapus'=>($this->input->post('m103'))?$this->input->post('m103'):null
						);
						break;
					default:
						# code...
						break;
				}
				$this->db->insert('hak_akses',$dtacc);
			}
		}
		$data['status'] = TRUE;
		echo json_encode($data);
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

	public function gen_noOpnameBarang()
	{
		$res = $this->gen_num_('trx_opname_barang','no_opname','OSP');
		$check = $this->db->get_where('trx_opname_barang',array('no_opname'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_opname_barang','no_opname','OSP');
		}
		$crt = array(
			'no_opname'=>$res,
			'tgl_opname'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_opname_barang',$crt);
		$data['no_opname'] = $res;
		echo json_encode($data);
	}

	public function gen_noOpnameBan()
	{
		$res = $this->gen_num_('trx_opname_ban','no_opname','OPB');
		$check = $this->db->get_where('trx_opname_ban',array('no_opname'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_opname_ban','no_opname','OPB');
		}
		$crt = array(
			'no_opname'=>$res,
			'tgl_opname'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_opname_ban',$crt);
		$data['no_opname'] = $res;
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

	public function gen_noKuitansi()
	{
		$res = $this->gen_num_('trx_kuitansi','no_kuitansi','SJTK');
		$check = $this->db->get_where('trx_kuitansi',array('no_kuitansi'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_kuitansi','no_kuitansi','SJTK');
		}
		$crt = array(
			'no_kuitansi'=>$res,
			'tgl_kuitansi'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_kuitansi',$crt);
		$data['no_kuitansi'] = $res;
		echo json_encode($data);
	}

	public function gen_noLunas()
	{
		$res = $this->gen_num_('trx_pelunasan','no_lunas','KWP');
		$check = $this->db->get_where('trx_pelunasan',array('no_lunas'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_pelunasan','no_lunas','KWP');
		}
		$crt = array(
			'no_lunas'=>$res,
			'tgl_lunas'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_pelunasan',$crt);
		$data['no_lunas'] = $res;
		echo json_encode($data);
	}

	public function gen_noKatalog()
	{
		$res = $this->gen_num_('trx_katalog','no_katalog','KT');
		$check = $this->db->get_where('trx_katalog',array('no_katalog'=>$res));
		if($check->num_rows() > 0)
		{
			$res = $this->gen_num_('trx_katalog','no_katalog','KT');
		}
		$crt = array(
			'no_katalog'=>$res,
			'tgl_katalog'=>date('Y-m-d'),
			'data_sts'=>'0'
		);			
		$this->db->insert('trx_katalog',$crt);
		$data['no_katalog'] = $res;
		echo json_encode($data);
	}

	//CRUD Master Rekening
	public function addRekening()
	{
		$ins = array(
			'kode_rekening'=>$this->input->post('kode_rekening'),
			'nama_bank'=>$this->input->post('nama_bank'),
			'no_rekening'=>$this->input->post('no_rekening'),
			'ket_rekening'=>$this->input->post('ket_rekening'),
			'data_sts'=>'1'
		);
		$this->db->insert('master_rekening',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function updRekening()
	{
		$upd = array(
			'nama_bank'=>$this->input->post('nama_bank'),
			'no_rekening'=>$this->input->post('no_rekening'),
			'ket_rekening'=>$this->input->post('ket_rekening'),
			'data_sts'=>'1'
		);
		$this->db->update('master_rekening',$upd,array('kode_rekening'=>$this->input->post('kode_rekening')));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function delRekening($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_rekening',$upd,array('kode_rekening'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function getRekening($key)
	{
		$data = $this->db->get_where('master_rekening', array('kode_rekening'=>$key))->row();
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

	public function delBarang($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_barang',$upd,array('kode_barang'=>$key));
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

	public function delCustomer($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_customer',$upd,array('kode_customer'=>$key));
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
		$chkKode = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_driver')))->num_rows();
		if($chkKode > 0)
		{
			$data['status'] = FALSE;
			$data['err'] = 'Kode Sudah Terpakai';
			echo json_encode($data);
	    exit();
		}
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

	public function delDriver($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_driver',$upd,array('kode_driver'=>$key));
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

	public function delBiayaDriver($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_biaya_driver',$upd,array('kode_biaya_driver'=>$key));
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

	public function delTujuan($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_tujuan',$upd,array('kode_tujuan'=>$key));
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

	public function delSupplier($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_supplier',$upd,array('kode_supplier'=>$key));
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

	public function delKaryawan($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_karyawan',$upd,array('kode_karyawan'=>$key));
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

	public function delKendaraan($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_kendaraan',$upd,array('kode_kendaraan'=>$key));
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

	public function delBan($key)
	{
		$upd = array( 'data_sts'=>'0' );
		$this->db->update('master_ban',$upd,array('kode_ban'=>$key));
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

	public function getDropInventory()
	{
		$data = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->get_where('inv_ban a',array('a.data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropInvLps()
	{
		$data = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->get_where('inv_ban a',array('a.data_sts'=>'1','a.sts_stok'=>'4'))->result();
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

	public function getDropKasBonKantor()
	{
		$data = $this->db->get_where('trx_kas_bon_kantor',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropRekening()
	{
		$data = $this->db->get_where('master_rekening',array('data_sts'=>'1'))->result();
		echo json_encode($data);
	}

	public function getDropTagihan()
	{
		$data = $this->db->join('trx_tagihan b','b.no_tagihan = a.no_tagihan')->get_where('trx_tagihan_det a',array('b.data_sts'=>'1'))->result();
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

	public function pickDropInventory($key)
	{
		$data = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->get_where('inv_ban a',array('inv_id'=>$key,'a.data_sts'=>'1'))->row();
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

	public function pickDropKasBonKantor($key)
	{
		$data = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->get_where('trx_kas_bon_kantor a',array('a.no_bon'=>$key,'a.data_sts'=>'1'))->row();
		echo json_encode($data);
	}

	public function pickDropTagihan($key)
	{
		$data = $this->db->join('trx_tagihan b','b.no_tagihan = a.no_tagihan')->get_where('trx_tagihan_det a',array('a.det_id'=>$key,'b.data_sts'=>'1'))->row();
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
				'tgl_nota'=>$this->dateFix_($this->input->post('tgl_nota')),
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

	public function printBeliBarang($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pembelian_spare_part',$data);
	}

	public function reportBeliBarang()
	{
		$this->load->view('menu/lap_pembelian_spare_part');
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
				'tgl_biaya'=>$this->dateFix_($this->input->post('tgl_biaya')),
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

	public function printBiayaKdr($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_biaya_kendaraan',$data);
	}

	public function reportBiayaKendaraan()
	{
		$this->load->view('menu/lap_biaya_kendaraan');
	}

	//Transaksi Kuitansi
	public function addKuitansi()
	{
		$ins = array(
			'no_kuitansi'=>$this->input->post('no_kuitansi'),
			'ket_pembayaran'=>$this->input->post('keterangan'),
			'nom_pembayaran'=>$this->input->post('jumlah')
		);
		$this->db->insert('trx_kuitansi_det',$ins);
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

	public function subTotalKuitansi($key)
	{
		$data = $this->db->select('SUM(a.nom_pembayaran) as subtotal')->join('trx_kuitansi b','b.no_kuitansi = a.no_kuitansi')->get_where('trx_kuitansi_det a',array('a.no_kuitansi'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvKuitansi($key)
	{
		$this->db->delete('trx_kuitansi_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Kuitansi</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Kuitansi</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveKuitansi()
	{
		$getSts = $this->db->get_where('trx_kuitansi',array('no_kuitansi'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_rekening'=>$this->input->post('kode_rekening'),
				'kode_customer'=>$this->input->post('kode_customer'),
				'tgl_kuitansi'=>$this->dateFix_($this->input->post('tgl_kuitansi')),
				'ket_kuitansi'=>$this->input->post('ket_kuitansi'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_kuitansi',$upd,array('no_kuitansi'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Biaya Kuitansi</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Biaya Kuitansi</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKuitansi()
	{
		$getSts = $this->db->get_where('trx_kuitansi',array('no_kuitansi'=>$this->input->post('no_kuitansi')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_kuitansi',$can,array('no_kuitansi'=>$this->input->post('no_kuitansi')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Biaya Kuitansi</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Biaya Kuitansi</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printKuitansi($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_kuitansi',$data);
	}

	public function reportKuitansi()
	{
		$this->load->view('menu/lap_kuitansi');
	}

	//Transaksi Pelunasan Tagihan
	public function addLunas()
	{
		$ins = array(
			'no_lunas'=>$this->input->post('no_lunas'),
			'det_tagihan'=>$this->input->post('no_tagihan'),
			'jumlah'=>$this->input->post('jumlah')
		);
		$this->db->insert('trx_pelunasan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Pelunasan Piutang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Pelunasan Piutang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function subTotalLunas($key)
	{
		$data = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_pelunasan b','b.no_lunas = a.no_lunas')->get_where('trx_pelunasan_det a',array('a.no_lunas'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvLunas($key)
	{
		$this->db->delete('trx_pelunasan_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Detail Pelunasan Piutang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Detail Pelunasan Piutang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveLunas()
	{
		$getSts = $this->db->get_where('trx_pelunasan',array('no_lunas'=>$this->input->post('no_lunas')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_customer'=>$this->input->post('kode_customer'),
				'tgl_lunas'=>$this->dateFix_($this->input->post('tgl_lunas')),
				'data_sts'=>'1'
			);
			$this->db->update('trx_pelunasan',$upd,array('no_lunas'=>$this->input->post('no_lunas')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Pelunasan Piutang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Pelunasan Piutang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelLunas()
	{
		$getSts = $this->db->get_where('trx_pelunasan',array('no_lunas'=>$this->input->post('no_lunas')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_pelunasan',$can,array('no_lunas'=>$this->input->post('no_lunas')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Pelunasan Piutang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Pelunasan Piutang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printLunas($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pelunasan',$data);
	}

	public function reportLunas()
	{
		$this->load->view('menu/lap_pelunasan_piutang');
	}

	//Transaksi Pemakaian Barang/Spare Part
	public function addKatalog1()
	{
		$ins = array(
			'no_katalog'=>$this->input->post('no_katalog'),
			'ket_det'=>$this->input->post('kode_barang'),
			'qty_det'=>$this->input->post('qty_barang')
		);
		$this->db->insert('trx_katalog_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Katalog Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Katalog Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function addKatalog2()
	{
		$ins = array(
			'no_katalog'=>$this->input->post('no_katalog'),
			'ket_det'=>$this->input->post('kode_ban'),
			'qty_det'=>$this->input->post('qty_ban')
		);
		$this->db->insert('trx_katalog_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Katalog Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Katalog Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvKatalog($key)
	{
		$this->db->delete('trx_katalog_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Katalog Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Katalog Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveKatalog()
	{
		$getSts = $this->db->get_where('trx_katalog',array('no_katalog'=>$this->input->post('no_katalog')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'tgl_katalog'=>$this->dateFix_($this->input->post('tgl_katalog')),
				'kode_kendaraan'=>$this->input->post('nopol'),
				'kode_sopir'=>$this->input->post('sopir_kendaraan'),
				'kode_kernet'=>$this->input->post('kernet_kendaraan'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_katalog',$upd,array('no_katalog'=>$this->input->post('no_katalog')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Katalog Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Katalog Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelKatalog()
	{
		$getSts = $this->db->get_where('trx_katalog',array('no_katalog'=>$this->input->post('no_katalog')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_katalog',$can,array('no_katalog'=>$this->input->post('no_katalog')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Katalog Kendaraan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Katalog Kendaraan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printKatalog($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_katalog_kendaraan',$data);
	}

	public function reportKatalog()
	{
		$this->load->view('menu/lap_katalog_kendaraan');
	}

	//Transaksi Opname Barang/Spare Part
	public function addOpnameBarang()
	{
		$ins = array(
			'no_opname'=>$this->input->post('no_opname'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'qty_opname'=>$this->input->post('qty_opname'),
			'qty_lama'=>$this->input->post('stok')
		);
		$this->db->insert('trx_opname_barang_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Opname Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Opname Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvOpnameBarang($key)
	{
		$this->db->delete('trx_opname_barang_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Opname Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Opname Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveOpnameBarang()
	{
		$getSts = $this->db->get_where('trx_opname_barang',array('no_opname'=>$this->input->post('no_opname')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'tgl_opname'=>$this->dateFix_($this->input->post('tgl_opname')),
				'data_sts'=>'1'
			);
			$this->db->update('trx_opname_barang',$upd,array('no_opname'=>$this->input->post('no_opname')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_opname_barang_det',array('no_opname'=>$this->input->post('no_opname')))->result();
				foreach ($detAll as $det)
				{
					$upStok = $det->qty_opname;
					$upd = array('stok_barang'=>$upStok);
					$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Opname Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Opname Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelOpnameBarang()
	{
		$getSts = $this->db->get_where('trx_opname_barang',array('no_opname'=>$this->input->post('no_opname')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_opname_barang_det',array('no_opname'=>$this->input->post('no_opname')))->result();
			foreach ($detAll as $det)
			{
				$upStok = $det->qty_lama;
				$upd = array('stok_barang'=>$upStok);
				$this->db->update('master_barang',$upd,array('kode_barang'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_opname_barang',$can,array('no_opname'=>$this->input->post('no_opname')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Opname Barang</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Opname Barang</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printOpnameBarang($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_opname_spare_part',$data);
	}

	public function reportOpnameBarang()
	{
		$this->load->view('menu/lap_opname_spare_part');
	}

	//Transaksi Opname Ban
	public function addOpnameBan()
	{
		$ins = array(
			'no_opname'=>$this->input->post('no_opname'),
			'kode_ban'=>$this->input->post('kode_ban'),
			'sts_ban'=>$this->input->post('sts_ban'),
			'qty_opname'=>$this->input->post('qty_opname'),
			'qty_lama'=>$this->input->post('stok')
		);
		$this->db->insert('trx_opname_ban_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Opname Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Opname Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function rmvOpnameBan($key)
	{
		$this->db->delete('trx_opname_ban_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Opname Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Opname Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveOpnameBan()
	{
		$getSts = $this->db->get_where('trx_opname_ban',array('no_opname'=>$this->input->post('no_opname')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'tgl_opname'=>$this->dateFix_($this->input->post('tgl_opname')),
				'data_sts'=>'1'
			);
			$this->db->update('trx_opname_ban',$upd,array('no_opname'=>$this->input->post('no_opname')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
			if($data['status']!=FALSE)
			{
				$detAll = $this->db->get_where('trx_opname_ban_det',array('no_opname'=>$this->input->post('no_opname')))->result();
				foreach ($detAll as $det)
				{
					$upStok = $det->qty_opname;
					switch ($detAll->sts_ban)
					{
						case '0':
							$upd = array('stok_baru'=>$upStok);
							break;
						case '1':
							$upd = array('stok_bekas'=>$upStok);
							break;
						case '2':
							$upd = array('stok_vulkanisir'=>$upStok);
							break;
						case '3':
							$upd = array('stok_afkir'=>$upStok);
							break;
						case '4':
							$upd = array('stok_pasang'=>$upStok);
							break;
						default:
							break;
					}
					$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_barang));
				}
			}
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Opname Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Opname Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelOpnameBan()
	{
		$getSts = $this->db->get_where('trx_opname_ban',array('no_opname'=>$this->input->post('no_opname')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$detAll = $this->db->get_where('trx_opname_ban_det',array('no_opname'=>$this->input->post('no_opname')))->result();
			foreach ($detAll as $det)
			{
				$upStok = $det->qty_lama;
				switch ($detAll->sts_ban)
					{
						case '0':
							$upd = array('stok_baru'=>$upStok);
							break;
						case '1':
							$upd = array('stok_bekas'=>$upStok);
							break;
						case '2':
							$upd = array('stok_vulkanisir'=>$upStok);
							break;
						case '3':
							$upd = array('stok_afkir'=>$upStok);
							break;
						case '4':
							$upd = array('stok_pasang'=>$upStok);
							break;
						default:
							break;
					}
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_barang));
			}
			$can = array('data_sts'=>'0');
			$this->db->update('trx_opname_ban',$can,array('no_opname'=>$this->input->post('no_opname')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Opname Ban</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Opname Ban</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printOpnameBan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_opname_ban',$data);
	}

	public function reportOpnameBan()
	{
		$this->load->view('menu/lap_opname_ban');
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
				'tgl_pakai_brg'=>$this->dateFix_($this->input->post('tgl_pemakaian')),
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

	public function printPakaiBarang($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pemakaian_spare_part',$data);
	}

	public function reportPakaiBarang()
	{
		$this->load->view('menu/lap_pemakaian_spare_part');
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
				'tgl_pembelian'=>$this->dateFix_($this->input->post('tgl_pembelian')),
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
					$this->beliBanUpInv($det->kode_ban,$det->qty_beli,$det->no_pembelian);
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

	public function beliBanUpInv($key,$count,$trxCode)
	{
		$getJnsBan = $this->db->get_where('master_ban',array('kode_ban'=>$key))->row()->jenis_ban;
		switch ($getJnsBan)
		{
			case '0':
				$getBklNo = $this->db->get_where('profile_settings',array('id'=>'1'))->row()->bkl_ban_dalam;
				$upBkl = array('bkl_ban_dalam'=>($getBklNo+$count));
				break;
			case '1':
				$getBklNo = $this->db->get_where('profile_settings',array('id'=>'1'))->row()->bkl_ban_luar;
				$upBkl = array('bkl_ban_luar'=>($getBklNo+$count));
				break;
			case '2':
				$getBklNo = $this->db->get_where('profile_settings',array('id'=>'1'))->row()->bkl_marset;
				$upBkl = array('bkl_marset'=>($getBklNo+$count));
				break;
			default:
				break;
		}
		for ($i=0; $i < $count; $i++)
		{
			$bklPlus = (int)$getBklNo+$i+1;
			$ins = array(
				'kode_transaksi'=>$trxCode,
				'kode_ban'=>$key,
				'kode_transaksi'=>$trxCode,
				'bkl'=>$bklPlus,
				'sts_stok'=>'0',
				'data_sts'=>'1'
			);
			$this->db->insert('inv_ban',$ins);
		}
		$this->db->update('profile_settings',$upBkl,array('id'=>'1'));
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
			$this->cancelBanUpInv($this->input->post('no_pembelian'));
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

	public function cancelBanUpInv($trxCode)
	{
		$this->db->delete('inv_ban',array('kode_transaksi'=>$trxCode));
	}

	public function printBeliBan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pembelian_ban',$data);
	}

	public function reportBeliBan()
	{
		$this->load->view('menu/lap_pembelian_ban');
	}

	//Transaksi Pemasangan Ban
	public function addPasangBan()
	{
		$getBan = $this->db->get_where('master_ban',array('kode_ban'=>$this->input->post('kode_ban_pasang')))->row();
		$stsBan = $this->input->post('status_ban_psg');
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
				'kode_inventory'=>$this->input->post('kode_inv_pasang'),
				'qty_pasang'=>$this->input->post('qty_pasang'),
				'status_pasang'=>$this->input->post('status_ban_psg')
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
				'kode_kendaraan'=>$this->input->post('kode_kendaraan_pasang'),
				'bengkel_pemasangan'=>$this->input->post('bengkel_pemasangan'),
				'tgl_pemasangan'=>$this->dateFix_($this->input->post('tgl_pemasangan')),
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
					$upInv = array('sts_stok'=>'4');
					$this->db->update('inv_ban',$upInv,array('inv_id'=>$det->kode_inventory));
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
						$upInv = array('sts_stok'=>'0');
						break;
					case '1':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_bekas;
						$upStok = ($getStok->stok_bekas*1)+($det->qty_pasang*1);
						$upPsg = ($getStok->stok_pasang*1)-($det->qty_pasang*1);
						$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
						$upInv = array('sts_stok'=>'1');
						break;
					case '2':
						$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row()->stok_vulkanisir;
						$upStok = ($getStok->stok_vulkanisir*1)+($det->qty_pasang*1);
						$upPsg = ($getStok->stok_pasang*1)-($det->qty_pasang*1);
						$upd = array('stok_baru'=>$upStok,'stok_pasang'=>$upPsg);
						$upInv = array('sts_stok'=>'2');
						break;
					default:
						break;
				}
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
				$this->db->update('inv_ban',$upInv,array('inv_id'=>$det->kode_inventory));
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

	public function printPasangBan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pemasangan_ban',$data);
	}

	public function reportPasangBan()
	{
		$this->load->view('menu/lap_pemasangan_ban');
	}

	//Transaksi Pelepasan Ban
	public function addLepasBan()
	{
		$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$this->input->post('kode_ban_lepas')))->row()->stok_pasang;
		$cekStok = $this->db->get_where('inv_ban',array('inv_id'=>$this->input->post('kode_inv_lepas')))->row()->sts_stok;
		if($cekStok != '4')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$ins = array(
				'no_pelepasan'=>$this->input->post('no_pelepasan'),
				'kode_ban'=>$this->input->post('kode_ban_lepas'),
				'kode_inventory'=>$this->input->post('kode_inv_lepas'),
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
				'kode_kendaraan'=>$this->input->post('kode_kendaraan_lepas'),
				'bengkel_pelepasan'=>$this->input->post('bengkel_pelepasan'),
				'tgl_pelepasan'=>$this->dateFix_($this->input->post('tgl_pelepasan')),
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
							$upInv = array('sts_stok'=>'1');
							break;
						case '1':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upLps = ($getStok->stok_pasang*1)-($det->qty_lepas*1);
							$upStok = ($getStok->stok_vulkanisir*1)+($det->qty_lepas*1);
							$upd = array('stok_vulkanisir'=>$upStok,'stok_pasang'=>$upLps);
							$upInv = array('sts_stok'=>'2');
							break;
						case '2':
							$getStok = $this->db->get_where('master_ban',array('kode_ban'=>$det->kode_ban))->row();
							$upLps = ($getStok->stok_pasang*1)-($det->qty_lepas*1);
							$upStok = ($getStok->stok_afkir*1)+($det->qty_lepas*1);
							$upd = array('stok_afkir'=>$upStok,'stok_pasang'=>$upLps);
							$upInv = array('sts_stok'=>'3');
							break;
						default:
							break;
					}
					$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
					$this->db->update('inv_ban',$upInv,array('inv_id'=>$det->kode_inventory));
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
				$upInv = array('sts_stok'=>'4');
				$this->db->update('master_ban',$upd,array('kode_ban'=>$det->kode_ban));
				$this->db->update('inv_ban',$upInv,array('inv_id'=>$det->kode_inventory));
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

	public function printLepasBan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_pelepasan_ban',$data);
	}

	public function reportLepasBan()
	{
		$this->load->view('menu/lap_pelepasan_ban');
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
				'tgl_retur'=>$this->dateFix_($this->input->post('tgl_retur')),
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

	public function printReturBeliBarang($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_retur_pembelian_spare_part',$data);
	}

	public function reportReturBeliBarang()
	{
		$this->load->view('menu/lap_retur_pembelian_spare_part');
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
				'tgl_retur'=>$this->dateFix_($this->input->post('tgl_retur')),
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

	public function printReturPakaiBarang($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_retur_pemakaian_spare_part',$data);
	}

	public function reportReturPakaiBarang()
	{
		$this->load->view('menu/lap_retur_pemakaian_spare_part');
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
				'tgl_bon'=>$this->dateFix_($this->input->post('tgl_bon')),
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

	public function printBonKaryawan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_input_bon',$data);
	}

	public function reportInputBon()
	{
		$this->load->view('menu/lap_input_bon');
	}

	//Transaksi Input Kas
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
				'tgl_kas'=>$this->dateFix_($this->input->post('tgl_kas')),
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

	public function printKas($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_input_kas',$data);
	}

	public function reportKas()
	{
		$this->load->view('menu/lap_input_kas');
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
				'tgl_bon'=>$this->dateFix_($this->input->post('tgl_bon')),
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

	public function printBonSopir($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_input_bon_sopir',$data);
	}

	public function reportBonSopir()
	{
		$this->load->view('menu/lap_bon_sopir');
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
				'tgl_klaim'=>$this->dateFix_($this->input->post('tgl_klaim')),
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

	public function printKlaimSopir($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_input_klaim_sopir',$data);
	}

	public function reportKlaimSopir()
	{
		$this->load->view('menu/lap_klaim_sopir');
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
				'tgl_upah'=>$this->dateFix_($this->input->post('tgl_upah')),
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

	public function printBayarUpahKaryawan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_upah',$data);
	}

	public function reportBayarUpahKaryawan()
	{
		$this->load->view('menu/lap_upah_karyawan');
	}

	//Transaksi Bayar Bon Klaim Sopir
	public function saveBayarSopir()
	{
		$getSts = $this->db->get_where('trx_bayar_bonklaim_sopir',array('no_bayar'=>$this->input->post('no_bayar')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_driver'=>$this->input->post('kode_sopir'),
				'tgl_bayar'=>$this->input->post('tgl_bayar'),
				'nom_bon'=>$this->input->post('nom_bon'),
				'nom_klaim'=>$this->input->post('nom_klaim'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_bayar_bonklaim_sopir',$upd,array('no_bayar'=>$this->input->post('no_bayar')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		if($data['status']!=FALSE)
		{
			$getKlaim = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_klaim;
			$getBon = $this->db->get_where('master_driver',array('kode_driver'=>$this->input->post('kode_sopir')))->row()->jml_bon;
			$totKlaim = ($getKlaim*1)-($this->input->post('nom_klaim')*1);
			$totBon = ($getBon*1)-($this->input->post('nom_bon')*1);
			$upDrv = array('jml_klaim'=>$totKlaim,'jml_bon'=>$totBon);
			$this->db->update('master_driver',$upDrv,array('kode_driver'=>$this->input->post('kode_sopir')));
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

	public function printBonKlaimSopir($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_bayar_bon_klaim_sopir',$data);
	}

	public function reportBayarSopir()
	{
		$this->load->view('menu/lap_bayar_sopir');
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
				'tgl_bon'=>($this->input->post('tgl_bon')!='')?$this->dateFix_($this->input->post('tgl_bon')):NULL,
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
				'tgl_bon_kota'=>($this->input->post('tgl_bon_kota')!='')?$this->dateFix_($this->input->post('tgl_bon_kota')):NULL,
				'tgl_bon_a'=>($this->input->post('tgl_bon_a')!='')?$this->dateFix_($this->input->post('tgl_bon_a')):NULL,
				'tgl_bon_b'=>($this->input->post('tgl_bon_b')!='')?$this->dateFix_($this->input->post('tgl_bon_b')):NULL,
				'tgl_bon_c'=>($this->input->post('tgl_bon_c')!='')?$this->dateFix_($this->input->post('tgl_bon_c')):NULL,
				'tgl_bon_d'=>($this->input->post('tgl_bon_d')!='')?$this->dateFix_($this->input->post('tgl_bon_d')):NULL,
				'sub_uang_saku'=>$this->input->post('sub_uang_saku'),
				'uang_solar'=>$this->input->post('uang_solar'),
				'tgl_solar'=>($this->input->post('tgl_solar')!='')?$this->dateFix_($this->input->post('tgl_solar')):NULL,
				'nama_pom'=>$this->input->post('nama_pom'),
				'sub_bonall'=>$this->input->post('sub_bonall'),
				'tgl_muat'=>($this->input->post('tgl_muat')!='')?$this->dateFix_($this->input->post('tgl_muat')):NULL,
				'tgl_muat_b'=>($this->input->post('tgl_muat_b')!='')?$this->dateFix_($this->input->post('tgl_muat_b')):NULL,
				'tgl_bongkar'=>($this->input->post('tgl_bongkar')!='')?$this->dateFix_($this->input->post('tgl_bongkar')):NULL,
				'tgl_bongkar_b'=>($this->input->post('tgl_bongkar_b')!='')?$this->dateFix_($this->input->post('tgl_bongkar_b')):NULL,
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

	public function printKasBonSopir($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_kas_bon_sopir',$data);
	}

	public function reportKasBonSopir()
	{
		$this->load->view('menu/lap_kas_bon_sopir');
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
				'tgl_bon'=>($this->input->post('tgl_bon')!='')?$this->dateFix_($this->input->post('tgl_bon')):NULL,
				'tgl_berangkat'=>($this->input->post('tgl_berangkat')!='')?$this->dateFix_($this->input->post('tgl_berangkat')):NULL,
				'tgl_kembali'=>($this->input->post('tgl_kembali')!='')?$this->dateFix_($this->input->post('tgl_kembali')):NULL,
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
				'tgl_bon_kota'=>($this->input->post('tgl_bon_kota')!='')?$this->dateFix_($this->input->post('tgl_bon_kota')):NULL,
				'tgl_bon_a'=>($this->input->post('tgl_bon_a')!='')?$this->dateFix_($this->input->post('tgl_bon_a')):NULL,
				'tgl_bon_b'=>($this->input->post('tgl_bon_b')!='')?$this->dateFix_($this->input->post('tgl_bon_b')):NULL,
				'tgl_bon_c'=>($this->input->post('tgl_bon_c')!='')?$this->dateFix_($this->input->post('tgl_bon_c')):NULL,
				'tgl_bon_d'=>($this->input->post('tgl_bon_d')!='')?$this->dateFix_($this->input->post('tgl_bon_d')):NULL,
				'sub_uang_saku'=>$this->input->post('sub_uang_saku'),
				'uang_solar'=>$this->input->post('uang_solar'),
				'tgl_solar'=>($this->input->post('tgl_solar')!='')?$this->dateFix_($this->input->post('tgl_solar')):NULL,
				'nama_pom'=>$this->input->post('nama_pom'),
				'sub_bonall'=>$this->input->post('sub_bonall'),
				'tgl_muat'=>($this->input->post('tgl_muat')!='')?$this->dateFix_($this->input->post('tgl_muat')):NULL,
				'tgl_muat_b'=>($this->input->post('tgl_muat_b')!='')?$this->dateFix_($this->input->post('tgl_muat_b')):NULL,
				'tgl_bongkar'=>($this->input->post('tgl_bongkar')!='')?$this->dateFix_($this->input->post('tgl_bongkar')):NULL,
				'tgl_bongkar_b'=>($this->input->post('tgl_bongkar_b')!='')?$this->dateFix_($this->input->post('tgl_bongkar_b')):NULL,
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

	public function printKasBonKantor($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_kas_bon_kantor',$data);
	}

	public function reportKasBonKantor()
	{
		$this->load->view('menu/lap_kas_bon_kantor');
	}

	//Transaksi Tagihan
	public function addTagihanA()
	{
		$ins = array(
			'no_tagihan'=>$this->input->post('no_tagihan'),
			'no_bon'=>$this->input->post('kode_bon'),
			'nopol'=>$this->input->post('kendaraan'),
			'tgl_muat'=>$this->input->post('tgl_muat_a'),
			'tgl_bongkar'=>$this->input->post('tgl_bongkar_a'),
			'surat_jalan'=>$this->input->post('surat_jalan_a'),
			'jenis_muatan'=>$this->input->post('jenis_muat_a'),
			'berat_muatan'=>$this->input->post('berat_muat_a'),
			'ongkos_bruto'=>$this->input->post('ongkos_muat_a')
		);
		$this->db->insert('trx_tagihan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function addTagihanB()
	{
		$ins = array(
			'no_tagihan'=>$this->input->post('no_tagihan'),
			'no_bon'=>$this->input->post('kode_bon'),
			'nopol'=>$this->input->post('kendaraan'),
			'tgl_muat'=>$this->input->post('tgl_muat_a'),
			'tgl_bongkar'=>$this->input->post('tgl_bongkar_a'),
			'surat_jalan'=>$this->input->post('surat_jalan_b'),
			'jenis_muatan'=>$this->input->post('jenis_muat_b'),
			'berat_muatan'=>$this->input->post('berat_muat_b'),
			'ongkos_bruto'=>$this->input->post('ongkos_muat_b')
		);
		$this->db->insert('trx_tagihan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function addTagihanC()
	{
		$ins = array(
			'no_tagihan'=>$this->input->post('no_tagihan'),
			'no_bon'=>$this->input->post('kode_bon'),
			'nopol'=>$this->input->post('kendaraan'),
			'tgl_muat'=>$this->input->post('tgl_muat_b'),
			'tgl_bongkar'=>$this->input->post('tgl_bongkar_b'),
			'surat_jalan'=>$this->input->post('surat_jalan_c'),
			'jenis_muatan'=>$this->input->post('jenis_muat_c'),
			'berat_muatan'=>$this->input->post('berat_muat_c'),
			'ongkos_bruto'=>$this->input->post('ongkos_muat_c')
		);
		$this->db->insert('trx_tagihan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function addTagihanD()
	{
		$ins = array(
			'no_tagihan'=>$this->input->post('no_tagihan'),
			'no_bon'=>$this->input->post('kode_bon'),
			'nopol'=>$this->input->post('kendaraan'),
			'tgl_muat'=>$this->input->post('tgl_muat_b'),
			'tgl_bongkar'=>$this->input->post('tgl_bongkar_b'),
			'surat_jalan'=>$this->input->post('surat_jalan_d'),
			'jenis_muatan'=>$this->input->post('jenis_muat_d'),
			'berat_muatan'=>$this->input->post('berat_muat_d'),
			'ongkos_bruto'=>$this->input->post('ongkos_muat_d')
		);
		$this->db->insert('trx_tagihan_det',$ins);
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menambah Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menambah Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function subTotalTagihan($key)
	{
		$data = $this->db->select('SUM(a.ongkos_bruto) as subtotal')->join('trx_tagihan b','b.no_tagihan = a.no_tagihan')->get_where('trx_tagihan_det a',array('a.no_tagihan'=>$key))->row();
		echo json_encode($data);
	}

	public function rmvTagihan($key)
	{
		$this->db->delete('trx_tagihan_det',array('det_id'=>$key));
		$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function saveTagihan()
	{
		$getSts = $this->db->get_where('trx_tagihan',array('no_tagihan'=>$this->input->post('no_tagihan')))->row();
		if($getSts->data_sts != '0')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$upd = array(
				'kode_customer'=>$this->input->post('kode_customer'),
				'tgl_tagihan'=>$this->input->post('tgl_tagihan'),
				'data_sts'=>'1'
			);
			$this->db->update('trx_tagihan',$upd,array('no_tagihan'=>$this->input->post('no_tagihan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menyimpan Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menyimpan Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function cancelTagihan()
	{
		$getSts = $this->db->get_where('trx_tagihan',array('no_tagihan'=>$this->input->post('no_tagihan')))->row();
		if($getSts->data_sts != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			$can = array('data_sts'=>'0');
			$this->db->update('trx_tagihan',$can,array('no_tagihan'=>$this->input->post('no_tagihan')));
			$data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
		}
		$data['msg'] = ($data['status']!=FALSE)?
		'<div class="alert alert-success alert-dismissible" id="alert_success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h4><i class="icon fa fa-check"></i> Sukses Menghapus Tagihan</h4>
		 </div>'
		 :
		 '<div class="alert alert-danger alert-dismissible" id="alert_failed">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h4><i class="icon fa fa-ban"></i> Gagal Menghapus Tagihan</h4>
      </div>'
		 ;
		echo json_encode($data);
	}

	public function printTagihan($key)
	{
		$data['key'] = $key;
		$this->load->view('menu/print_tagihan',$data);
	}

	public function lapTagihan()
	{
		$this->load->view('menu/lap_tagihan');
	}
	
	//Get Data Pencarian
	public function getKatalog($key)
	{
		$data = $this->db->get_where('trx_katalog',array('no_katalog'=>$key))->row();
		echo json_encode($data);
	}

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

	public function getOpnameBrg($key)
	{
		$data = $this->db->get_where('trx_opname_barang',array('no_opname'=>$key))->row();
		echo json_encode($data);
	}

	public function getOpnameBan($key)
	{
		$data = $this->db->get_where('trx_opname_ban',array('no_opname'=>$key))->row();
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

	public function getTagihan($key)
	{
		$data = $this->db->get_where('trx_tagihan',array('no_tagihan'=>$key))->row();
		echo json_encode($data);
	}

	public function getPasangBan($key)
	{
		$data = $this->db->get_where('trx_pasang_ban',array('no_pemasangan'=>$key))->row();
		echo json_encode($data);
	}

	public function getLepasBan($key)
	{
		$data = $this->db->get_where('trx_lepas_ban',array('no_pelepasan'=>$key))->row();
		echo json_encode($data);
	}

	public function getKuitansi($key)
	{
		$data = $this->db->get_where('trx_kuitansi',array('no_kuitansi'=>$key))->row();
		echo json_encode($data);
	}

	public function getLunas($key)
	{
		$data = $this->db->get_where('trx_pelunasan',array('no_lunas'=>$key))->row();
		echo json_encode($data);
	}

	public function getSettings($key)
	{
		$data = $this->db->get_where('profile_settings',array('id'=>$key))->row();
		echo json_encode($data);
	}

	public function getUser($key)
	{
		$data = $this->db->get_where('users',array('id'=>$key))->row();
		echo json_encode($data);
	}

	//Get Print
	public function getPrintTagihan($key)
	{
		$data['a'] = $this->db->join('master_customer b','b.kode_customer = a.kode_customer')->get_where('trx_tagihan a',array('a.no_tagihan'=>$key))->row();
		$data['b'] = $this->db->get_where('trx_tagihan_det',array('no_tagihan'=>$key))->result();
		$data['c'] = $this->db->select('SUM(a.ongkos_bruto) as subtotal')->join('trx_tagihan b','b.no_tagihan = a.no_tagihan')->get_where('trx_tagihan_det a',array('a.no_tagihan'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintKasBonSopir($key)
	{
		$data['a'] = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->join('master_driver c','c.kode_driver = a.kode_sopir')->join('master_driver d','d.kode_driver = a.kode_kernet')->select('a.*,b.*,c.nama_driver as sopir,d.nama_driver as kernet')->get_where('trx_kas_bon_sopir a',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintKasBonKantor($key)
	{
		$data['a'] = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->join('master_driver c','c.kode_driver = a.kode_sopir')->join('master_driver d','d.kode_driver = a.kode_kernet')->select('a.*,b.*,c.nama_driver as sopir,d.nama_driver as kernet')->get_where('trx_kas_bon_kantor a',array('no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintBeliBarang($key)
	{
		$data['a'] = $this->db->join('master_supplier b','b.kode_supplier = a.kode_supplier')->get_where('trx_beli_barang a',array('a.no_nota'=>$key))->row();
		$data['b'] = $this->db->join('master_barang b','b.kode_barang = a.kode_barang')->get_where('trx_beli_barang_det a',array('a.no_nota'=>$key))->result();
		$data['c'] = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_beli_barang b','b.no_nota = a.no_nota')->get_where('trx_beli_barang_det a',array('a.no_nota'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintPakaiBarang($key)
	{
		$data['a'] = $this->db->select('b.nama_karyawan, a.tgl_pakai_brg, a.no_pakai_brg, c.nopol, d.nama_driver as sopir, e.nama_driver as kernet, a.ket_pakai_brg')->join('master_karyawan b','b.kode_karyawan = a.kode_karyawan')->join('master_kendaraan c','c.kode_kendaraan = a.kode_kendaraan')->join('master_driver d','d.kode_driver = a.kode_sopir')->join('master_driver e','e.kode_driver = a.kode_kernet')->get_where('trx_pakai_barang a',array('a.no_pakai_brg'=>$key))->row();
		$data['b'] = $this->db->join('master_barang b','b.kode_barang = a.kode_barang')->get_where('trx_pakai_barang_det a',array('a.no_pakai_brg'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintBeliBan($key)
	{
		$data['a'] = $this->db->join('master_supplier b','b.kode_supplier = a.kode_supplier')->get_where('trx_beli_ban a',array('a.no_pembelian'=>$key))->row();
		$data['b'] = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->get_where('trx_beli_ban_det a',array('a.no_pembelian'=>$key))->result();
		$data['c'] = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_beli_ban b','b.no_pembelian = a.no_pembelian')->get_where('trx_beli_ban_det a',array('a.no_pembelian'=>$key))->row();
		$data['d'] = $this->db->select('group_concat(bkl SEPARATOR ", ") as conStr')->get_where('inv_ban',array('kode_transaksi'=>$key))->row()->conStr;
		$data['e'] = $this->db->join('master_ban c','c.kode_ban = a.kode_ban')->join('trx_beli_ban b','b.no_pembelian  = a.kode_transaksi')->order_by('c.jenis_ban')->get_where('inv_ban a',array('a.kode_transaksi'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintBiayaKdr($key)
	{
		$data['a'] = $this->db->select('b.nama_karyawan, a.tgl_biaya, a.no_biaya, c.nopol, d.nama_driver as sopir, e.nama_driver as kernet,a.grand_total')->join('master_karyawan b','b.kode_karyawan = a.kode_karyawan')->join('master_kendaraan c','c.kode_kendaraan = a.kode_kendaraan')->join('master_driver d','d.kode_driver = a.sopir_kendaraan')->join('master_driver e','e.kode_driver = a.kernet_kendaraan')->get_where('trx_biaya_kendaraan a',array('a.no_biaya'=>$key))->row();
		$data['b'] = $this->db->get_where('trx_biaya_kendaraan_det a',array('a.no_biaya'=>$key))->result();
		$data['c'] = $this->db->select('SUM(a.jumlah) as subtotal')->join('trx_biaya_kendaraan b','b.no_biaya = a.no_biaya')->get_where('trx_biaya_kendaraan_det a',array('a.no_biaya'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintReturBeliBarang($key)
	{
		$data['a'] = $this->db->join('trx_beli_barang b','b.no_nota = a.no_nota')->get_where('trx_retur_beli_barang a',array('a.no_retur'=>$key))->row();
		$data['b'] = $this->db->join('master_barang b','b.kode_barang = a.kode_barang')->get_where('trx_retur_beli_barang_det a',array('a.no_retur'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintReturPakaiBarang($key)
	{
		$data['a'] = $this->db->join('trx_pakai_barang b','b.no_pakai_brg = a.no_pakai_brg')->join('master_kendaraan c','c.kode_kendaraan = b.kode_kendaraan')->get_where('trx_retur_pakai_barang a',array('a.no_retur'=>$key))->row();
		$data['b'] = $this->db->join('master_barang b','b.kode_barang = a.kode_barang')->get_where('trx_retur_pakai_barang_det a',array('a.no_retur'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintBonKaryawan($key)
	{
		$data['a'] = $this->db->join('master_karyawan b','b.kode_karyawan = a.kode_karyawan')->get_where('trx_input_bon_karyawan a',array('a.no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintBonSopir($key)
	{
		$data['a'] = $this->db->join('master_driver b','b.kode_driver = a.kode_driver')->get_where('trx_input_bon_sopir a',array('a.no_bon'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintKlaimSopir($key)
	{
		$data['a'] = $this->db->join('master_driver b','b.kode_driver = a.kode_driver')->get_where('trx_input_klaim_sopir a',array('a.no_klaim'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintKas($key)
	{
		$data['a'] = $this->db->get_where('trx_input_kas',array('no_kas'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintBonKlaimSopir($key)
	{
		$data['a'] = $this->db->join('master_driver b','b.kode_driver = a.kode_driver')->get_where('trx_bayar_bonklaim_sopir a',array('a.no_bayar'=>$key))->row();
		echo json_encode($data);
	}

	public function getPrintPasangBan($key)
	{
		$data['a'] = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->get_where('trx_pasang_ban a',array('a.no_pemasangan'=>$key))->row();
		$data['b'] = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->join('inv_ban c','c.inv_id = a.kode_inventory')->get_where('trx_pasang_ban_det a',array('a.no_pemasangan'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintLepasBan($key)
	{
		$data['a'] = $this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan')->get_where('trx_lepas_ban a',array('a.no_pelepasan'=>$key))->row();
		$data['b'] = $this->db->join('master_ban b','b.kode_ban = a.kode_ban')->join('inv_ban c','c.inv_id = a.kode_inventory')->get_where('trx_lepas_ban_det a',array('a.no_pelepasan'=>$key))->result();
		echo json_encode($data);
	}

	public function getPrintKuitansi($key)
	{
		$data['a'] = $this->db->join('master_customer b','b.kode_customer = a.kode_customer')->join('master_rekening c','c.kode_rekening = a.kode_rekening')->get_where('trx_kuitansi a',array('a.no_kuitansi'=>$key))->row();
		$data['b'] = $this->db->select('SUM(a.nom_pembayaran) as subtotal')->join('trx_kuitansi b','b.no_kuitansi = a.no_kuitansi')->get_where('trx_kuitansi_det a',array('a.no_kuitansi'=>$key))->row();
		$data['c'] = $this->number_conv($data['b']->subtotal);
		echo json_encode($data);
	}

	public function getPrintUpah($key)
	{
		$data['a'] = $this->db->join('master_karyawan b','b.kode_karyawan = a.kode_karyawan')->get_where('trx_bayar_upah_karyawan a',array('a.no_kuitansi'=>$key))->row();
		$data['b'] = $this->number_conv($data['a']->grand_total);
		echo json_encode($data);
	}

	public function getPrintKatalog($key)
	{
		$data['a'] = $this->db->select('a.tgl_katalog, a.no_katalog, c.nopol, d.nama_driver as sopir, e.nama_driver as kernet')->join('master_kendaraan c','c.kode_kendaraan = a.kode_kendaraan')->join('master_driver d','d.kode_driver = a.kode_sopir')->join('master_driver e','e.kode_driver = a.kode_kernet')->get_where('trx_katalog a',array('a.no_katalog'=>$key))->row();
		$data['b'] = $this->db->get_where('trx_katalog_det a',array('a.no_katalog'=>$key))->result();
		echo json_encode($data);
	}

	//Date Fixer
	function dateFix_($inp)
	{
		$date = str_replace('/', '-', $inp);
		return date('Y-m-d', strtotime($date));
	}

	//Terbilang
	public function number_conv($value)
	{
		$nilai = abs($value);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) 
		{
			$temp = " ". $huruf[$nilai];
		} 
		else if ($nilai <20) 
		{
			$temp = $this->number_conv($nilai - 10). " Belas ";
		} 
		else if ($nilai < 100) 
		{
			$temp = $this->number_conv($nilai/10)." Puluh ". $this->number_conv($nilai % 10);
		} 
		else if ($nilai < 200) 
		{
			$temp = " Seratus " . $this->number_conv($nilai - 100);
		} 
		else if ($nilai < 1000) 
		{
			$temp = $this->number_conv($nilai/100) . " Ratus " . $this->number_conv($nilai % 100);
		} 
		else if ($nilai < 2000) 
		{
			$temp = " Seribu " . $this->number_conv($nilai - 1000);
		} 
		else if ($nilai < 1000000) 
		{
			$temp = $this->number_conv($nilai/1000) . " Ribu " . $this->number_conv($nilai % 1000);
		} 
		else if ($nilai < 1000000000) 
		{
			$temp = $this->number_conv($nilai/1000000) . " Juta " . $this->number_conv($nilai % 1000000);
		} 
		else if ($nilai < 1000000000000) 
		{
			$temp = $this->number_conv($nilai/1000000000) . " Milyar " . $this->number_conv(fmod($nilai,1000000000));
		} 
		else if ($nilai < 1000000000000000) 
		{
			$temp = $this->number_conv($nilai/1000000000000) . " Trilyun " . $this->number_conv(fmod($nilai,1000000000000));
		}
		if($value<0) 
		{
			$hasil = "Minus ". trim($temp);
		} 
		else 
		{
			$hasil = trim($temp);
		}
		return $hasil;
	}
}
