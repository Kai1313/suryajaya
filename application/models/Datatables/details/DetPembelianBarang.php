<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class DetPembelianBarang extends CI_Model 
	{
		var $table = 'trx_beli_barang_det a';
		var $column_order = array(null,'c.part_number','c.nama_barang','a.harga_satuan','a.qty_beli','a.jumlah',null);
		var $column_search = array('c.part_number','c.nama_barang','a.harga_satuan','a.qty_beli','a.jumlah');
		var $order = array('c.nama_barang' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($key)
		{
			$this->db->from($this->table);
			$this->db->join('trx_beli_barang b','b.no_nota = a.no_nota');
			$this->db->join('master_barang c','c.kode_barang = a.kode_barang');
			$this->db->where('a.no_nota',$key);
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
		public function get_datatables($key)
		{
			$this->_get_datatables_query($key);
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered($key)
		{
			$this->_get_datatables_query($key);
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