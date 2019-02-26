<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ReportKasBonSopir extends CI_Model 
	{
		var $table = 'trx_kas_bon_sopir a';
		var $column_order = array('a.tgl_bon','a.no_bon','b.nopol','sopir','a.sub_bonall','a.tgl_muat','a.tgl_muat_b');
		var $column_search = array('a.tgl_bon','a.no_bon','b.nopol','sopir','a.sub_bonall','a.tgl_muat','a.tgl_muat_b');
		var $order = array('tgl_bon' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			if($this->input->post('kode_kendaraan'))
			{
				$this->db->where('a.kode_kendaraan',$this->input->post('kode_kendaraan'));
			}
			if ($this->input->post('tgl_awal') != null AND $this->input->post('tgl_akhir') != null )
			{
				$this->db->where('a.tgl_bon >=', $this->dateFix_($this->input->post('tgl_awal')));
        $this->db->where('a.tgl_bon <=', $this->dateFix_($this->input->post('tgl_akhir')));
			}
			$this->db->select('a.tgl_bon,a.no_bon,c.nama_driver as sopir,d.nama_driver as kernet,b.nopol,b.tipe_kendaraan,b.jenis_kendaraan,a.sub_bonall,a.tgl_muat,a.tgl_bongkar,a.sub_beratmuat,a.tgl_muat_b,a.tgl_bongkar_b,a.sub_beratmuat_b,');
			$this->db->from($this->table);
			$this->db->join('master_kendaraan b','b.kode_kendaraan = a.kode_kendaraan');
			$this->db->join('master_driver c','c.kode_driver = a.kode_sopir');
			$this->db->join('master_driver d','d.kode_driver = a.kode_kernet');
			// $this->db->join('master_customer e','e.kode_customer = a.kode_customer_a');
			// $this->db->join('master_customer f','f.kode_customer = a.kode_customer_b');
			// $this->db->join('master_customer g','g.kode_customer = a.kode_customer_c');
			// $this->db->join('master_customer h','h.kode_customer = a.kode_customer_d');
			$this->db->where('a.data_sts','1');
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