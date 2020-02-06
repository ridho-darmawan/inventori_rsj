		<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class C_datapengguna extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('M_datapengguna');
		$this->load->model('M_ruangan');
		$this->load->library(array('form_validation','session'));
	}


	public function index()

	{
		$data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
		$data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['users']=$this->M_datapengguna->tampil_data()->result();
		$data['main_view']='V_datapengguna';
		$data['ruangan']=$this->M_ruangan->tampil_data()->result();
		$this->load->view('V_utama',$data);
	}

	function tambah()
	{
		$input = array(
			$nip = 	$this->input->post('nip'),
			$nama =  $this->input->post('nama'),
			$user = $this->input->post('username'),
			$pass = $this->input->post('password'),
			$ha  = $this->input->post('hak_akses'),
			$ruang = $this->input->post('ruangan'),
			$file_path = "asset/img/profil/".$this->input->post('nip').".jpg"
		);

		$data = array(
			'nip'		=> $nip,
			'nama'		=> $nama,
		 	'username' => $user,
		 	'password' => $pass,
		 	'hak_akses'=> $ha,
		 	'ruangan'  => $ruang,
		 	'image'=>$file_path,
		);
		// $input = array(
		// 	'nip'		=> $this->input->post('nip'),
		// 	'nama'		=> $this->input->post('nama'),
		// 	'username' => $this->input->post('username'),
		// 	'password' => $this->input->post('password'),
		// 	'hak_akses'=> $this->input->post('hak_akses'),
		// 	'ruangan'  => $this->input->post('ruangan'),
		// 	$file_path = "asset/img/".$this->input->post('nip').".jpg"

			// $file_path = "assets/images/lembur/".$this->input->post('no_surat').".jpg"

		// );	

		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_error = $_FILES['image']['error'];
		$file_size = $_FILES['image']['size'];
		$file_path = "asset/img/profil/".$this->input->post('nip').".jpg";

		if ($file_type == "image/jpeg" || $file_type == "image/png") {
			if ($file_size > 0 and  $file_error == 0) {
				move_uploaded_file($file_tmp,"asset/img/profil/".$this->input->post('nip').".jpg" );
			}
		}


		$this->M_datapengguna->input_data($data,'users');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Gagal.</p>
				</div>');    
			$this->load->view('V_datapengguna');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Tambah Data Pengguna.</p>
				</div>');    
			$this->load->view('V_datapengguna');   
		};

		redirect('C_datapengguna/index');
	}

	function edit()
	{
		$input=array(
			
			$nip 		= $this->input->post('nip'),
			$nama 		= $this->input->post('nama'),
			$username 	= $this->input->post('username'),
			$password 	= $this->input->post('password'),
			$hak_akses 	= $this->input->post('hak_akses'),
			$image 		= $this->input->post('image'),
			$ruangan 	= $this->input->post('ruangan'),
			$file_path = "asset/img/profil".$nip.date('h-i-s').".jpg"
			
		);

		if ($_FILES['image']['name'] == '') {
			
			$data=array(

			'nip'=>$nip,
			'nama'=>$nama,
			'username'=>$username,
			'password'=>$password,
			'hak_akses'=>$hak_akses,
			'ruangan'=>$ruangan,	

		);

		}else{
			$data=array(

			
			'nip'=>$nip,
			'nama'=>$nama,
			'username'=>$username,
			'password'=>$password,
			'hak_akses'=>$hak_akses,
			'image'=>$file_path,
			'ruangan'=>$ruangan,
			
		);

		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_error = $_FILES['image']['error'];
		$file_size = $_FILES['image']['size'];
		// $file_path = "assets/images/".$_POST['nip'].".jpg";
		//$file_path = "assets/images/".$this->input->post('nip').".jpg";

		if ($file_type == "image/jpeg" || $file_type == "image/png") {
			if ($file_size > 0 and  $file_error == 0) {
				if(!move_uploaded_file($file_tmp,$file_path)){
					exit(3);
				}
			}else{
				exit(2);
			}
		}else{
			exit(1);
		}

	}
		
		$where = array('nip'=>$nip);
	
		$this->M_datapengguna->edit_data($where,$data,'users');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('V_datapengguna');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('V_datapengguna'); 
		}
		redirect('C_datapengguna/index');
		
	}

	function hapus()
	{
		$nip=$this->input->post('nip');
		$this->M_datapengguna->hapus_data($nip);

		if ($nip == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('V_datapengguna');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('V_datapengguna'); 
		}
		redirect('C_datapengguna/index');
	}


}

?>
