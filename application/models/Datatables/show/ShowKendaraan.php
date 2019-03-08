<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ShowKendaraan extends CI_Model 
	{
		var $table = 'master_kendaraan a';
		var $column_order = array(null,'a.nopol','a.tipe_kendaraan','a.jenis_kendaraan','a.warna_kendaraan','nama_sopir','nama_kernet',null);
		var $column_search = array('a.nopol','a.tipe_kendaraan','a.jenis_kendaraan','a.warna_kendaraan','b.nama_driver','c.nama_driver');
		var $order = array('a.nopol' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			$this->db->select('a.*,b.nama_driver as nama_sopir,c.nama_driver as nama_kernet');
			$this->db->from($this->table);
			$this->db->join('master_driver b','b.kode_driver = a.sopir_kendaraan','left');
			$this->db->join('master_driver c','c.kode_driver = a.kernet_kendaraan','left');
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
	}
?>