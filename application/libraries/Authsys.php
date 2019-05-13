<?php if(! defined ('BASEPATH')) exit ('Akses langsung tidak diperbolehkan');
	
	class Authsys
	{
		//set super global
		var $CI = NULL;
		public function __construct()
		{
			$this->CI =& get_instance();
		}
		//fungsi login
		public function login($username, $password)
		{
			$query = $this->CI->db->get_where('users', array('username'=>$username, 'password'=>$password));
			if($query->num_rows() > 0)
			{
				$que1 = $this->CI->db->get_where('users', array('username'=>$username, 'password'=>$password));
				$usrdata = $que1->row();
				$ses = array(
					'log_id'=>uniqid(rand()),
					'user_id'=>$usrdata->id,
					'user_name'=>$usrdata->username,
					'user_level'=>$usrdata->level
				);
				$this->CI->session->set_userdata($ses);
				// redirect(base_url('Dashboard/tes'));
				$ret = '1';
			}
			else
			{
				$this->CI->session->set_flashdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Username atau Password Salah!!!</strong></div></div>');
				$this->sessiondel();
				// redirect(base_url('Dashboard/login_'));
				$ret = '0';
			}
			return $ret;
		}

		//fungsi cek login
		public function logcheck_()
		{
			if(!isset($_SESSION['log_id']))
			{
				$this->CI->session->set_flashdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Belum Login!!!</strong></div></div>');
				$this->sessiondel();
				redirect(base_url('login-page'));
			}
		}

		//fungsi cek menu master
		public function master_check_($id,$mn)
		{
			$this->logcheck_();
			$get = $this->CI->db->join('trx_list b','b.id = a.trx_id')->get_where('hak_akses a',array('a.user_id'=>$id,'b.code'=>$mn));
			if($get->num_rows() < 1)
			{
				$this->CI->session->set_userdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Tidak Memiliki Akses Halaman Tersebut</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//fungsi cek menu transaksi
		public function trx_check_($id,$mn)
		{
			$this->logcheck_();
			$get = $this->CI->db->join('trx_list b','b.id = a.trx_id')->get_where('hak_akses a',array('a.user_id'=>$id,'b.code'=>$mn));
			if($get->num_rows() < 1)
			{
				$this->CI->session->set_userdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Tidak Memiliki Akses Halaman Tersebut</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//fungsi cek hak simpan
		public function save_check_($id,$mn)
		{
			$this->logcheck_();
			$get = $this->CI->db->join('trx_list b','b.id = a.trx_id')->get_where('hak_akses a',array('simpan'=>'1','a.user_id'=>$id,'b.code'=>$mn));
			if($get->num_rows() < 1)
			{
				$this->CI->session->set_userdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Tidak Memiliki Hak Akses Tersebut</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//fungsi cek hak hapus
		public function delete_check_($id,$mn)
		{
			$this->logcheck_();
			$get = $this->CI->db->join('trx_list b','b.id = a.trx_id')->get_where('hak_akses a',array('hapus'=>'1','a.user_id'=>$id,'b.code'=>$mn));
			if($get->num_rows() < 1)
			{
				$this->CI->session->set_userdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Tidak Memiliki Hak Akses Tersebut</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//fungsi cek hak update
		public function update_check_($id,$mn)
		{
			$this->logcheck_();
			$get = $this->CI->db->join('trx_list b','b.id = a.trx_id')->get_where('hak_akses a',array('update'=>'1','a.user_id'=>$id,'b.code'=>$mn));
			if($get->num_rows() < 1)
			{
				$this->CI->session->set_userdata('alert', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Anda Tidak Memiliki Hak Akses Tersebut</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//fungsi cek hak akses admin
		public function admlog()
		{
			$this->logcheck_();
			if($this->CI->session->userdata('user_level') != '0')
			{
				$this->CI->session->set_flashdata('success', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Hak Akses Tidak Dimiliki!!!</strong></div></div>');
				redirect(base_url('dashboard'));
			}
		}

		//unset session
		public function sessiondel()
		{
			$ses = array(
					'log_id',
					'user_id',
					'user_name',
					'user_branch',
					'branch_sts',
					'user_level'
				);
			$this->CI->session->unset_userdata($ses);
		}

		//fungsi logout
		public function logout()
		{
			$this->CI->session->set_flashdata('alert', '<div class="col-xs-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Logout Berhasil</strong></div></div>');
			$this->sessiondel();
			redirect(base_url('login-page'));
		}
	}

?>