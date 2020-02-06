<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_permohonan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('M_permohonan','M_ruangan'));

	}

	public function index()
	{
		//$data['ruang']=$this->session->userdata('ses_ruangan');
		$data['ruangan']=$this->M_ruangan->tampil_data()->result();
		$data['permohonan']=$this->M_permohonan->tampil_data()->result();
		$data['main_view']='V_permohonan';
		$this->load->view('V_utama',$data);
	}
	public function tambah(){

		$input=array(
				
			'ruangan'=>$this->session->userdata('ses_ruangan'),
			'nama'=>$this->input->post('nama'),
			'nip'=>$this->input->post('nip'),
			'uraian_perbaikan'=>$this->input->post('uraianPerbaikan'),
			'jumlah'=>$this->input->post('jumlah'),
			'tanggal'=>$this->input->post('tanggal'),
			'jam'=>$this->input->post('jam') 

		);


		$this->M_permohonan->input_data($input,'permohonan');
		if($input==null){
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>maaf tidak ada yang diinput</p>
				</div>');    
			
			$this->load->view("V_permohonan");

		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>selamat anda berhasil input data</p>
				</div>');    
		
			$this->load->view("V_permohonan");
		};
		redirect("C_permohonan/index");
	}

	function edit()
	{
		$input = array(
			$rn = $this->input->post('ruangan') ,
			$na = $this->input->post('nama'),
			$np = $this->input->post('nip'),
			$up = $this->input->post('uraian_perbaikan'),
			$jh = $this->input->post('jumlah'),
			$tl = $this->input->post('tanggal'),
			$jm = $this->input->post('jam')
			

		);

		$this->M_permohonan->edit_data($rn,$na,$np,$up,$jh,$tl,$jm);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('V_permohonan');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('V_permohonan'); 
		}
		redirect('C_permohonan/index');
	}

}
