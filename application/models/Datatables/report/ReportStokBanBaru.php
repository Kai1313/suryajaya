<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ReportStokBanBaru extends CI_Model 
	{
		var $table = 'inv_ban a';
		var $column_order = array('b.kode_ban','c.nama_supplier','b.ukuran_ban','b.jenis_ban','a.bkl','a.tgl_beli','a.harga_beli');
		var $column_search = array('b.kode_ban','c.nama_supplier','b.ukuran_ban','b.jenis_ban','a.bkl','a.tgl_beli','a.harga_beli');
		var $order = array('b.kode_ban' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			if($this->input->post('kode_ban'))
			{
				$this->db->where('b.kode_ban',$this->input->post('kode_ban'));
			}
			$this->db->from($this->table);
			$this->db->join('master_ban b','b.kode_ban = a.kode_ban');
			$this->db->join('master_supplier c','c.kode_supplier = a.kode_supplier');
			$this->db->where('b.data_sts','1');
			$this->db->where('a.sts_stok','0');
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