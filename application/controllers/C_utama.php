<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class C_utama extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('M_datapengguna','M_login'));

		if ($this->session->userdata('masuk')!= TRUE) {
			$url=base_url();
			redirect($url);
		}

		
	}

	public function index()

	{
		
		$data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
		$data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['jumlah_user']=$this->db->get('users')->num_rows();
		$data['jml_ruangan']=$this->db->get('ruangan')->num_rows();
		$data['jml_barang']=$this->db->get('databarang')->num_rows();
		$data['jml_kerusakan']=$this->db->get('permohonan')->num_rows();
		$data['main_view']='V_beranda';
		$this->load->view('V_utama',$data);
	}

}

?>
