<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datatables/show/ShowBarang','showBarang');
		$this->load->model('Datatables/show/ShowCustomer','showCustomer');
		$this->load->model('Datatables/show/ShowDriver','showDriver');
		$this->load->model('Datatables/show/ShowBiayaDriver','showBiayaDriver');
		$this->load->model('Datatables/show/ShowTujuan','showTujuan');
		$this->load->model('Datatables/show/ShowSupplier','showSupplier');
		$this->load->model('Datatables/show/ShowKaryawan','showKaryawan');
		$this->load->model('Datatables/show/ShowKendaraan','showKendaraan');
		$this->load->model('Datatables/show/ShowBan','showBan');

		$this->load->model('Datatables/details/DetPembelianBarang','detBeliBrg');
		$this->load->model('Datatables/details/DetPemakaianBarang','detPakaiBrg');
		$this->load->model('Datatables/details/DetPembelianBan','detBeliBan');
		$this->load->model('Datatables/details/DetBiayaKendaraan','detBiayaKdr');
		$this->load->model('Datatables/details/DetReturPembelianBarang','detReturBeliBrg');
		$this->load->model('Datatables/details/DetReturPemakaianBarang','detReturPakaiBrg');
		$this->load->model('Datatables/details/DetPemasanganBan','detPsgBan');
		$this->load->model('Datatables/details/DetPelepasanBan','detLpsBan');

		$this->load->model('Datatables/search/SearchDaftarPembelianBarang','listBeliBrg');
		$this->load->model('Datatables/search/SearchDaftarPemakaianBarang','listPakaiBrg');
		$this->load->model('Datatables/search/SearchDaftarPembelianBan','listBeliBan');
		$this->load->model('Datatables/search/SearchDaftarBiayaKendaraan','listBiayaKdr');
		$this->load->model('Datatables/search/SearchDaftarReturPembelianBarang','listReturBeliBrg');
		$this->load->model('Datatables/search/SearchDaftarReturPemakaianBarang','listReturPakaiBrg');
		$this->load->model('Datatables/search/SearchDaftarInputBonKaryawan','listInpBonKry');
		$this->load->model('Datatables/search/SearchDaftarInputKas','listInputKas');
		$this->load->model('Datatables/search/SearchDaftarInputBonSopir','listInpBonSopir');
		$this->load->model('Datatables/search/SearchDaftarInputKlaimSopir','listInpKlaimSopir');
		$this->load->model('Datatables/search/SearchDaftarBayarSopir','listByrSopir');
		$this->load->model('Datatables/search/SearchDaftarUpahKaryawan','listUpahKry');
		$this->load->model('Datatables/search/SearchDaftarKasBonSopir','listKasBonSpr');
		$this->load->model('Datatables/search/SearchDaftarPemasanganBan','listPsgBan');
		$this->load->model('Datatables/search/SearchDaftarPelepasanBan','listLpsBan');
		$this->load->model('Datatables/search/SearchDaftarKasBonKantor','listKasBonKtr');
	}

	//Data Cari Transaksi
	public function listTagihan()
	{
		$list = $this->listTgh->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_tagihan;
			$row[] = $dat->tgl_tagihan;
			$row[] = $dat->nama_customer ;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihTagihan('."'".$dat->no_tagihan."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listTgh->count_all(),
				"recordsFiltered" => $this->listTgh->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listPasangBan()
	{
		$list = $this->listPsgBan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_pemasangan;
			$row[] = $dat->tgl_pemasangan;
			$row[] = $dat->nopol;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihPasangBan('."'".$dat->no_pemasangan."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listPsgBan->count_all(),
				"recordsFiltered" => $this->listPsgBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listLepasBan()
	{
		$list = $this->listLpsBan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_pelepasan;
			$row[] = $dat->tgl_pelepasan;
			$row[] = $dat->nopol;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihLepasBan('."'".$dat->no_pelepasan."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listLpsBan->count_all(),
				"recordsFiltered" => $this->listLpsBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBeliBarang()
	{
		$list = $this->listBeliBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_nota;
			$row[] = $dat->tgl_nota;
			$row[] = $dat->nama_supplier;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihNotaBrg('."'".$dat->no_nota."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listBeliBrg->count_all(),
				"recordsFiltered" => $this->listBeliBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listPakaiBarang()
	{
		$list = $this->listPakaiBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_pakai_brg;
			$row[] = $dat->tgl_pakai_brg;
			$row[] = $dat->nama_karyawan;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihPakaiBrg('."'".$dat->no_pakai_brg."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listPakaiBrg->count_all(),
				"recordsFiltered" => $this->listPakaiBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBeliBan()
	{
		$list = $this->listBeliBan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_pembelian;
			$row[] = $dat->tgl_pembelian;
			$row[] = $dat->nama_supplier;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihBeliBan('."'".$dat->no_pembelian."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listBeliBan->count_all(),
				"recordsFiltered" => $this->listBeliBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBiayaKendaraan()
	{
		$list = $this->listBiayaKdr->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_biaya;
			$row[] = $dat->tgl_biaya;
			$row[] = $dat->nama_karyawan;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihBiayaKdr('."'".$dat->no_biaya."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listBiayaKdr->count_all(),
				"recordsFiltered" => $this->listBiayaKdr->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listReturBeliBarang()
	{
		$list = $this->listReturBeliBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_retur;
			$row[] = $dat->tgl_retur;
			$row[] = $dat->no_nota;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihRetur('."'".$dat->no_retur."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listReturBeliBrg->count_all(),
				"recordsFiltered" => $this->listReturBeliBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listReturPakaiBarang()
	{
		$list = $this->listReturPakaiBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_retur;
			$row[] = $dat->tgl_retur;
			$row[] = $dat->no_pakai_brg;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihRetur('."'".$dat->no_retur."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listReturPakaiBrg->count_all(),
				"recordsFiltered" => $this->listReturPakaiBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBonKaryawan()
	{
		$list = $this->listInpBonKry->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_bon;
			$row[] = $dat->tgl_bon;
			$row[] = $dat->nama_karyawan;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihBon('."'".$dat->no_bon."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listInpBonKry->count_all(),
				"recordsFiltered" => $this->listInpBonKry->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listKas()
	{
		$list = $this->listInputKas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$nom = ($dat->debet*1)-($dat->kredit*1);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_kas;
			$row[] = $dat->tgl_kas;
			$row[] = $nom;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihKas('."'".$dat->no_kas."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listInputKas->count_all(),
				"recordsFiltered" => $this->listInputKas->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBonSopir()
	{
		$list = $this->listInpBonSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_bon;
			$row[] = $dat->tgl_bon;
			$row[] = $dat->nama_driver;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihBon('."'".$dat->no_bon."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listInpBonSopir->count_all(),
				"recordsFiltered" => $this->listInpBonSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listKlaimSopir()
	{
		$list = $this->listInpKlaimSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_klaim;
			$row[] = $dat->tgl_klaim;
			$row[] = $dat->nama_driver;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihKlaim('."'".$dat->no_klaim."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listInpKlaimSopir->count_all(),
				"recordsFiltered" => $this->listInpKlaimSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listBayarSopir()
	{
		$list = $this->listByrSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_bayar;
			$row[] = $dat->tgl_bayar;
			$row[] = $dat->nama_driver;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihBayar('."'".$dat->no_bayar."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listByrSopir->count_all(),
				"recordsFiltered" => $this->listByrSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listUpahKaryawan()
	{
		$list = $this->listUpahKry->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_kuitansi;
			$row[] = $dat->tgl_upah;
			$row[] = $dat->nama_karyawan;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihUpah('."'".$dat->no_kuitansi."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listUpahKry->count_all(),
				"recordsFiltered" => $this->listUpahKry->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listKasBonSopir()
	{
		$list = $this->listKasBonSpr->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_bon;
			$row[] = $dat->tgl_bon;
			$row[] = $dat->nopol;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihKasBon('."'".$dat->no_bon."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listKasBonSpr->count_all(),
				"recordsFiltered" => $this->listKasBonSpr->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function listKasBonKantor()
	{
		$list = $this->listKasBonKtr->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_bon;
			$row[] = $dat->tgl_bon;
			$row[] = $dat->nopol;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihKasBon('."'".$dat->no_bon."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listKasBonKtr->count_all(),
				"recordsFiltered" => $this->listKasBonKtr->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	//Data Detail Transaksi
	public function detPasangBan($key)
	{
		$list = $this->detPsgBan->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="removePsg('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			switch ($dat->jenis_ban)
			{
				case '0':
					$jenis = 'Ban Dalam';
					break;
				case '1':
					$jenis = 'Ban Luar';
					break;
				case '2':
					$jenis = 'Marset Ban';
					break;
				default:
					break;
			}
			switch ($dat->status_pasang)
			{
				case '0':
					$status = 'Baru';
					break;
				case '1':
					$status = 'Bekas';
					break;
				case '2':
					$status = 'Vulkanisir';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $jenis;
			$row[] = $dat->ukuran_ban;
			$row[] = $dat->merk_ban;
			$row[] = $status;
			$row[] = $dat->qty_pasang;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detPsgBan->count_all(),
				"recordsFiltered" => $this->detPsgBan->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detLepasBan($key)
	{
		$list = $this->detLpsBan->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="removeLps('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			switch ($dat->jenis_ban)
			{
				case '0':
					$jenis = 'Ban Dalam';
					break;
				case '1':
					$jenis = 'Ban Luar';
					break;
				case '2':
					$jenis = 'Marset Ban';
					break;
				default:
					break;
			}
			switch ($dat->status_lepas)
			{
				case '0':
					$status = 'Bekas';
					break;
				case '1':
					$status = 'Vulkanisir';
					break;
				case '2':
					$status = 'Afkir';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $jenis;
			$row[] = $dat->ukuran_ban;
			$row[] = $dat->merk_ban;
			$row[] = $status;
			$row[] = $dat->qty_lepas;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detLpsBan->count_all(),
				"recordsFiltered" => $this->detLpsBan->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detBeliBarang($key)
	{
		$list = $this->detBeliBrg->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->part_number;
			$row[] = $dat->nama_barang;
			$row[] = $dat->harga_satuan;
			$row[] = $dat->qty_beli.' '.$dat->nama_satuan;
			$row[] = $dat->jumlah;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detBeliBrg->count_all(),
				"recordsFiltered" => $this->detBeliBrg->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detPakaiBarang($key)
	{
		$list = $this->detPakaiBrg->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->kode_barang;
			$row[] = $dat->nama_barang;
			$row[] = $dat->qty_pakai.' '.$dat->nama_satuan;
			$row[] = $dat->stok_barang.' '.$dat->nama_satuan;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detPakaiBrg->count_all(),
				"recordsFiltered" => $this->detPakaiBrg->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detBeliBan($key)
	{
		$list = $this->detBeliBan->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			switch ($dat->jenis_ban)
			{
				case '0':
					$jenis = 'Ban Dalam';
					break;
				case '1':
					$jenis = 'Ban Luar';
					break;
				case '2':
					$jenis = 'Marset Ban';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $jenis;
			$row[] = $dat->ukuran_ban;
			$row[] = $dat->merk_ban;
			$row[] = $dat->harga_satuan;
			$row[] = $dat->qty_beli;
			$row[] = $dat->jumlah;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detBeliBan->count_all(),
				"recordsFiltered" => $this->detBeliBan->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detBiayaKendaraan($key)
	{
		$list = $this->detBiayaKdr->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->keterangan;
			$row[] = $dat->jumlah;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detBiayaKdr->count_all(),
				"recordsFiltered" => $this->detBiayaKdr->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detReturBeliBarang($key)
	{
		$list = $this->detReturBeliBrg->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->nama_barang;
			$row[] = $dat->qty_retur.' '.$dat->nama_satuan;
			$row[] = $dat->jumlah;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detReturBeliBrg->count_all(),
				"recordsFiltered" => $this->detReturBeliBrg->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detReturPakaiBarang($key)
	{
		$list = $this->detReturPakaiBrg->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->nama_barang;
			$row[] = $dat->qty_retur.' '.$dat->nama_satuan;
			$row[] = $dat->jumlah;
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detReturPakaiBrg->count_all(),
				"recordsFiltered" => $this->detReturPakaiBrg->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	//Data Master
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
			$row[] = $dat->nama_sopir;
			$row[] = $dat->nama_kernet;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_kendaraan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_kendaraan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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

	public function mBan()
	{
		$list = $this->showBan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			switch ($dat->jenis_ban)
			{
				case '0':
					$jenis = 'Ban Dalam';
					break;
				case '1':
					$jenis = 'Ban Luar';
					break;
				case '2':
					$jenis = 'Marset Ban';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_ban;
			$row[] = $dat->nama_ban;
			$row[] = $jenis;
			$row[] = $dat->merk_ban;
			$row[] = $dat->ukuran_ban;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_ban."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete('."'".$dat->kode_ban."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showBan->count_all(),
				"recordsFiltered" => $this->showBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}
}
