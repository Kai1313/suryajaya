<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ReportPelunasanPiutang extends CI_Model 
	{
		var $table = 'trx_pelunasan_det a';
		var $column_order = array('b.tgl_lunas','b.no_lunas','d.nama_customer','c.no_tagihan','c.no_bon','a.jumlah');
		var $column_search = array('b.tgl_lunas','b.no_lunas','d.nama_customer','c.no_tagihan','c.no_bon','a.jumlah');
		var $order = array('b.tgl_lunas' => 'asc'); 
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			if($this->input->post('kode_customer'))
			{
				$this->db->where('b.kode_customer',$this->input->post('kode_customer'));
			}
			if ($this->input->post('tgl_awal') != null AND $this->input->post('tgl_akhir') != null )
			{
				$this->db->where('b.tgl_lunas >=', $this->dateFix_($this->input->post('tgl_awal')));
        $this->db->where('b.tgl_lunas <=', $this->dateFix_($this->input->post('tgl_akhir')));
			}
			$this->db->from($this->table);
			$this->db->join('trx_pelunasan b','b.no_lunas = a.no_lunas');
			$this->db->join('trx_tagihan_det c','c.det_id = a.det_tagihan');
			$this->db->join('master_customer d','d.kode_customer = b.kode_customer');
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