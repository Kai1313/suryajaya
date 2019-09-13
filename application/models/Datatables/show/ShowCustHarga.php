<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ShowCustHarga extends CI_Model 
	{
		var $table = 'master_customer_harga';
		var $column_order = array(null,'tujuan','nominal',null);
		var $column_search = array('tujuan','nominal');
		var $order = array('tujuan' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($kode)
		{
            $this->db->from($this->table);
            $this->db->join('master_customer', 'master_customer.kode_customer = master_customer_harga.kode_customer');
            $this->db->where('master_customer_harga.data_sts','1');
            $this->db->where('master_customer_harga.kode_customer',$kode);
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
		public function get_datatables($kode)
		{
			$this->_get_datatables_query($kode);
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered($kode)
		{
			$this->_get_datatables_query($kode);
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