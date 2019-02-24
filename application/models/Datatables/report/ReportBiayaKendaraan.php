<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ReportBiayaKendaraan extends CI_Model 
	{
		var $table = 'trx_biaya_kendaraan_det a';
		var $column_order = array('b.tgl_biaya','g.nama_karyawan','c.nopol','e.nama_driver','f.nama_driver','a.keterangan','a.jumlah');
		var $column_search = array('b.tgl_biaya','g.nama_karyawan','c.nopol','e.nama_driver','f.nama_driver','a.keterangan','a.jumlah');
		var $order = array('b.tgl_biaya' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			if($this->input->post('kode_kendaraan'))
			{
				$this->db->where('b.kode_kendaraan',$this->input->post('kode_kendaraan'));
			}
			if ($this->input->post('tgl_awal') != null AND $this->input->post('tgl_akhir') != null )
			{
				$this->db->where('b.tgl_biaya >=', $this->dateFix_($this->input->post('tgl_awal')));
        $this->db->where('b.tgl_biaya <=', $this->dateFix_($this->input->post('tgl_akhir')));
			}
			$this->db->select('b.tgl_biaya, c.nopol, c.tipe_kendaraan, c.jenis_kendaraan, a.keterangan, e.nama_driver as nama_sopir, f.nama_driver as nama_kernet, a.jumlah, g.nama_karyawan');
			$this->db->from($this->table);
			$this->db->join('trx_biaya_kendaraan b','b.no_biaya = a.no_biaya');
			$this->db->join('master_kendaraan c','c.kode_kendaraan = b.kode_kendaraan');
			$this->db->join('master_driver e','e.kode_driver = b.sopir_kendaraan');
			$this->db->join('master_driver f','f.kode_driver = b.kernet_kendaraan');
			$this->db->join('master_karyawan g','g.kode_karyawan = b.kode_karyawan');
			$this->db->where('b.data_sts','1');
			$i = 0;
			foreach ($this->column_search as $item)
			{
				if($_POST['search']['value'])
				{
					if($i===0)
					{
						$this->db->group_start();
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}
					if(count($this->column_search) - 1 == $i)
						$this->db->group_end();
				}
				$i++;
			}
			if(isset($_POST['order']))
			{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			}
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
		public function get_datatables()
		{
			$this->_get_datatables_query();
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered()
		{
			$this->_get_datatables_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function count_all()
		{
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}

		//Date Fixer
		function dateFix_($inp)
		{
			$date = str_replace('/', '-', $inp);
			return date('Y-m-d', strtotime($date));
		}
	}
?>