
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation','session');
		$this->load->model(array('M_login','M_datapengguna'));

	}

	public function index()
	{

		$data['users']=$this->M_datapengguna->tampil_data();
		$this->load->view('V_login');
	}

	public function dologin()
	{	
		// $data['main_view']='V_beranda';
		// $this->load->view('V_utama',$data);

		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		$cek_users=$this->M_login->login($username,$password);

		if ($cek_users->num_rows()>0) {
			$data=$cek_users->row_array();
			$this->session->set_userdata('masuk',TRUE);
			if ($data['hak_akses']=='1') {
				$this->session->set_userdata('akses','1');
				$this->session->set_userdata('ses_user',$data['username']);
				// $this->session->set_userdata('ses_pass',$data['password']);
				// $this->session->set_userdata('ses_ruangan',$data['ruangan']);
				$this->session->set_userdata('ses_nip',$data['nip']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_foto',$data['image']);
				redirect('C_utama');
			
			}else if ($data['hak_akses']=='2') {
				$this->session->set_userdata('akses','2');
				$this->session->set_userdata('ses_user',$data['username']);
				$this->session->set_userdata('ses_ruangan',$data['ruangan']);
				$this->session->set_userdata('ses_nip',$data['nip']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_foto',$data['image']);
				redirect('C_utama');
			
			}else{
				$data['notif']='Maaf, Username dan password salah';
				$this->load->view('V_login',$data);
			}
		}else{
			$data['notif']='Maaf, Username dan Passsword';
			$this->load->view('V_login',$data);
		}
	}
	
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('C_login');
	}


}
