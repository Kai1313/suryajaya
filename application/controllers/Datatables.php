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
		$this->load->model('Datatables/show/ShowRekening','showRekening');

		$this->load->model('Datatables/details/DetPembelianBarang','detBeliBrg');
		$this->load->model('Datatables/details/DetPemakaianBarang','detPakaiBrg');
		$this->load->model('Datatables/details/DetPembelianBan','detBeliBan');
		$this->load->model('Datatables/details/DetBiayaKendaraan','detBiayaKdr');
		$this->load->model('Datatables/details/DetReturPembelianBarang','detReturBeliBrg');
		$this->load->model('Datatables/details/DetReturPemakaianBarang','detReturPakaiBrg');
		$this->load->model('Datatables/details/DetPemasanganBan','detPsgBan');
		$this->load->model('Datatables/details/DetPelepasanBan','detLpsBan');
		$this->load->model('Datatables/details/DetTagihan','detTgh');
		$this->load->model('Datatables/details/DetKuitansi','detKui');
		$this->load->model('Datatables/details/DetPelunasan','detLns');

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
		$this->load->model('Datatables/search/SearchDaftarTagihan','listTgh');
		$this->load->model('Datatables/search/SearchDaftarKuitansi','listKui');
		$this->load->model('Datatables/search/SearchDaftarPelunasan','listLns');

		$this->load->model('Datatables/report/ReportBeliBarang','rptBeliBrg');
		$this->load->model('Datatables/report/ReportPakaiBarang','rptPakaiBrg');
		$this->load->model('Datatables/report/ReportBeliBan','rptBeliBan');
		$this->load->model('Datatables/report/ReportBiayaKendaraan','rptBiayaKdr');
		$this->load->model('Datatables/report/ReportReturBeliBarang','rptReturBeliBrg');
		$this->load->model('Datatables/report/ReportReturPakaiBarang','rptReturPakaiBrg');
		$this->load->model('Datatables/report/ReportInputBon','rptInpBon');
		$this->load->model('Datatables/report/ReportBayarUpahKaryawan','rptUpahKry');
		$this->load->model('Datatables/report/ReportBonSopir','rptBonSopir');
		$this->load->model('Datatables/report/ReportKlaimSopir','rptKlaimSopir');
		$this->load->model('Datatables/report/ReportBayarSopir','rptBayarSopir');
		$this->load->model('Datatables/report/ReportPasangBan','rptPasangBan');
		$this->load->model('Datatables/report/ReportLepasBan','rptLepasBan');
		$this->load->model('Datatables/report/ReportKuitansi','rptKui');
		$this->load->model('Datatables/report/ReportKasBonSopir','rptKasBonSopir');
		$this->load->model('Datatables/report/ReportKasBonKantor','rptKasBonKantor');
		$this->load->model('Datatables/report/ReportPelunasanPiutang','rptLunas');
		$this->load->model('Datatables/report/ReportInputKas','rptKas');
	}

	//Data Report Transaksi
	public function rptInputKas()
	{
		$list = $this->rptKas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_kas));
			$row[] = $dat->no_kas;
			$row[] = $dat->ket_kas;
			$row[] = number_format($dat->debet,2);
			$row[] = number_format($dat->kredit,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptKas->count_all(),
				"recordsFiltered" => $this->rptKas->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptPelunasanPiutang()
	{
		$list = $this->rptLunas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_lunas));
			$row[] = $dat->no_lunas;
			$row[] = $dat->nama_customer;
			$row[] = $dat->no_tagihan;
			$row[] = $dat->no_bon;
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptLunas->count_all(),
				"recordsFiltered" => $this->rptLunas->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptKasBonKantor()
	{
		$list = $this->rptKasBonKantor->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_bon));
			$row[] = $dat->no_bon;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->sopir.' - '.$dat->kernet;
			$row[] = number_format($dat->sub_bonall,2);
			$row[] = date('d/m/Y', strtotime($dat->tgl_muat)).' - '.number_format($dat->sub_beratmuat,2).' - '.date('d/m/Y', strtotime($dat->tgl_bongkar));
			$row[] = date('d/m/Y', strtotime($dat->tgl_muat_b)).' - '.number_format($dat->sub_beratmuat_b,2).' - '.date('d/m/Y', strtotime($dat->tgl_bongkar_b));
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptKasBonKantor->count_all(),
				"recordsFiltered" => $this->rptKasBonKantor->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptKasBonSopir()
	{
		$list = $this->rptKasBonSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_bon));
			$row[] = $dat->no_bon;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->sopir.' - '.$dat->kernet;
			$row[] = number_format($dat->sub_bonall,2);
			$row[] = date('d/m/Y', strtotime($dat->tgl_muat)).' - '.number_format($dat->sub_beratmuat,2).' - '.date('d/m/Y', strtotime($dat->tgl_bongkar));
			$row[] = date('d/m/Y', strtotime($dat->tgl_muat_b)).' - '.number_format($dat->sub_beratmuat_b,2).' - '.date('d/m/Y', strtotime($dat->tgl_bongkar_b));
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptKasBonSopir->count_all(),
				"recordsFiltered" => $this->rptKasBonSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptKuitansi()
	{
		$list = $this->rptKui->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_kuitansi));
			$row[] = $dat->no_kuitansi;
			$row[] = $dat->nama_bank.' - '.$dat->no_rekening;
			$row[] = $dat->nama_customer;
			$row[] = $dat->ket_pembayaran;
			$row[] = number_format($dat->nom_pembayaran,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptKui->count_all(),
				"recordsFiltered" => $this->rptKui->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptLepasBan()
	{
		$list = $this->rptLepasBan->get_datatables();
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
			switch ($dat->status_lepas)
			{
				case '0':
					$sts = 'Bekas';
					break;
				case '1':
					$sts = 'Vulkanisir';
					break;
				case '2':
					$sts = 'Afkir/Buang';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_pelepasan));
			$row[] = $dat->no_pelepasan;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->bengkel_pelepasan;
			$row[] = $dat->nama_ban.' - '.$dat->merk_ban.' ('.$dat->ukuran_ban.')';
			$row[] = $jenis;
			$row[] = $sts;
			$row[] = number_format($dat->qty_lepas,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptLepasBan->count_all(),
				"recordsFiltered" => $this->rptLepasBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptPasangBan()
	{
		$list = $this->rptPasangBan->get_datatables();
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
			switch ($dat->status_pasang)
			{
				case '0':
					$sts = 'Baru';
					break;
				case '1':
					$sts = 'Bekas';
					break;
				case '2':
					$sts = 'Vulkanisir';
					break;
				default:
					break;
			}
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_pemasangan));
			$row[] = $dat->no_pemasangan;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->bengkel_pemasangan;
			$row[] = $dat->nama_ban.' - '.$dat->merk_ban.' ('.$dat->ukuran_ban.')';
			$row[] = $jenis;
			$row[] = $sts;
			$row[] = number_format($dat->qty_pasang,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptPasangBan->count_all(),
				"recordsFiltered" => $this->rptPasangBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptBayarSopir()
	{
		$list = $this->rptBayarSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_bayar));
			$row[] = $dat->no_bayar;
			$row[] = $dat->nama_driver;
			$row[] = number_format($dat->nom_bon,2);
			$row[] = number_format($dat->nom_klaim,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptBayarSopir->count_all(),
				"recordsFiltered" => $this->rptBayarSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptKlaimSopir()
	{
		$list = $this->rptKlaimSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_klaim));
			$row[] = $dat->no_klaim;
			$row[] = $dat->nama_driver;
			$row[] = $dat->ket_klaim;
			$row[] = number_format($dat->nom_klaim,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptKlaimSopir->count_all(),
				"recordsFiltered" => $this->rptKlaimSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptBonSopir()
	{
		$list = $this->rptBonSopir->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_bon));
			$row[] = $dat->no_bon;
			$row[] = $dat->nama_driver;
			$row[] = $dat->ket_bon;
			$row[] = number_format($dat->nom_bon,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptBonSopir->count_all(),
				"recordsFiltered" => $this->rptBonSopir->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptBayarupahKaryawan()
	{
		$list = $this->rptUpahKry->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_upah));
			$row[] = $dat->no_kuitansi;
			$row[] = $dat->nama_karyawan;
			$row[] = number_format($dat->sub_bon,2);
			$row[] = number_format($dat->grand_total,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptUpahKry->count_all(),
				"recordsFiltered" => $this->rptUpahKry->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptInputBon()
	{
		$list = $this->rptInpBon->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_bon));
			$row[] = $dat->no_bon;
			$row[] = $dat->nama_karyawan;
			$row[] = $dat->ket_bon;
			$row[] = number_format($dat->nom_bon,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptInpBon->count_all(),
				"recordsFiltered" => $this->rptInpBon->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptReturPakaiBarang()
	{
		$list = $this->rptReturPakaiBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_retur));
			$row[] = $dat->no_pakai_brg;
			$row[] = date('d/m/Y', strtotime($dat->tgl_pakai_brg));
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->nama_barang;
			$row[] = number_format($dat->qty_retur,2);
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptReturPakaiBrg->count_all(),
				"recordsFiltered" => $this->rptReturPakaiBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptReturBeliBarang()
	{
		$list = $this->rptReturBeliBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_retur));
			$row[] = $dat->no_nota;
			$row[] = date('d/m/Y', strtotime($dat->tgl_nota));
			$row[] = $dat->nota_toko;
			$row[] = $dat->nama_barang;
			$row[] = number_format($dat->qty_retur,2);
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptReturBeliBrg->count_all(),
				"recordsFiltered" => $this->rptReturBeliBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function rptBiayaKendaraan()
	{
		$list = $this->rptBiayaKdr->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_biaya));
			$row[] = $dat->nama_karyawan;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->nama_sopir;
			$row[] = $dat->nama_kernet;
			$row[] = $dat->keterangan;
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptBiayaKdr->count_all(),
				"recordsFiltered" => $this->rptBiayaKdr->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}	

	public function rptBeliBan()
	{
		$list = $this->rptBeliBan->get_datatables();
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
			$row[] = date('d/m/Y', strtotime($dat->tgl_pembelian));
			$row[] = $dat->nama_supplier;
			$row[] = $dat->nama_ban.' - '.$dat->merk_ban.' - ('.$dat->ukuran_ban.')';
			$row[] = $jenis;
			$row[] = number_format($dat->qty_beli,2);
			$row[] = number_format($dat->harga_satuan,2);
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptBeliBan->count_all(),
				"recordsFiltered" => $this->rptBeliBan->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}	

	public function rptPakaiBarang()
	{
		$list = $this->rptPakaiBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_pakai_brg));
			$row[] = $dat->nama_karyawan;
			$row[] = $dat->nopol.' - '.$dat->tipe_kendaraan.' - '.$dat->jenis_kendaraan;
			$row[] = $dat->nama_sopir;
			$row[] = $dat->nama_kernet;
			$row[] = $dat->nama_barang;
			$row[] = number_format($dat->qty_pakai,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptPakaiBrg->count_all(),
				"recordsFiltered" => $this->rptPakaiBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}	

	public function rptBeliBarang()
	{
		$list = $this->rptBeliBrg->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = date('d/m/Y', strtotime($dat->tgl_nota));
			$row[] = $dat->nama_supplier;
			$row[] = $dat->nama_barang;
			$row[] = number_format($dat->qty_beli,2);
			$row[] = number_format($dat->harga_satuan,2);
			$row[] = number_format($dat->jumlah,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->rptBeliBrg->count_all(),
				"recordsFiltered" => $this->rptBeliBrg->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

	//Data Cari Transaksi
	public function listLunas()
	{
		$list = $this->listLns->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_lunas;
			$row[] = $dat->tgl_lunas;
			$row[] = $dat->nama_customer;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihLunas('."'".$dat->no_lunas."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listLns->count_all(),
				"recordsFiltered" => $this->listLns->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}	

	public function listKuitansi()
	{
		$list = $this->listKui->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->data_sts!='1')?'Void':'Posted';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->no_kuitansi;
			$row[] = $dat->tgl_kuitansi;
			$row[] = $dat->kode_rekening ;
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilihKuitansi('."'".$dat->no_kuitansi."'".')"><span class="glyphicon glyphicon-ok"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->listKui->count_all(),
				"recordsFiltered" => $this->listKui->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
	}

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
	public function detLunas($key)
	{
		$list = $this->detLns->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->no_tagihan;
			$row[] = $dat->no_bon;
			$row[] = $dat->surat_jalan;
			$row[] = $dat->tgl_tagihan;
			$row[] = number_format($dat->ongkos_bruto,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detLns->count_all(),
				"recordsFiltered" => $this->detLns->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detKuitansi($key)
	{
		$list = $this->detKui->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->ket_pembayaran;
			$row[] = number_format($dat->nom_pembayaran,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detKui->count_all(),
				"recordsFiltered" => $this->detKui->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

	public function detTagihan($key)
	{
		$list = $this->detTgh->get_datatables($key);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$btn = ($dat->data_sts!='1')?'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="remove('."'".$dat->det_id."'".')"><span class="glyphicon glyphicon-trash"></span></a>':'<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" disabled><span class="glyphicon glyphicon-trash"></span></a>';
			$no++;
			$row = array();
			$row[] = $btn;
			$row[] = $dat->no_bon;
			$row[] = $dat->nopol;
			$row[] = $dat->surat_jalan;
			$row[] = $dat->jenis_muatan;
			$row[] = number_format($dat->berat_muatan,2);
			$row[] = number_format($dat->ongkos_bruto,2);
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->detTgh->count_all(),
				"recordsFiltered" => $this->detTgh->count_filtered($key),
				"data" => $data,
			);
		echo json_encode($output);
	}

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
			$row[] = number_format($dat->harga_satuan,2);
			$row[] = number_format($dat->qty_beli,2).' '.$dat->nama_satuan;
			$row[] = number_format($dat->jumlah,2);
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
			$row[] = number_format($dat->qty_pakai,2).' '.$dat->nama_satuan;
			$row[] = number_format($dat->stok_barang,2).' '.$dat->nama_satuan;
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
			$row[] = number_format($dat->harga_satuan,2);
			$row[] = number_format($dat->qty_beli,2);
			$row[] = number_format($dat->jumlah,2);
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
			$row[] = number_format($dat->jumlah,2);
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
			$row[] = number_format($dat->qty_retur,2).' '.$dat->nama_satuan;
			$row[] = number_format($dat->jumlah,2);
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
			$row[] = number_format($dat->qty_retur,2).' '.$dat->nama_satuan;
			$row[] = number_format($dat->jumlah,2);
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
	public function mRekening()
	{
		$list = $this->showRekening->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->kode_rekening;
			$row[] = $dat->nama_bank;
			$row[] = $dat->no_rekening;
			$row[] = $dat->ket_rekening;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_rekening."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_rekening."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->showRekening->count_all(),
				"recordsFiltered" => $this->showRekening->count_filtered(),
				"data" => $data,
			);
		echo json_encode($output);
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
			$row[] = number_format($dat->min_qty,2).' '.$dat->nama_satuan;
			$row[] = number_format($dat->qty_perset,2).' '.$dat->nama_satuan;
			$row[] = $dat->no_rak;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_barang."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_barang."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_customer."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_customer."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_driver."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_driver."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = number_format($dat->nom_biaya_driver,2);
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_biaya_driver."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_biaya_driver."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_tujuan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_tujuan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_supplier."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_supplier."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = number_format($dat->gaji_bulanan,2);
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_karyawan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_karyawan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_kendaraan."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_kendaraan."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit('."'".$dat->kode_ban."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del('."'".$dat->kode_ban."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
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
