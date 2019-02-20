<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class DetPelunasan extends CI_Model 
	{
		var $table = 'trx_pelunasan_det a';
		var $column_order = array(null,'c.no_tagihan','c.no_bon','c.surat_jalan','d.tgl_tagihan','c.ongkos_bruto');
		var $column_search = array('c.no_tagihan','c.no_bon','c.surat_jalan','d.tgl_tagihan','c.ongkos_bruto');
		var $order = array('a.det_id' => 'asc'); 
		public function __construct()
		{
			parent::__construct();
		}
		private function _get_datatables_query($key)
		{
			$this->db->select('c.no_tagihan,c.no_bon,c.surat_jalan,d.tgl_tagihan,c.ongkos_bruto,a.det_id,b.data_sts');
			$this->db->from($this->table);
			$this->db->join('trx_pelunasan b','b.no_lunas = a.no_lunas');
			$this->db->join('trx_tagihan_det c','c.det_id = a.det_tagihan');
			$this->db->join('trx_tagihan d','d.no_tagihan = c.no_tagihan');
			$this->db->where('a.no_lunas',$key);
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