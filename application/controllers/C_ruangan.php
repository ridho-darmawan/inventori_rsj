
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ruangan extends CI_Controller {

	public function __construct(){

	parent::__construct();
	$this->load->helper(array('form','url'));
	$this->load->model('M_ruangan');
	
	}

	public function index()

	{
		$data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
		$data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['ruangan']=$this->M_ruangan->tampil_data()->result();
		$data['main_view']='V_ruangan';
		$this->load->view('V_utama',$data);
	}

	function tambah()
	{
		$input = array(
			'id_ruangan' =>$this->input->post('id') , 
			'nama_ruangan' =>$this->input->post('nama')
		);

		$this->M_ruangan->input_data($input,'ruangan');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Gagal.</p>
				</div>');    
			$this->load->view('V_ruangan');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Tambah Data Ruangan.</p>
				</div>');    
			$this->load->view('V_ruangan');   
		};

		redirect('C_ruangan/index');
	}


	function edit()
	{
		$input =array(
			$id = $this->input->post('id'),
			$nm = $this->input->post('nama_ruang'),
		);
		$data = array(
			'id_ruangan' =>$id ,
			'nama_ruangan'=>$nm, 
		);
		$where = array('id_ruangan'=>$id);
		$this->M_ruangan->edit_data($where,$data,'ruangan');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('V_ruangan');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('V_ruangan'); 
		}
		redirect('C_ruangan/index');
		
	}

	function hapus()
	{
		$id_ruangan=$this->input->post('id_ruangan');
		$this->M_ruangan->hapus_data($id_ruangan);

		if ($id_ruangan == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('V_ruangan');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('V_ruangan'); 
		}
		redirect('C_ruangan/index');
	}


}